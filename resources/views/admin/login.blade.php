<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{URL::asset('admin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/main.css')}}">
<!--===============================================================================================-->
<style>
	/* these styles will animate bootstrap alerts. */
	.alert{
		z-index: 99;
		top: 60px;
		right:18px;
		min-width:30%;
		position: fixed;
		animation: slide 0.5s forwards;
	}
	@keyframes slide {
		100% { top: 30px; }
	}
	@media screen and (max-width: 668px) {
		.alert{ /* center the alert on small screens */
			left: 10px;
			right: 10px; 
		}
	}
</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20" >
				<form class="login100-form validate-form" method="POST" action="{{ route('admin.login') }}">
					@csrf
					<span class="login100-form-title p-b-35">
						Admin Login
					</span>
					<span class="login100-form-avatar">
						<img src="{{URL::asset('admin/images/admin.png')}}" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{ old('email') }}" required autofocus>
						<span class="focus-input100" data-placeholder="Username"></span>
						@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                         @endif
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
						
						<span class="focus-input100" data-placeholder="Password"></span>
						@if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ __('Login') }}
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
    
    {{-- Success Alert --}}
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <script>
        //close the alert after 3 seconds.
        $(document).ready(function(){
	    setTimeout(function() {
	        $(".alert").alert('close');
	    }, 3000);
    	});
    </script>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>