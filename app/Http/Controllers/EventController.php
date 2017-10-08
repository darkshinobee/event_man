<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Auth;
use Image;
use Session;
use PDF;
use App\Event;
use App\Customer;
use App\BookedEvent;
use App\EventOrganizer;
use App\EventHit;
use App\EventMiss;
use App\Mail\BookingSuccess;
use App\Mail\ContactOrganizer;
use App\Mail\AdminEventRequest;
// use App\Mail\SaleSuccess;
use App\Mail\EventCreated;

class EventController extends Controller
{
    public function create()
    {
      return view('events.create');
    }

    public function store(Request $request)
    {
      // dd($request);
      $customer = Auth::guard('customer')->user();
      // Validation
      $this -> validate($request, array(
        'title' => 'required',
        'venue' => 'required',
        'state' => 'required',
        'description' => 'required',
        'category' => 'required',
        'event_type' => 'required',
        'event_start_date' => 'required',
        'event_start_time' => 'required'
      ));

      // Store to DB
      $event = new Event;

      $event->title = $request->title;
      $event->venue = $request->venue;
      $event->state = $request->state;
      $event->description = $request->description;
      $event->category = $request->category;
      if ($request->organizer) {
        $event->organizer = $request->organizer;
      } else {
        $event->organizer = $customer->first_name.' '.$customer->last_name;
      }
      $event->organizer_id = $customer->id;
      $event->event_type = $request->event_type;
      if ($request->ticket_count) {
        $event->ticket_count = $request->ticket_count;
      }else {
        if ($request->early_max && $request->vip_max && $request->regular_max) {
          $event->ticket_count = $request->early_max + $request->vip_max + $request->regular_max;
        }elseif ($request->regular_max && $request->vip_max && !$request->early_max) {
          $event->ticket_count = $request->regular_max + $request->vip_max;
        }elseif ($request->regular_max && $request->early_max && !$request->vip_max) {
          $event->ticket_count = $request->regular_max + $request->early_max;
        }
      }
      if ($request->early_bird && $request->early_max && $event->event_type == 1) {
        $event->early_bird = $request->early_bird;
        $event->early_max = $request->early_max;
      }
      if ($request->vip_fee && $request->vip_max && $event->event_type == 1) {
        $event->vip_fee = $request->vip_fee;
        $event->vip_max = $request->vip_max;
      }
      if ($request->regular_fee && $request->regular_max && $event->event_type == 1) {
        $event->regular_fee = $request->regular_fee;
        $event->regular_max = $request->regular_max;
      }

      $event->slug = $request->title.'_'.rand(100,10000);
      $event->hits = 0;
      $event->misses = 0;

      // Save Image
      $extensions = array("png", "jpg", "jpeg");
      if ($request->hasFile('image_path') &&
      in_array($request->file('image_path')->getClientOriginalExtension(), $extensions)) {
        $image = $request->file('image_path');
        $image_name = $event->slug. '.' .$image->getClientOriginalExtension();
        $destination = public_path('images/categories/'.$event->category.'/'.$image_name);
        Image::make($image)->resize(680, 360)->save($destination);
        $event->image_path = '/images/categories/'.$event->category.'/'.$image_name;
      } else {
        $event->image_path = '/images/defaults/'.$event->category.'.jpg';
      }
      $event->event_start_date = $request->event_start_date;
      $event->event_start_time = $request->event_start_time;
      if ($request->has('event_end_date')) {
        $event->event_end_date = $request->event_end_date;
      }
      if ($request->has('event_end_time')) {
        $event->event_end_time = $request->event_end_time;
      }
      $event->save();

      $ev_org = new EventOrganizer;
      $ev_org->event_id = $event->id;
      $ev_org->organizer_id = $customer->id;
      $ev_org->save();

      Mail::to($customer->email)->send(new EventCreated($event, $customer));
      Mail::to('admin@ticketroom.ng')->send(new AdminEventRequest);

      Session::flash('success', 'Event Created. Check Email for Details');
      return redirect()->route('home');

    }

    public function eventCategories($category)
    {
      $events = DB::table('events')->where('category', $category)
      ->where('status', 0)->where('approval', 1)
      ->orderBy('events.event_start_date', 'desc')->simplePaginate(6);
      return view('events.upcoming', compact('events', 'category'));
    }

    public function contactOrganizer(Request $request)
    {
      $event = Event::find($request->event_id);
      $organizer = Customer::find($event->organizer_id);
      Mail::to($organizer->email)->send(new ContactOrganizer($request, $event));
      Session::flash('success', 'Message Sent');
      return back();
    }

    public function checkout(Request $request, $slug)
    {
      $customer = Auth::guard('customer')->user();
      $attendee_email = $customer->email;

      $radio_value = $request->input('fee_type');
      $new_radio_value = $radio_value.'_max';
      $id = DB::table('events')->where('slug', $slug)->value('id');
      $event = Event::find($id);
      $tickets_left = DB::table('events')->where('id', $id)->value($new_radio_value);

      return view('payment.checkout', compact('request', 'event', 'tickets_left', 'radio_value', 'attendee_email'));
    }

    public function orderSuccess($reference)
    {
      $tran = DB::table('transactions')->where('reference', $reference)->first();
      $book = DB::table('booked_events')->where('transaction_id', $tran->id)->first();
      $event = DB::table('events')->where('id', $tran->event_id)->first();
      $attendee = DB::table('customers')->where('id', $tran->attendee_id)->first();
      $organizer = DB::table('customers')->where('id', $event->organizer_id)->first();

      Mail::to($attendee->email)->send(new BookingSuccess($event, $book, $attendee, $tran, $organizer->email));
      // Mail::to($organizer->email)->send(new SaleSuccess($event, $book, $attendee, $organizer, $tran));

      return view('events.order_success', compact('book', 'event', 'tran'));
    }

    public function orderFail($reference)
    {
      $tran = DB::table('transactions')->where('reference', $reference)->first();
      $book = DB::table('booked_events')->where('transaction_id', $tran->id)->first();
      $event = DB::table('events')->where('id', $tran->event_id)->first();
      return view('events.order_fail', compact('book', 'event', 'tran'));
    }

    public function eventHit($event_id, $customer_id)
    {
      $hit = DB::table('event_hits')->where('event_id', $event_id)->where('customer_id', $customer_id)->first();
      if ($hit == null) {
        $hits = new EventHit;
        $hits->event_id = $event_id;
        $hits->customer_id = $customer_id;
        $hits->status = 1;
        $hits->save();

        $event = Event::find($event_id);
        $event->hits = $event->hits + 1;
        $event->save();
        return $event->hits;
      }else {
        if ($hit->status == 0) {
          $hits = EventHit::find($hit->id);
          $hits->status = 1;
          $hits->save();

          $event = Event::find($event_id);
          $event->hits = $event->hits + 1;
          $event->save();
          return $event->hits;
        }else {
          $hits = EventHit::find($hit->id);
          $hits->status = 0;
          $hits->save();

          $event = Event::find($event_id);
          $event->hits = $event->hits - 1;
          $event->save();
          return $event->hits;
        }
      }
    }

    public function eventMiss($event_id, $customer_id)
    {
      $miss = DB::table('event_misses')->where('event_id', $event_id)->where('customer_id', $customer_id)->first();
      if ($miss == null) {
        $misses = new EventMiss;
        $misses->event_id = $event_id;
        $misses->customer_id = $customer_id;
        $misses->status = 1;
        $misses->save();

        $event = Event::find($event_id);
        $event->misses = $event->misses + 1;
        $event->save();
        return $event->misses;
      }else {
        if ($miss->status == 0) {
          $misses = EventMiss::find($miss->id);
          $misses->status = 1;
          $misses->save();

          $event = Event::find($event_id);
          $event->misses = $event->misses + 1;
          $event->save();
          return $event->misses;
        }else {
          $misses = EventMiss::find($miss->id);
          $misses->status = 0;
          $misses->save();

          $event = Event::find($event_id);
          $event->misses = $event->misses - 1;
          $event->save();
          return $event->misses;
        }
      }
    }

    public function viewList($event_id)
    {
      $organizer = Auth::guard('customer')->user();
      $title = DB::table('events')->where('id', $event_id)->value('title');
      $guests = DB::table('customers')->select('customers.first_name', 'customers.last_name', 'transactions.reference')
                ->join('transactions', 'customers.id', '=', 'transactions.attendee_id')
                ->join('events', 'transactions.event_id', '=', 'events.id')
                ->where('events.organizer_id', $organizer->id)
                ->where('events.id', $event_id)
                ->orderBy('transactions.created_at', 'asc')
                ->get();
                // dd();
                return view('events.guest_list', compact('title','guests'));
    }

    // public function downloadList($event_id)
    // {
    //   $organizer = Auth::guard('customer')->user();
    //   $title = DB::table('events')->where('id', $event_id)->value('title');
    //   $guests = DB::table('customers')->select('customers.first_name', 'customers.last_name', 'transactions.reference')
    //             ->join('transactions', 'customers.id', '=', 'transactions.attendee_id')
    //             ->join('events', 'transactions.event_id', '=', 'events.id')
    //             ->where('events.organizer_id', $organizer->id)
    //             ->where('events.id', $event_id)
    //             ->orderBy('transactions.created_at', 'asc')
    //             ->get();
    //   $pdf = PDF::loadView('events.guest_list', compact('title', 'guests'));
    //   return $pdf->download($title.'_'.'guest list.pdf');
    // }
}
