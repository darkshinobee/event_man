<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', function () {
    $guest = App\GuestList::find(1);
    $attendee = App\Customer::find(3);
    $event = App\Event::find(11);
    $tran = App\Transaction::find(2);
    $book = App\BookedEvent::find(2);
    $a = 16;
    $b = 1;
    // return view('events.attendance', compact('guest', 'attendee', 'event', 'tran', 'book'));
    return redirect()->action('HomeController@attendance',[$guest->reference]);
});

// Route::get('/test', function () {
//     Mail::to('test@t.com')->send(new App\Mail\TestMail);
//     return new App\Mail\TestMail;
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::post('/contact', 'HomeController@contactMail')->name('contact_mail');
Route::get('/gallery', 'HomeController@pastEvents')->name('past_events');
Route::get('/upcoming_events', 'HomeController@upcomingEvents')->name('upcoming_events');
Route::get('/events/{slug}', 'HomeController@singleEvent')->name('single_event');
// Route::get('/blog', 'HomeController@blogs')->name('blog');
// Route::get('/single_blog', 'HomeController@singleBlog')->name('single_blog');
Route::get('/search/{key}', 'HomeController@search');

Route::get('/my_tickets', 'HomeController@myTickets')->name('my_tickets')->middleware('customer');

Route::get('/my_events', 'HomeController@myEvents')->name('my_events')->middleware('customer');
Route::get('/my_events_single/{slug}', 'HomeController@myEventsSingle')->name('my_events_single')->middleware('customer');

Route::get('/attendance/{reference}', 'HomeController@attendance')->name('attendance');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['prefix' => '/event', 'middleware' => 'customer'], function() {
  Route::get('/create', 'EventController@create')->name('events.create');
  Route::post('/store', 'EventController@store')->name('events.store');
  Route::post('/checkout/{slug}', 'EventController@checkout')->name('checkout');
  Route::get('/order_success/{reference}', 'EventController@orderSuccess')->name('order_success');
  Route::get('/order_fail/{reference}', 'EventController@orderFail')->name('order_fail');
  Route::get('/view_list/{event_id}', 'EventController@viewList')->name('view_list');
  // Route::post('/hit/{event_id}/{customer_id}', 'EventController@eventHit')->name('event_hit');
  // Route::post('/miss/{event_id}/{customer_id}', 'EventController@eventMiss')->name('event_miss');
});
Route::post('/event/contact_organizer', 'EventController@contactOrganizer')->name('contact_organizer');
Route::get('/category/{category}', 'EventController@eventCategories')->name('events.category');

Route::group(['prefix' => '/customer'], function () {
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout');

  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => '/admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')->middleware('admin');
  Route::get('/event_request', 'AdminController@eventRequest')->name('event_request')->middleware('admin');
  Route::get('/single_event/{event_id}', 'AdminController@singleEvent')->name('admin_single_event')->middleware('admin');
  Route::get('/event_info/{event_id}', 'AdminController@eventInfo')->name('event_info')->middleware('admin');
  Route::get('/search_event_page', 'AdminController@searchEventPage')->name('search_event_page')->middleware('admin');
  Route::get('/search_event', 'AdminController@searchEvent')->name('search_event')->middleware('admin');
  Route::get('/search_organizer_page', 'AdminController@searchOrganizerPage')->name('search_organizer_page')->middleware('admin');
  Route::get('/search_organizer', 'AdminController@searchOrganizer')->name('search_organizer')->middleware('admin');
  Route::get('/organizer_events/{id}', 'AdminController@organizerEvents')->name('organizer_events')->middleware('admin');
  Route::get('approve/{event_id}', 'AdminController@approve')->name('approve')->middleware('admin');
  Route::get('reject/{event_id}', 'AdminController@reject')->name('reject')->middleware('admin');
  Route::post('contact_organizer', 'AdminController@contactOrganizer')->name('admin_contact_organizer')->middleware('admin');
});
