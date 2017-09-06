<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;

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

    public function pastEvents()
    {
      $events = DB::table('events')->where('status', 1)->orderBy('hits', 'desc')->paginate(6);
      return view('events.gallery', compact('events'));
    }

    public function upcomingEvents()
    {
      $events = DB::table('events')->where('status', 0)->paginate(5);
      return view('events.upcoming', compact('events'));
      // return view('events.upcoming');
    }

    public function singleEvent($slug)
    {
      $id = DB::table('events')->where('slug', $slug)->value('id');
      $event = Event::find($id);
      $related_events = DB::table('events')->where('category', $event->category)
                                           ->where('status', 0)
                                           ->take(3)
                                           ->orderBy('hits', 'desc')
                                           ->get();

      return view('events.single', compact('event', 'related_events'));
    }

    public function blogs()
    {
      return view('pages.blog');
    }

    public function singleBlog()
    {
      return view('pages.single_blog');
    }

    public function checkout()
    {
      return view('payment.checkout');
    }

    public function search(Request $request)
    {
      if ($request->has('query')) {
        $q = $request->input("query");
        $query = DB::table('events')->select('title', 'category', 'regular_fee', 'image_path', 'slug')
        ->where('title', 'like', '%'.$q.'%')
        ->orWhere('category', 'like', '%'.$q.'%')
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
