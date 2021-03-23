@extends('layouts.app1')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/image_1.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car Order <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Order Car</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="focusfield" tabindex="1" style="outline:none;">
   	  <div class="container">
        <div class="row">
    			<div class="col-md-12 ftco-animate">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th class="bg-dark heading">Brand & Model</th>
						        <th class="bg-primary heading">Per Day Rate</th>
						        <th class="bg-dark heading">Leasing</th>
						      </tr>
						    </thead>
						    <tbody>
                  @foreach ($cars as $car)
						      <tr class="">
                    <td class="car-image"><div class="img" style="background-image:url('/storage/images/{{ $car->car_image }}');"></div>
                      <div style="text-align:center;"></div><br>
                      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <span class="subheading">{{$car->brand}}</span>
                        <h5 class="mb-2">{{$car->model}}</h5>
                      </div>
                    </td>
						        
						        <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
							        		<span style="color:darkorange"><small class="currency">₹</small>{{$car->price}}</span>
							        		<span class="subheading"><small style="color:rgb(135, 135, 135);">/per day</small></span>
							        	</h3>
							        	<span class="subheading">₹300/ hour fuel surcharges</span>
							        </div>
						        </td>

						        <td style="text-align:center; background-color:rgb(242, 242, 242);">
						        	<div class="price-rate">
							        	<h3>
                          <?php $a=$car->price ?>
                          <?php $tp=$a * 28 ?>
							        		<span style="color:darkorange"><small class="currency">₹</small><?php echo $tp ?></span>
							        		<span class="subheading"><small style="color:rgb(135, 135, 135);">/per month</small></span>
							        	</h3>
							        	<span class="subheading">₹300/ hour fuel surcharges</span>
							        </div>
						        </td>
						      </tr>
					      </tbody>
					  </table>
    			</div>
    		</div> 
          <table class="table">
            <thead>
              <tr>
                <th scope="col"><b>Pickup Date</b></th>
                <th scope="col"><b>Dropoff Date</b></th>
                <th scope="col"><b>Total Price</b></th>
              </tr>
            </thead>
            <script type="text/javascript">
              function GetDays(){
                      var dropdt = new Date(document.getElementById("drop_date").value);
                      var pickdt = new Date(document.getElementById("pick_date").value);
                      return parseInt((dropdt - pickdt) / (24 * 3600 * 1000)) * {{ $car->price }};
              }
      
              function cal(){
              if(document.getElementById("drop_date")){
                  document.getElementById("total").value=GetDays();
              }  
          }
      
          </script>
          <form action="/order" method="POST">
                @csrf
            <tbody>
              <tr>
                <td><input style="border: none; text-align: center;" id="pick_date" onchange="cal()" type="date" name="pickup_date" required></td>
                <td><input style="border: none; text-align: center;" id="drop_date" onchange="cal()" type="date" name="dropoff_date" required></td>
                <td><input style="border: none; text-align: center;" id="total" name="total" type="text"></td>
              <input type="hidden" name="car_id" value="{{$car->id}}">
              <input type="hidden" name="rental_id" value="{{$car->uid}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              </tr>
        @endforeach
            </tbody>
          </table>
          <div class="float-right">
          <button type="submit" class="btn btn-primary py-3 px-5">Place Order</button>
          </div>
        </form>
        @if (session('alert'))
        <div class="alert alert-success alert-block">
          <h2>Order Sucess</h2>
            <strong>{{ session('alert') }}</strong>
          </div>
        @endif
       </div>
    </section>
@endsection