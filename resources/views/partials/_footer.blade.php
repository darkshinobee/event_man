<div class="myFooter">
  <div class="top-footer">
    <div class="container">
      <div class="row">

        <div class="site-branding col-md-8">
          {{-- <a href="#"><img src="/images/t_logo2.png" alt="logo"></a> --}}
        </div>
        <div class="col-md-4">

          <p class="pull-right">&copy; 2017 TICKETROOM. ALL RIGHTS RESEVED</p>
        </div>
      </div>

    </div>
  </div>

  <div class="main-footer">
    <div class="container">
      <div class="row">
        <div class="footer-1 col-md-9">
          <div class="about clearfix">
            <h3>About</h3>
            <ul>
              <li><a href="{{ route('about') }}">The Company</a></li>
              {{-- <li><a href="#">Careers</a></li> --}}
              {{-- <li><a href="#">Advertising</a></li> --}}
              {{-- <li><a href="#">Terms of Service</a></li> --}}
              <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="support clearfix">
            <h3>Support and Contact</h3>
            <ul>
              <li><a href="{{ route('contact') }}">Customer Support Contacts</a></li>
              {{-- <li><a href="#">Help</a></li> --}}
            </ul>
          </div>

          <div class="social clearfix">
            <h3>Stay Connected</h3>
            <ul>
              <li class="facebook">
                <a href="https://www.facebook.com/">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  Facebook
                </a>
              </li>
              <li class="twitter">
                <a href="https://twitter.com/">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  Twitter
                </a>
              </li>
              {{-- <li class="linkedin">
                <a href="https://www.linkedin.com/">
                  <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                  LinkedIn
                </a>
              </li> --}}
              {{-- <li class="google">
                <a href="https://plus.google.com">
                  <i class="fa fa-google-plus-square" aria-hidden="true"></i>
                  Google+
                </a>
              </li> --}}
              <li class="rss">
                <a href="https://www.instagram.com/">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  Instagram
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="footer-2 col-md-3">
          <div class="footer-dashboard">
            <h3>TICKETROOM Dashboard</h3>
            <ul>
              <li><a href="{{ route('my_events') }}">Organizer</a></li>
              <li><a href="{{ route('my_tickets') }}">Attendee</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
