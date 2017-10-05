<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Customer;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('customer.guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:customers',
      'password' => 'required|min:6|confirmed',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return Customer
  */
  protected function create(array $data)
  {
    $user = Customer::create([
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
      'hits' => 0,
      'misses' => 0
    ]);

    Mail::to($data['email'])->send(new Welcome($data['first_name']));
    Session::flash('success', 'Welcome '.$data['first_name']);
    return $user;
  }

  /**
  * Show the application registration form.
  *
  * @return \Illuminate\Http\Response
  */
  public function showRegistrationForm()
  {
    // return view('customer.auth.register');
  }

  /**
  * Get the guard to be used during registration.
  *
  * @return \Illuminate\Contracts\Auth\StatefulGuard
  */
  protected function guard()
  {
    return Auth::guard('customer');
  }
}
