<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/seat_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <!-- New -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="{{asset('asset/js/jquery.counterup.min.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<!-- This is Navbar section -->

<nav class="navbar navbar-expand-md main-menu">
    <div class="container">
      <a class="navbar-brand" href="#"><img class="img-fluid w-100" src="{{asset('asset/images/logo.png')}}" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/all_buses_list') }}">Bus Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
          @if (Route::has('login'))

                    @auth
                    <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }}
                          </a>
                          <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ url('/profile.edit') }}">Profile</a>
                              <a class="dropdown-item" href="{{ url('/purchase_history') }}">Purchase History</a>
                              <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                  </a>
                            </form>
                          </div>
                      </li>
                    @else
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth

            @endif
        </ul>

      </div>
    </div>
  </nav>

    <!-- This is Navber section -->

@yield('content')

<!-- Payment partner Icon -->
<section id="payment">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/bkash-home.png') }}" alt="">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/nagad-32.png') }}" alt="">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/nexus-debit-home.svg') }}" alt="">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/visa-home.png') }}" alt="">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/rocket-home.svg') }}" alt="">
        </div>
      </div>
      <div class="col-lg-2">
        <div class="payment-img">
          <img class="img-fluid" src="{{ asset('asset/images/payment/upay-home.svg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Payment partner Icon end -->
<!-- Footer section start -->
{{-- <section id="footer">
  <div class="container footer">
    <div class="row">
      <div class="col-lg-4">
        <img src="{{ asset('asset/images/logo.png') }}" class="w-50" alt="">
      </div>
      <div class="col-lg-4">
        <p class="footer-text"> <a href="#">Terms and Conditions </a> | <a href="#">Privacy Policy</a></p>
      </div>
      <div class="col-lg-4">
        <h3> E-ticketing</h3>
        <p> নিরাপদ . আরামদায়ক . সাশ্রয়ী</p>
      </div>
    </div>
  </div>
</section> --}}

{{-- <section class="copyright m-4">
  <p class="text-center"> © 2024. All Rights Reserved.</p>
</section> --}}
<!-- Footer section end -->



{{-- new footer --}}
<footer class="new_footer_area bg_color">
    <div class="new_footer_top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
              <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
              <p> Get in touch with us via email or phone. We are always ready to help.</p>
              <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                <p class="mchimp-errmessage" style="display: none;"></p>
                <p class="mchimp-sucmessage" style="display: none;"></p>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
              <h3 class="f-title f_600 t_color f_size_18">Download</h3>
              <ul class="list-unstyled f_list">
                <li><a href="#">Company</a></li>
                <li><a href="#">Android App</a></li>
                <li><a href="#">ios App</a></li>
                <li><a href="#">Desktop</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">My tasks</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
              <h3 class="f-title f_600 t_color f_size_18">Help</h3>
              <ul class="list-unstyled f_list">
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Term &amp; conditions</a></li>
                <li><a href="#">Reporting</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Support Policy</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
              <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
              <div class="f_social_icon">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-pinterest"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_bg">
        <div class="footer_bg_one"></div>
        <div class="footer_bg_two"></div>
      </div>
    </div>
    <div class="footer_bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-7">
            <p class="mb-0 f_400">© all rights reserved</p>
          </div>
          <div class="col-lg-6 col-sm-5 text-right">
            <p>Made with <i class="icon_heart"></i> in <a href="#" target="_blank">E-Ticket</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
{{-- new footer --}}







<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('asset/js/bus_seat.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
<!-- <script src="{{ asset('asset/fontawesome/all.min.js') }}"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</body>
</html>
