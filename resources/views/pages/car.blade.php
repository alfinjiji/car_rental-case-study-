@extends('layouts.app1')
@section('content')
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/image_1.jpg') }} ');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="focusfield" tabindex="1" style="outline:none;">
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
          <div class="col-md-12 heading-section text-center ftco-animate mb-5" id="focusField">
			@guest
			@if (Route::has('register'))
			<h2 class="mb-2">Please Login </h2>
			<span class="subheading"><a href="{{url('/')}}">Click here to login</a></span>
			@endif
			@else
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Choose Your Car</h2>
          </div>
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
		        
    		<div class="row">
				
					@if(empty($cars))
					<div class="col-md-12 heading-section text-center ftco-animate mb-5">
						<h1><span class="heading">Sorry Car Not Found!</span></h1>
					  </div>
					@endif
					@foreach ($cars as $car)
					<div class="col-md-3">
						  <div class="car-wrap ftco-animate"><a href="{{ url("/car-single/$car->id") }}">
							<div class="img d-flex align-items-end" style="background-image: url(/storage/images/{{ $car->car_image }});">
								<div class="price-wrap d-flex">
					<span class="rate">₹{{ $car->price }}</span>
									<p class="from-day">
										<span>From</span>
										<span>/Day</span>
									</p>
								</div>
							</div></a>
							<div class="text p-4 text-center">
								<h2 class="mb-0"><a href="{{ url("/car-single/$car->id") }}">{{ $car->brand }}</a></h2>
								<span>{{ $car->model }}</span>
				  <p class="d-flex mb-0 d-block"><a href="{{ url("/order/$car->id") }}" class="btn btn-black btn-outline-black mr-1">Book</a> <a href="{{ url("/car-single/$car->id") }}" class="btn btn-black btn-outline-black ml-1">Details</a></p>
							</div>
						</div>
					</div>   
			@endforeach
		    @endguest
    		</div>
		</div>
    </section>
@endsection