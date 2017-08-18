<header id="masthead" class="site-header">
  <div class="top-header top-header-bg">
    <div class="container">
      <div class="row">
        <div class="top-left">
          <ul>
            <li>
              <a href="#">
                <i class="fa fa-phone"></i>
                0801 234 5678
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-envelope-o"></i>
                test@ticketroom.ng
              </a>
            </li>
          </ul>
        </div>
        <div class="top-right">
          <ul>
            <li>
              <a href="#">Sign In</a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up</a>
            </li>

            <!-- Modal -->
          <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="signUpModalLabel">SIGN UP</h5>
                </div>
                <div class="modal-body">
                  <div class="section-page-content">
                    <div class="row">
                      <div class="col-sm-10 col-sm-offset-1">
                        <form>
                          {{ csrf_field() }}
                          <input type="text" class="form-control" name="first_name" required="" placeholder="First Name" maxlength="50">
                          <input type="text" class="form-control m-t-10" name="last_name" required="" placeholder="Last Name" maxlength="50">
                          <input type="email" class="form-control m-t-10" name="email" required="" placeholder="Email">

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Go To Login</button> --}}
                  <button type="button" class="btn myBtn">Register</button>
                </div>
              </div>
            </div>
          </div>
          {{-- End Sign Up Modal --}}

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="main-header main-header-bg">
    <div class="container">
      <div class="row">
        <div class="site-branding col-md-3">
          <h1 class="site-title"><a href="#" title="myticket" rel="home"><img src="/theme/publish/images/logo.png" alt="logo"></a></h1>
        </div>

        <div class="col-md-9">
          <nav id="site-navigation" class="navbar">
            <!-- toggle get grouped for better mobile display -->
            <div class="navbar-header">
              {{-- <div class="mobile-cart" ><a href="#">0</a></div> --}}
              <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right" id="js-bootstrap-offcanvas">
              <button type="button" class="offcanvas-toggle closecanvas" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                 <i class="fa fa-times fa-2x" aria-hidden="true"></i>
              </button>

              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/upcoming_events">Events</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a class="btn myBtn" href="#">CREATE EVENT</a></li>
                {{-- <li class="cart"><a href="#">0</a></li> --}}
              </ul>
            </div>
          </nav><!-- #site-navigation -->
        </div>
      </div>
    </div>
  </div>
</header><!-- #masthead -->
