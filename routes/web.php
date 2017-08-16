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

Route::get('/', function () {
    return view('welcome');
});
Route::get('contact', function () {
    return view('pages.contact');
});
Route::get('gallery', function () {
    return view('pages.gallery');
});
Route::get('blog', function () {
    return view('pages.blog');
});
Route::get('single_event', function () {
    return view('events.single');
});
Route::get('single_blog', function () {
    return view('pages.single_blog');
});
