<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Autoroad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('/template/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('/template/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('/template/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('/template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ URL::asset('/template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/template/css/style.css') }}">
    
	@if (session('status'))
  <script>
    window.alert("Password Reset Sucessfully"{{ session('status') }});
  </script>
  @endif
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Auto<span>road</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          @guest
          @if (Route::has('register'))
          
          @endif
          @else
          <?php $type = Auth::user()->type?>
          @if ($type == 1)
          
          @endif
          @if ($type == 2)
        <li class="nav-item"><a href="{{url('/car-register')}}" class="nav-link">Add Car</a></li>
          @endif
          @endguest
          @guest
          @if (Route::has('register'))
          @endif
          @else
          <?php $a=Auth::user()->id ?>
          <?php $type = Auth::user()->type?>
          @if ($type == 2)
          <li class="nav-item"><a href="{{ url("/your-car/$a") }}" class="nav-link">Your Car</a></li>
          <li class="nav-item"><a href="{{ url("/order") }}" class="nav-link"> Your Order</a></li>
          @endif
          @if ($type == 1)
        <li class="nav-item"><a href="{{url("/order")}}" class="nav-link">Order Details</a></li>
          @endif
          @endguest
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/manage-account') }}">{{ __('Your Account')}} </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
          <li class="nav-item active"></li>
        </ul>
      </div>
    </div>
    </nav>
    <!-- END nav -->
    @yield('content')
    
    <footer class="ftco-footer ftco-bg-dark ftco-section" id="about">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Autoroad</h2>
              <p>Autoroad is a car rental company established @ 2019 in Kannur.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
<div class="col-md">
        <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Autoroad head office,autoroad complex,kannur</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 7356208392</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@Autoroad.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="{{ URL::asset('template/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/aos.js') }}"></script>  
  <script src="{{ URL::asset('template/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('template/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ URL::asset('template/js/google-map.js') }}"></script>
  <script src="{{ URL::asset('template/js/main.js') }}"></script>
  <script> 
    document.getElementById("focusfield").focus();
    </script>

 </body>
 </html>