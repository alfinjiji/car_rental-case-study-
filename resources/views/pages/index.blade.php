@extends('layouts.app1')
	@section('content')
    <div class="hero-wrap" style="background-image: url('{{ URL::asset('template/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center">
          <div class="col-lg-6 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text">
	            <h1 class="mb-4">Now <span>It's easy for you</span> <span>rent a car</span></h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
			</div>
          </div>
          <div class="col-lg-2 col"></div>
          <div class="col-lg-4 col-md-6 mt-0 mt-md-5 d-flex">  
			@guest
			@if (Route::has('register'))
			<form method="POST" action="{{ route('login') }}" class="request-form ftco-animate">
			@csrf
			  <h2>USER LOGIN!</h2>
			  
            <div class="form-group">
					<input id="email" type="email" placeholder="{{ __('E-Mail') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
			
	    	<div class="form-group">
					<input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
			</div>
			<div class="form-group">
				<div class="text">
					<p style="font-size: 15px; color: black"></p><!-- remenber me -->
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					{{ __('Login') }}
				</button>
			</div>
			<div class="form-group">	
				@if (Route::has('password.request'))
                 <a class="btn btn-link" href="{{ route('password.request') }}">
                 {{ __('') }}{{__('forgot password') }}</a>
                 @endif
	        </div>
	        <div class="text">
				<p style="font-size: 15px; color: black">Don't have an account? <a style="color: blue;" href="{{ route('register') }}">Sign Up</a></p>
			</div><br>
			</form>
			@endif
		    @endguest
        </div>
        </div>
      </div>
	</div>
	@guest
@if (Route::has('register'))
<section class="ftco-section">
    	
   </section>
@endif
 @else
	<?php $type = Auth::user()->type ?>
 	@if ($type != 2)
    <section class="ftco-section ftco-no-pb ftco-no-pt">
			<script type="text/javascript">
				var subcategory = {
					Maruthi_Suzuki: [" ", "Alto", "Swift", "Wagnor"],
					TATA: [" ", "Nexon", "Hexa", "Sumo"]
				}
		
				function makeSubmenu(value) {
					if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
					else {
						var citiesOptions = "";
						for (categoryId in subcategory[value]) {
							citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
						}
						document.getElementById("categorySelect").innerHTML = citiesOptions;
					}
				}
		
				function displaySelected() {
					var country = document.getElementById("category").value;
					var city = document.getElementById("categorySelect").value;
					alert(country + "\n" + city);
				}
		
				function resetSelection() {
					document.getElementById("category").selectedIndex = 0;
					document.getElementById("categorySelect").selectedIndex = 0;
				}
			</script>
    	<div class="container" onload="resetSelection()">
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate mb-5">
							<form action="filter" action="POST" class="search-property-1">
								@csrf
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="">Select Brand</label>
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="brand" class="form-control" id="category" size="1" onchange="makeSubmenu(this.value)">
									<option value="" disabled selected>--Choose Brand--</option>
									<option>Maruthi_Suzuki</option>
									<option>TATA</option>
									</select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="">Select Model</label>
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="model" class="form-control" id="categorySelect" size="1">
									<option value="" disabled selected>--Choose Model--</option>
									<option></option>
									</select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="">Select City</label>
		        					<div class="form-field">
		          					<div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="city" id="" class="form-control">
		                      	<option value="">--Select City--</option>
		                        <option value="kasaragod">Kasaragod</option>
								<option value="kannur">Kannur</option>
								<option value="waynad">Waynad</option>
		                        <option value="kozhikode">Kozhikode</option>
		                        <option value="malappuram">Malappuram</option>
		                          </select>
		                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Search" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
	</section>
	@endif
 	@if ($type == 2)<br><br><br> @endif
@endguest

    <section class="ftco-section services-section ftco-no-pt ftco-no-pb">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Our Services</span>
            <h2 class="mb-2">Our Services</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-customer-support"></span></div>
	                <h3 class="heading mb-0 pl-3">24/7 Car Support</h3>
                </div>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-route"></span></div>
	                <h3 class="heading mb-0 pl-3">Lots of location</h3>
                </div>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-online-booking"></span></div>
	                <h3 class="heading mb-0 pl-3">Reservation</h3>
                </div>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon"><span class="flaticon-rent"></span></div>
	                <h3 class="heading mb-0 pl-3">Rental Cars</h3>
                </div>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
	</section>
@guest
@if (Route::has('register'))
<section class="ftco-section">
    	
   </section>
@endif
 @else
<?php $type = Auth::user()->type ?>
 @if ($type == 2)
    <section class="ftco-section">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center">
					<div class="col-md-12 heading-section text-center ftco-animate mb-5">
						<span class="subheading">Your cars</span>
						  <h2 class="mb-2">The Car you Register</h2>
						</div>
		</div>
		<div class="row">
				@if(empty($cars))
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="heading">You Don't Have any Car</span>
				<a href="{{url('/car-register')}}">Click Here</a> to Register
				  </div>
				@endif
					@foreach ($cars as $car)
						<div class="col-md-3">
							  <div class="car-wrap ftco-animate">
								<div class="img d-flex align-items-end" style="background-image: url(/storage/images/{{ $car->car_image }});">
									<div class="price-wrap d-flex">
						<span class="rate">₹{{ $car->price }}</span>
										<p class="from-day">
											<span>From</span>
											<span>/Day</span>
										</p>
									</div>
								</div>
								<div class="text p-4 text-center">
									<h2 class="mb-0"><a href="{{ url("/car-single/$car->id") }}">{{ $car->brand }}</a></h2>
									<span>{{ $car->model }}</span>
									</div>
							</div>
						</div>   
				@endforeach
						
					</div>
    	</div>
	</section>
	@endif
	@if ($type == 1)
	<section class="ftco-section">
	</section>
	@endif
@endguest
    <section class="ftco-section services-section img" style="background-image: url('{{ URL::asset('template/images/bg_2.jpg') }}');">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Work flow</span>
            <h2 class="mb-3">How it works</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                <h3>Pick Destination</h3>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-select"></span></div>
                <h3>Select Term</h3>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                <h3>Choose A Car</h3>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services services-2">
              <div class="media-body py-md-4 text-center">
              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-review"></span></div>
                <h3>Enjoy The Ride</h3>
                <p>A small river named Duden flows by their place and supplies it with you</p>
              </div>
            </div>      
          </div>
    		</div>
    	</div>
    </section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container"> </div>
		</section>
  @endsection

  