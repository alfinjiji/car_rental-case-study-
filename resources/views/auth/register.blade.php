@extends('layouts.app1')

    @section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ URL::asset('template/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign up <i class="ion-ios-arrow-forward"></i></span></p>
          	<h1 class="mb-3 bread">Create your Account</h1>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info justify-content-center"> </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
              <h1 class="text-center">Registration Form</h1><br>

              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home"><b>Customer</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1"><b>Car Rental</b></a>
                </li>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane container active" id="home">

                    <form method="POST" action="{{ route('register') }}" class="bg-light p-5 contact-form">
                      @csrf
                          <div class="form-group">
                                  <label><b>Full Name</b><span style="color:red;">*</span></label>
                                   <input id="name" type="text" pattern="[A-Za-z ]{3,32}" title="Please enter valid name" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              
                                   @error('name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Address</b><span style="color:red;">*</span></label>
                                   <textarea rows="4" cols="30" id="address" placeholder="{{ __('Address') }}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus></textarea>
                                   @error('address')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Mobile</b><span style="color:red;">*</span></label>
                                   <input id="mobile" type="text" pattern="[0-9]{10}" title="It must be 10 digit Number" placeholder="{{ __('Mobile') }}" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
              
                                   @error('mobile')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                        
                          <div class="form-group">
                                  <label><b>Licence</b><span style="color:red;">*</span></label>
                                   <input id="licence" type="text" pattern="^[0-9]{2}/[0-9]{3}/[0-9]{4}" title="Please follow the licence format eg: 12/123/1234" placeholder="{{ __('Licence no.') }}" class="form-control @error('name') is-invalid @enderror" name="licence" value="{{ old('licence') }}" required autocomplete="licence" autofocus>
              
                                   @error('licence')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Aadhar</b><span style="color:red;">*</span></label>
                                   <input id="aadhar" type="text" pattern="[0-9]{12}" title="Enter an 12 digit Aadhar Number" placeholder="{{ __('Aadhar no,') }}" class="form-control @error('aadhar') is-invalid @enderror" name="aadhar" value="{{ old('aadhar') }}" required autocomplete="aadhar" autofocus>
              
                                   @error('aadhar')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Email</b><span style="color:red;">*</span></label>
                                   <input id="email" type="email" placeholder="{{ __('Email ') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              
                                   @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Password</b><span style="color:red;">*</span></label>
                                   <input id="password" type="password" pattern=".{8,}" title="Eight or more characters" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              
                                   @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Confirm Password</b><span style="color:red;">*</span></label>
                                   <input id="password-confirm" type="password" pattern=".{8,}" title="Eight or more characters" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                               </div>
                               <input type="hidden" value="1" name="type">
                           <div class="form-group">
                                   <button type="submit"  class="btn btn-primary py-3 px-5">
                                       {{ __('Register') }}
                                   </button>
                            </div>
               </form>

                </div>
                <div class="tab-pane container fade" id="menu1">
                    <form method="POST" action="{{ route('register') }}" class="bg-light p-5 contact-form">
                      @csrf
                          <div class="form-group">
                                  <label><b>Company Name</b><span style="color:red;">*</span></label>
                                   <input id="name" type="text" pattern="[A-Za-z ]{3,32}" title="Please enter valid name" placeholder="{{ __(' Company Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              
                                   @error('name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Company Address</b><span style="color:red;">*</span></label>
                                   <textarea rows="4" cols="30" id="address" placeholder="{{ __('Address') }}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus></textarea>
                                   @error('address')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Mobile</b><span style="color:red;">*</span></label>
                                   <input id="mobile" type="text" pattern="[0-9]{10}" title="It must be 10 digit Number" placeholder="{{ __('Mobile') }}" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" pattern="[0-9]{10}" autofocus>
              
                                   @error('mobile')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                        
                          <div class="form-group">
                                  <label><b>Company Licence</b><span style="color:red;">*</span></label>
                                   <input id="licence" type="text" pattern="^[0-9]{2}/[0-9]{3}/[0-9]{4}" title="Please follow the licence format eg: 12/123/1234" placeholder="{{ __('Licence no.') }}" class="form-control @error('name') is-invalid @enderror" name="licence" value="{{ old('licence') }}" required autocomplete="licence" autofocus>
              
                                   @error('licence')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Aadhar</b><span style="color:red;">*</span></label>
                                   <input id="aadhar" type="text" pattern="[0-9]{12}" title="Enter an 12 digit Aadhar Number" placeholder="{{ __('Aadhar no,') }}" class="form-control @error('aadhar') is-invalid @enderror" name="aadhar" value="{{ old('aadhar') }}" required autocomplete="aadhar"  pattern="[0-9]{12}" autofocus>
              
                                   @error('aadhar')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Email</b><span style="color:red;">*</span></label>
                                   <input id="email" type="email" placeholder="{{ __('Email ') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              
                                   @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Password</b><span style="color:red;">*</span></label>
                                   <input id="password" type="password" pattern=".{8,}" title="Eight or more characters" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              
                                   @error('password')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
              
                           <div class="form-group">
                                  <label><b>Confirm Password</b><span style="color:red;">*</span></label>
                                   <input id="password-confirm" type="password" pattern=".{8,}" title="Eight or more characters" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                               </div>
                               <input type="hidden" value="2" name="type">
                           <div class="form-group">
                                   <button type="submit"  class="btn btn-primary py-3 px-5">
                                       {{ __('Register') }}
                                   </button>
                            </div>
               </form>

                </div>
              </div>

          
          </div>
        </div>
</div>
    </section>
@endsection
