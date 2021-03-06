<header id="masthead" class="site-header">
  <div class="top-header top-header-bg">
    <div class="container">
      <div class="row">
        <div class="top-right">
          <ul>
            <li>
              <a href="{{ route('contact') }}">
                <i class="fa fa-phone"></i>
                +234 703 819 1374
              </a>
            </li>
            <li>
              <a href="{{ route('contact') }}">
                <i class="fa fa-envelope-o"></i>
                support@ticketroom.ng
              </a>
            </li>
          </ul>
        </div>
        <div class="top-left">
          <ul>
            @if (Auth::guard('customer')->check())
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('my_events') }}">My Events</a></li>
                  <li><a href="{{ route('my_tickets') }}">My Tickets</a></li>
                  <li><a href="{{ url('/customer/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ url('/customer/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            @else
              <li>
                <a href="#" data-toggle="modal" data-target="#signInModal">Sign In</a>
              </li>
              <li>
                <a href="#" class="p-l-5" data-toggle="modal" data-target="#signUpModal">Sign Up</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="main-header main-header-bg">
    <div class="container">
      <div class="row">
        <div class="site-branding col-sm-3 m-b-8">
          <h1 class="site-title"><a href="{{ route('home') }}" title="myticket" rel="home"><img src="{{ asset('images/logos/t_logo2.png') }}" alt="logo"></a></h1>
        </div>

        <div class="col-sm-9">
          <nav id="site-navigation" class="navbar">
            <!-- toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="collapse" data-target="#logBar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="collapse navbar-collapse" id="logBar">
              <button type="button" class="offcanvas-toggle closecanvas" data-toggle="collapse" data-target="#logBar">
                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
              </button>

              <ul class="nav navbar-nav navbar-right m-t-15">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('upcoming_events') }}">Upcoming Events</a></li>
                {{-- <li><a href="{{ route('past_events') }}">Past Events</a></li> --}}
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a class="btn myBtn" href="{{ route('events.create') }}">CREATE EVENT</a></li>
              </ul>
            </div>
          </nav><!-- #site-navigation -->
        </div>
      </div>
    </div>
  </div>
</header><!-- #masthead -->

<!-- Sign Up Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="signUpModalLabel">SIGN UP</h3>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="text-center">
                <img src="{{ asset('images/logos/t_logo.png') }}" alt="">
              </div><br>
              <form class="" id="register_form" role="form" method="POST" action="{{ url('/customer/register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                  <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required="" placeholder="First Name" maxlength="50" autofocus>
                  @if ($errors->has('first_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                  <input id="last_name" type="text" class="form-control m-t-10" name="last_name" value="{{ old('last_name') }}" required="" placeholder="Last Name" maxlength="50">
                  @if ($errors->has('last_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="form-control m-t-10" name="email" value="{{ old('email') }}" required="" placeholder="Email">
                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="password" type="password" class="form-control m-t-10" name="password" required="" placeholder="Password">

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <input id="password-confirm" type="password" class="form-control m-t-10" name="password_confirmation" required="" placeholder="Confirm Password">
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
                </div>
              </form>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Go To Login</button> --}}
        {{-- <a class="btn myBtn" form="register_form">Register</a> --}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn myBtn" form="register_form">Register</button>
      </div>
    </div>
  </div>
</div>
{{-- End Sign Up Modal --}}

<!-- Sign In Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center" id="signInModalLabel">SIGN IN</h3>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <div class="text-center">
                <img src="{{ asset('images/logos/t_logo.png') }}" alt="">
              </div><br>
              <form class="" id="login_form" role="form" method="POST" action="{{ url('/customer/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="" placeholder="Email" autofocus>

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="password" type="password" class="form-control" name="password" required="" placeholder="Password">

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                    <label>
                      <input type="checkbox" name="remember"> Remember Me
                    </label><br>
                    <a class="btn btn-link" href="{{ url('/customer/password/reset') }}">Forgot Your Password?</a>
                </div>
              </form>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn myBtn" form="login_form">Sign In</button>
      </div>
    </div>
  </div>
</div>
{{-- End Sign In Modal --}}
