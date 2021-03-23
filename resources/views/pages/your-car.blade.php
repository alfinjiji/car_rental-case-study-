@extends('layouts.app1')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/image_1.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Your Car <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Your Car</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="focusfield" tabindex="1" style="outline:none;">
   	  <div class="container">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Your cars</span>
            <h2 class="mb-2">The Car you Register</h2>
          </div>
          @if (session('alert'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ session('alert') }}</strong>
            </div>
          @endif
		        
    		<div class="row">

        @if(empty($cars))
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="heading">You Don't Have any Car</span>
        <a href="{{url('/car-register')}}">Click Here</a> to Register
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
              <p class="d-flex mb-0 d-block"><a href="{{ url("/car-single/$car->id") }}" class="btn btn-black btn-outline-black mr-1">Details</a> <a href="{{url("deletecar/$car->id")}}" class="btn btn-black btn-outline-black ml-1">Delete</a></p>
    					</div>
    				</div>
    			</div>   
        @endforeach
    			
    		</div>
		</div>
    </section>
@endsection