<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
      $events = DB::table('events')->where('status', 0)->orderBy('hits', 'desc')->take(6)->get();
      return view('welcome', compact('events'));
    }

    public function contact()
    {
      return view('pages.contact');
    }

    public function pastEvents()
    {
      $events = DB::table('events')->where('status', 1)->orderBy('hits', 'desc')->paginate(6);
      return view('events.gallery', compact('events'));
    }

    public function upcomingEvents()
    {
      $events = DB::table('events')->where('status', 0)->paginate(5);
      return view('events.upcoming', compact('events'));
    }

    public function singleEvent($slug)
    {
      $customer = Auth::guard('customer')->user();

      $id = DB::table('events')->where('slug', $slug)->value('id');
      $event = Event::find($id);
      $related_events = DB::table('events')->where('category', $event->category)
                                           ->where('status', 0)
                                           ->take(3)
                                           ->orderBy('hits', 'desc')
                                           ->get();
      if (Auth::guard('customer')->check()) {
        $customer_id = $customer->id;
        return view('events.single', compact('event', 'related_events', 'customer_id'));
      }else {
        return view('events.single', compact('event', 'related_events'));
      }

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
        $query = DB::table('events')->select('title', 'category', 'organizer', 'regular_fee', 'image_path', 'slug', 'event_start_date', 'status')
        ->where('title', 'like', '%'.$q.'%')
        ->orWhere('category', 'like', '%'.$q.'%')
        ->orWhere('organizer', 'like', '%'.$q.'%')
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
}
