<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\InquiryReceived;
use App\Event;
use App\Customer;
use Auth;
use Session;

class HomeController extends Controller
{
    public function index()
    {
      $events = DB::table('events')->where('status', 0)->orderBy('events.event_start_date', 'desc')->take(6)->get();
      return view('welcome', compact('events'));
    }

    public function contact()
    {
      return view('pages.contact');
    }

    public function pricing()
    {
      return view('pages.pricing');
    }

    public function contactMail(Request $request)
    {
      Mail::to('help@ticketroom.ng')->send(new Contact($request));
      Mail::to($request->email)->send(new InquiryReceived);
      Session::flash('success', 'Message Sent');
      return redirect()->action('HomeController@index');
    }

    public function pastEvents()
    {
      $events = DB::table('events')->where('status', 1)->orderBy('events.event_start_date', 'desc')->simplePaginate(6);
      return view('events.gallery', compact('events'));
    }

    public function upcomingEvents()
    {
      $events = DB::table('events')->where('status', 0)->orderBy('events.event_start_date', 'asc')->simplePaginate(6);
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
                                           ->take(3)
                                           ->orderBy('events.event_start_date', 'desc')
                                           ->get();
                                          //  dd($organizer);
      return view('events.single', compact('event', 'related_events', 'organizer'));
      // if (Auth::guard('customer')->check()) {
      //   $customer_id = $customer->id;
      //   return view('events.single', compact('event', 'related_events', 'customer_id'));
      // }else {
      //   return view('events.single', compact('event', 'related_events'));
      // }

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
        ->where('title', 'like', '%'.$q.'%')
        ->orWhere('category', 'like', '%'.$q.'%')
        ->orWhere('organizer', 'like', '%'.$q.'%')
        ->orWhere('state', 'like', '%'.$q.'%')
        ->where('status', $key)
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
        $p_tickets = DB::table('events')
                  ->join('transactions', 'events.id', '=', 'transactions.event_id')
                  ->join('booked_events', 'transactions.id', '=', 'booked_events.transaction_id')
                  ->where('transactions.attendee_id', $attendee->id)
                  ->where('booked_events.booking_status', 1)
                  ->where('status', 1)
                  ->orderBy('events.event_start_date', 'asc')
                  ->get();

        $u_tickets = DB::table('events')
                  ->join('transactions', 'events.id', '=', 'transactions.event_id')
                  ->join('booked_events', 'transactions.id', '=', 'booked_events.transaction_id')
                  ->where('transactions.attendee_id', $attendee->id)
                  ->where('booked_events.booking_status', 1)
                  ->where('status', 0)
                  ->orderBy('events.event_start_date', 'asc')
                  ->get();
                  // dd($tickets);
        return view('attendee.my_tickets', compact('p_tickets', 'u_tickets'));
      }

      public function myEvents()
      {
        $organizer = Auth::guard('customer')->user();
        // $events = DB::table('events')
        //           ->join('event_organizers', 'events.id', '=', 'event_organizers.event_id')
        //           ->join('transactions', 'event_organizers.event_id', '=', 'transactions.event_id')
        //           ->join('booked_events', 'transactions.id', '=', 'booked_events.transaction_id')
        //           ->where('event_organizers.organizer_id', $organizer->id)
        //           ->orderBy('events.event_start_date', 'desc')
        //           ->get()
        //           ->unique('event_id');
        $u_events = DB::table('events')
        ->where('status', 0)
        ->where('organizer_id', $organizer->id)
        ->get();

        $p_events = DB::table('events')
        ->where('status', 1)
        ->where('organizer_id', $organizer->id)
        ->get();

        return view('organizer.my_events', compact('u_events', 'p_events'));
      }

      public function myEventsSingle($slug)
      {
        $organizer = Auth::guard('customer')->user();
        $event = DB::table('events')->where('slug', $slug)->first();

        return view('organizer.my_events_single', compact('event'));
      }
}
