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
// Route::get('/my_upcoming_tickets', 'HomeController@myUpcomingTickets')->name('my_upcoming_tickets')->middleware('customer');
// Route::get('/my_past_tickets', 'HomeController@myPastTickets')->name('my_past_tickets')->middleware('customer');

Route::get('/my_events', 'HomeController@myEvents')->name('my_events')->middleware('customer');
Route::get('/my_events_single/{slug}', 'HomeController@myEventsSingle')->name('my_events_single')->middleware('customer');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['prefix' => '/event', 'middleware' => 'customer'], function() {
  Route::get('/create', 'EventController@create')->name('events.create');
  Route::post('/store', 'EventController@store')->name('events.store');
  Route::post('/checkout/{slug}', 'EventController@checkout')->name('checkout');
  Route::get('/order_success/{reference}', 'EventController@orderSuccess')->name('order_success');
  Route::get('/order_fail/{reference}', 'EventController@orderFail')->name('order_fail');
  Route::get('/view_list/{event_id}', 'EventController@viewList')->name('view_list');
  // Route::get('/download_list/{event_id}', 'EventController@downloadList')->name('download_list');
  // Route::post('/hit/{event_id}/{customer_id}', 'EventController@eventHit')->name('event_hit');
  // Route::post('/miss/{event_id}/{customer_id}', 'EventController@eventMiss')->name('event_miss');
});
Route::post('/event/contact_organizer', 'EventController@contactOrganizer')->name('contact_organizer');
Route::get('/category/{category}', 'EventController@eventCategories')->name('events.category');

Route::group(['prefix' => '/customer'], function () {
  // Route::get('/login', 'CustomerAuth\LoginController@showLoginForm');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout');

  // Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm');
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
});
