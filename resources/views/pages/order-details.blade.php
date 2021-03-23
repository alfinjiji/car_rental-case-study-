@extends('layouts.app1')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/image_1.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car Order <i class="ion-ios-arrow-forward"></i></span></p>
          <?php $type = Auth::user()->type?>
          @if ($type == 2) 
          <h1 class="mb-3 bread">Your Order</h1> 
          @endif
          @if ($type == 1)
          <h1 class="mb-3 bread">Order Car</h1>
          @endif
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="focusfield" tabindex="1" style="outline:none;">
   	  <div class="container">
        @if (session('alert'))
        <div class="alert alert-success">
          {{ session('alert') }}
        </div>
        @endif
        @if(count($orders) < 1)
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h3 class="heading">You Don't Have any Order</h3>
          </div>
        @endif
        @foreach ($orders as $order)
        <div class="row">
    			<div class="col-md-12 ftco-animate">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
                    <th class="bg-black heading">Brand & Model</th>
                    @if ($type == 2) 
                    <th class="bg-dark heading">Customer Details</th>
                    @endif
                    @if ($type == 1) 
                    <th class="bg-dark heading">Rental Details</th>
                    @endif
						        <th class="bg-dark heading">Pickup Date</th>
						        <th class="bg-dark heading">Dropoff Date</th>
                    <th class="bg-dark heading">Total Price Amount</th>
						      </tr>
                </thead>
						    <tbody>
						      <tr class="">
                    <td class="car-image" style="background-color:rgb(242, 242, 242);"><div class="img" style="background-image:url('/storage/images/{{$order->car_image}} ');"></div>
                      <div style="text-align:center;"></div><br>
                      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <span class="subheading">{{$order->brand}}</span>
                      <h5 class="mb-2">{{$order->model}}</h5>
                      </div>
                    </td>
						        
						        <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
                          <span>{{$order->name}}</span>
                        </h3>
                      <span class="subheading">{{$order->address}}</span>
                      <p>{{$order->mobile}}</p>
							        </div>
                    </td>

                    <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
                          <span>{{$order->pickup_date}}</span>
							        	</h3>
							        </div>
                    </td>

                    <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
							        		<span>{{$order->dropoff_date}}</span>
							        	</h3>
							        </div>
                    </td>
                    
                    <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
							        		<span style="color:darkorange"><small class="currency">₹</small>{{$order->total}}</span>
							        	</h3>
                      </div>
                      @if ($type == 1)
                      <div class="price-rate">
							        	<h3>
                        <button class="btn btn-danger"><a href="cancel/{{$order->id}}" class="text-white">Cancel Order</a></button>
							        	</h3>
                      </div>
                      @endif
                    </td>
						      </tr>
                </tbody>
                @endforeach
                
					  </table>
    			</div>
    		</div> 
       </div>
    </section>
@endsection