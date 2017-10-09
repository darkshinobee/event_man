<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventApproved;
use App\Mail\EventRejected;
use App\Mail\AdminContactOrganizer;
use App\Customer;
use App\Event;
use Session;

class AdminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function eventRequest()
  {
    $events = DB::table('events')
    ->where('approval', null)->where('status', 0)
    ->orderBy('event_start_date', 'desc')
    ->paginate(4);
    return view('admin.event_request', compact('events'));
  }

  public function singleEvent($event_id)
  {
    $event = DB::table('events')->where('id', $event_id)->first();
    $organizer = Customer::find($event->organizer_id);
    return view('admin.single_event', compact('event', 'organizer'));
  }

  public function eventInfo($event_id)
  {
    $event = DB::table('events')->where('id', $event_id)->first();
    $organizer = Customer::find($event->organizer_id);
    return view('admin.event_info', compact('event', 'organizer'));
  }

  public function organizerEvents($organizer_id)
  {
    $organizer = Customer::find($organizer_id);
    $u_events = DB::table('events')
    ->where('status', 0)
    ->where('approval', 1)
    ->where('organizer_id', $organizer_id)
    ->get();

    $p_events = DB::table('events')
    ->where('status', 1)
    ->where('approval', 1)
    ->where('organizer_id', $organizer_id)
    ->get();
    return view('admin.organizer_events', compact('u_events', 'p_events', 'organizer'));
  }

  public function approve($event_id)
  {
    DB::table('events')->where('id', $event_id)
    ->update(['approval' => 1]);
    $event = Event::find($event_id);
    $organizer = Customer::find($event->organizer_id);
    Mail::to($organizer->email)->send(new EventApproved($event, $organizer));
    Session::flash('success', 'Event Approved');
    return redirect()->action('AdminController@eventInfo', $event_id);
  }

  public function reject($event_id)
  {
    DB::table('events')->where('id', $event_id)
    ->update(['approval' => 0]);
    $event = Event::find($event_id);
    $organizer = Customer::find($event->organizer_id);
    Mail::to($organizer->email)->send(new EventRejected($organizer));
    Session::flash('success', 'Event Rejected');
    return redirect()->action('AdminController@dashboard');
  }

  public function searchEventPage()
  {
    return view('admin.search_event');
  }

  public function searchEvent(Request $request)
  {
    if ($request->has('query')) {
      $q = $request->input("query");
      $query = DB::table('events')->select('id', 'title', 'venue', 'state', 'organizer', 'organizer_id', 'status', 'event_start_date')
      ->where('approval', 1)
      ->where(function ($ww) use ($q){
        $ww->where('title', 'like', '%'.$q.'%')
        ->orWhere('category', 'like', '%'.$q.'%')
        ->orWhere('organizer', 'like', '%'.$q.'%')
        ->orWhere('state', 'like', '%'.$q.'%');
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

  public function searchOrganizerPage()
  {
    return view('admin.search_organizer');
  }

  public function searchOrganizer(Request $request)
  {
    if ($request->has('query')) {
      $q = $request->input("query");
      $query = DB::table('customers')->select('id', 'first_name', 'last_name', 'email')
      ->where('first_name', 'like', '%'.$q.'%')
      ->orWhere('last_name', 'like', '%'.$q.'%')
      ->orWhere('email', 'like', '%'.$q.'%')
      ->get();
      if ($query->Count()) {
        return $query;
      }else {
        return "no match";
      }
    }
    return "empty";
  }

  public function contactOrganizer(Request $request)
  {
    $organizer = Customer::find($request->organizer_id);
    Mail::to($organizer->email)->send(new AdminContactOrganizer($request, $organizer));
    Session::flash('success', 'Message Sent');
    return redirect()->action('AdminController@dashboard');
  }
}
