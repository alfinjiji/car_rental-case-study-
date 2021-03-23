@extends('layouts.app2')
@section('content')
@if(Auth::guard('admin')->check())
        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if (session('alert'))
          <div class="alert alert-success">
            {{ session('alert') }}
          </div>
          @endif

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customer Details</h1>
<!-- DataTales Example -->
          <div class="card shadow mb-4">
<div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer ID</th>
                      <th>Rental ID</th>
                      <th>Car ID</th>
                      <th>PickUp</th>
                      <th>DropOff</th>
                      <th>Order Date</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($usr as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->user_id }}</td>
                      <td>{{ $user->rental_id }}</td>
                      <td>{{ $user->car_id }}</td>
                      <td>{{ $user->pickup_date }}</td>
                      <td>{{ $user->dropoff_date }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->total }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
                @endif
@endsection