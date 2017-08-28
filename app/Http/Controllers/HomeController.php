<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return view('events.gallery');
    }

    public function upcomingEvents()
    {
      return view('events.upcoming');
    }

    public function singleEvent()
    {
      return view('events.single');
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
}
