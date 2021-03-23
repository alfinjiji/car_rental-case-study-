@extends('layouts.app1')
@section('content')   
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('/template/images/car-8.jpg') }}');" data-stellar-background-ratio="0.3">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Manage Account <i class="ion-ios-arrow-forward"></i></span></p>
          	<h1 class="mb-3 bread">Manage Account</h1>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info justify-content-center"> </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h1 class="text-center">Profile Details</h1>
            <form action="/edit/{{ Auth::user()->id }}" method="POST" class="bg-light p-5 contact-form">
              @csrf
              @if (session('alert'))
              <div class="alert alert-success" id="test">
                {{ session('alert') }}
              </div>
              @endif
              <div class="form-group">
               <label><strong>Full Name</strong></label>
                <input type="text" name="name" pattern="[A-Za-z ]{3,32}" title="Please enter valid name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{ Auth::user()->name }}">
              </div>
              <div class="form-group">
               <label><strong>E-mail Address</strong></label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
              </div>
              <div class="form-group">
               <label><strong> Your Address</strong></label>
                <input type="text" name="address" id="" cols="30" rows="7" class="form-control" value="{{ Auth::user()->address }}"> 
              </div>
               <div class="form-group">
               <label><strong>Mobile Number</strong></label>
                <input type="text" name="mobile" pattern="[0-9]{10}" title="It must be 10 digit Number" class="form-control" value="{{ Auth::user()->mobile }}">
              </div>
               <div class="form-group">
               <label><strong>Aadhar Number</strong></label>
                <input type="text" pattern="[0-9]{12}" title="Enter an 12 digit Aadhar Number" class="form-control" value="{{ Auth::user()->aadhar }}" readonly >
              </div>
              <div class="form-group">
               <label><strong>Licence Number</strong></label>
                <input type="text" pattern="^[0-9]{2}/[0-9]{3}/[0-9]{4}" title="Please follow the licence format eg: 12/123/1234" class="form-control" value="{{ Auth::user()->licence }}" readonly >
              </div>
   			  <div class="form-group">
                <input type="submit" value="Save Changes" class="btn btn-primary py-3 px-5">
              </div>
            </form>
            <!--
             <form action="#" class="bg-light p-5 contact-form">
             <h2 class="text-center"><strong>Change Password</strong></h2>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Old Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="New Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <input type="submit" value="Changes Password" class="btn btn-primary py-3 px-5">
              </div>
             </form>
             -->
          </div>
        </div>
</div>
    </section>

    @endsection