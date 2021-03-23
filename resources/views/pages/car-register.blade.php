@extends('layouts.app1')
@section('content')
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/car-7.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car Registration <i class="ion-ios-arrow-forward"></i></span></p>
          	<h1 class="mb-3 bread">Register your Car</h1>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section" id="focusfield" tabindex="1" style="outline:none;">
        <script type="text/javascript">
          var subcategory = {
            Maruthi_Suzuki: ["Alto", "Swift", "Wagnor"],
            TATA: ["Nexon", "Hexa", "Sumo"]
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
        <div class="row d-flex mb-5 contact-info justify-content-center"> </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
            <h1 class="text-center">Car Registration Form</h1>
            <form action="/create" method="POST" class="bg-light p-5 contact-form" enctype="multipart/form-data">
              @csrf
              @if(count($errors)>0)
              <div class="alert alert-danger">
                Upload Validation Error<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }} </li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
              </div>
            <!--  <img src="/images/{{ Session::get('path') }}" width="300"/>   -->
              @endif
              <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <label><b>Brand</b><span style="color: red;">*</span></label>
                <select name="brand" class="custom-select" id="category" size="1" onchange="makeSubmenu(this.value)" required>
                    <option value="" disabled selected>--Choose Brand--</option>
                    <option>Maruthi_Suzuki</option>
                    <option>TATA</option>
                    </select>
              </div>
              <div class="form-group">
                <label><b>Model</b><span style="color: red;">*</span></label>
                <select name="model" class="custom-select" id="categorySelect" size="1" required>
                    <option value="" disabled selected>--Choose Model--</option>
                    <option></option>
                    </select>
              </div>
              <div class="form-group">
                  <label><b>Mileage</b><span style="color: red;">*</span></label>
                  <input type="text" pattern="[0-9]{1,2}" title="Please use Numbers only" class="form-control" placeholder="KM Driven" name="km" required>
                </div>
                <div class="form-group">
                 <label><b>Seats</b><span style="color: red;">*</span></label>
                 <input type="text" pattern="[0-9]{1,2}" title="Please use Numbers only" class="form-control" placeholder="Number of Seats" name="seat" required>
               </div>
               <div class="form-group">
                <label><b>Luggage</b><span style="color: red;">*</span></label>
                <input type="text" pattern="[0-9]{1,2}" title="Please use Numbers only" class="form-control" placeholder="How Many Bags" name="luggage" required>
              </div> 
              <label><b>Transmission</b><span style="color: red;">*</span></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                   <span class="input-group-text">Gear Transmission</span>
            </div>
                   <select name="gear" class="custom-select" required>
                     <option></option>
                     <option value="Auto">Auto</option>
                     <option value="Manual">Manual</option>
                   </select>
                 </div>
               <div class="form-group">
                <label><b>Year</b><span style="color: red;">*</span></label>
                <input type="text" pattern="[0-9]{4}" title="Please enter an valid Year" class="form-control" placeholder="Year" name="year" required>
              </div>
              <div class="form-group">
                  <label><b>City</b><span style="color: red;">*</span></label>
                  <div class="input-group mb-3">
                       <select name="city" class="custom-select" required>
                          <option value="" disabled selected>--Select City--</option>
                          <option value="kasaragod">Kasaragod</option>
                          <option value="kannur">Kannur</option>
                          <option value="waynad">Waynad</option>
                          <option value="kozhikode">Kozhikode</option>
                          <option value="malappuram">Malappuram</option>
                       </select>
                     </div>
                </div>
                <label><b>Fuel</b><span style="color: red;">*</span></label>
               <div class="input-group mb-3">
               <div class="input-group-prepend">
                <span class="input-group-text">Fuel</span>
			   </div>
                <select name="fuel" class="custom-select" required>
                	<option></option>
                	<option value="Petrol">Petrol</option>
                	<option value="Diesel">Diesel</option>
                	<option value="CNG">CNG</option>
                </select>
              </div>
              <label><b>Price</b><span style="color: red;">*</span></label>
              <div class="input-group mb-3">
               <div class="input-group-prepend">
                <span class="input-group-text">₹</span>
			   </div>
                <input type="text" pattern="[0-9]{2,}" title="Please use Numbers only" class="form-control" placeholder="Price" name="price" required>
              </div>
              <label><b>Car Image</b><span style="color: red;">*</span></label>
               <div class="input-group mb-3">
               <div class="input-group-prepend">
                 <span class="input-group-text">Select Car Image<span style="color: red;">*</span></span>
			   </div>
                <input type="file" class="form-control" name="car_image" required>
               </div>
   			  <div class="form-group">
                <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
</div>
    </section>
    
  @endsection
