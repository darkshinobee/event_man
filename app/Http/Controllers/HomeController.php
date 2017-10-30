<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\InquiryReceived;
use App\Event;
use App\Customer;
use App\GuestList;
use Auth;
use PDF;
use Session;

class HomeController extends Controller
{
    public function index()
    {
      return view('welcome');
    }

    public function contact()
    {
      return view('pages.contact');
    }

    public function about()
    {
      return view('pages.about');
    }

    public function pricing()
    {
      return view('pages.pricing');
    }

    public function policy()
    {
      return view('pages.policy');
    }

    public function attendance($reference)
    {
      $tran = DB::table('transactions')
      ->where('reference', $reference)
      ->first();

      $event = Event::find($tran->event_id);

      $guest = DB::table('guest_lists')
      ->where('reference', $reference)
      ->first();
      // dd($guest);

      $book = DB::table('booked_events')
      ->where('transaction_id', $tran->id)
      ->first();

      $names = DB::table('extras')->where('transaction_id', $tran->id)->get();

      if ($guest->attendance == 0) {
        DB::table('guest_lists')->where('id', $guest->id)
        ->update(['attendance' => 1]);
        return view('events.attendance', compact('names', 'event', 'tran', 'guest', 'book'));
      } else {
        return view('events.attendance', compact('names', 'event', 'tran', 'guest', 'book'));
      }
    }

    public function contactMail(Request $request)
    {
      Mail::to('support@ticketroom.ng')->send(new Contact($request));
      Mail::to($request->email)->send(new InquiryReceived);
      Session::flash('success', 'Message Sent');
      return redirect()->action('HomeController@index');
    }

    public function pastEvents()
    {
      $events = DB::table('events')->where('status', 1)->where('approval', 1)
      ->orderBy('events.event_start_date', 'desc')->simplePaginate(6);
      return view('events.gallery', compact('events'));
    }

    public function upcomingEvents()
    {
      $events = DB::table('events')->where('status', 0)->where('approval', 1)
      ->orderBy('events.event_start_date', 'asc')->simplePaginate(6);
      return view('events.upcoming', compact('events'));
    }

    public function singleEvent($slug)
    {
      $customer = Auth::guard('customer')->user();

      $id = DB::table('events')->where('slug', $slug)->value('id');
      $organizer_id = DB::table('events')->where('id', $id)->value('organizer_id');
      $organizer = Customer::find($organizer_id);
      $event = Event::find($id);
      $related_events = DB::table('events')->where('category', $event->category)
                                           ->where('status', 0)
                                           ->where('approval', 1)
                                           ->take(3)
                                           ->orderBy('events.event_start_date', 'desc')
                                           ->get();
      return view('events.single', compact('event', 'related_events', 'organizer'));
    }

    public function blogs()
    {
      return view('pages.blog');
    }

    public function singleBlog()
    {
      return view('pages.single_blog');
    }

    public function search(Request $request, $key)
    {
      if ($request->has('query')) {
        $q = $request->input("query");
        $query = DB::table('events')->select('title', 'category', 'venue', 'state', 'organizer', 'regular_fee', 'image_path', 'slug', 'event_start_date', 'status')
        ->where('status', $key)
        ->where('approval', 1)
        ->where(function ($ww) use ($q){
              $ww->where('title', 'like', '%'.$q.'%')
                    ->orWhere('category', 'like', '%'.$q.'%')
                    ->orWhere('organizer', 'like', '%'.$q.'%')
                    ->orWhere('state', 'like', '%'.$q.'%')
                    ->orWhere('venue', 'like', '%'.$q.'%');
          })
          ->get();
        if ($query->Count()) {
          return $query;
        }else {
          return "no match";
        }
        }
        return "empty";
      }

      public function myTickets()
      {
        $attendee = Auth::guard('customer')->user();
        $p_tickets = DB::table('events')->select('events.title', 'transactions.reference')
                  ->join('transactions', 'events.id', '=', 'transactions.event_id')
                  ->join('booked_events', 'transactions.id', '=', 'booked_events.transaction_id')
                  ->where('transactions.attendee_id', $attendee->id)
                  ->where('booked_events.booking_status', 1)
                  ->where('status', 1)
                  ->where('approval', 1)
                  ->orderBy('events.event_start_date', 'asc')
                  ->get();

        $u_tickets = DB::table('events')->select('events.title', 'transactions.reference')
                  ->join('transactions', 'events.id', '=', 'transactions.event_id')
                  ->join('booked_events', 'transactions.id', '=', 'booked_events.transaction_id')
                  ->where('transactions.attendee_id', $attendee->id)
                  ->where('booked_events.booking_status', 1)
                  ->where('status', 0)
                  ->where('approval', 1)
                  ->orderBy('events.event_start_date', 'asc')
                  ->get();
        return view('attendee.my_tickets', compact('p_tickets', 'u_tickets'));
      }

      public function ticket($reference)
      {
        $tran = DB::table('transactions')->where('reference', $reference)->first();
        $book = DB::table('booked_events')->where('transaction_id', $tran->id)->first();
        $event = DB::table('events')->where('id', $tran->event_id)->first();

        $guests = DB::table('extras')->where('transaction_id', $tran->id)->get();
        return view('attendee.ticket', compact('guests', 'event', 'tran', 'book'));
      }

      public function ticketPdf($reference)
      {
        $tran = DB::table('transactions')->where('reference', $reference)->first();
        $book = DB::table('booked_events')->where('transaction_id', $tran->id)->first();
        $event = DB::table('events')->where('id', $tran->event_id)->first();

        $guests = DB::table('extras')->where('transaction_id', $tran->id)->get();

        $pdf = PDF::loadView('attendee.ticket', compact('guests', 'event', 'tran', 'book'));
        return $pdf->download($event->title.'_'.'Ticket.pdf');
        return back();
      }

      public function myEvents()
      {
        $organizer = Auth::guard('customer')->user();
        $u_events = DB::table('events')
        ->where('status', 0)
        ->where('approval', 1)
        ->where('organizer_id', $organizer->id)
        ->simplePaginate(10);

        $p_events = DB::table('events')
        ->where('status', 1)
        ->where('approval', 1)
        ->where('organizer_id', $organizer->id)
        ->simplePaginate(10);

        return view('organizer.my_events', compact('u_events', 'p_events'));
      }

      public function myEventsSingle($slug)
      {
        $organizer = Auth::guard('customer')->user();
        $event = DB::table('events')->where('slug', $slug)->first();

        return view('organizer.my_events_single', compact('event'));
      }
}
