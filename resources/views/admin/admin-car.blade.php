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
          <h1 class="h3 mb-2 text-gray-800">Car Details</h1>
<!-- DataTales Example -->
          <div class="card shadow mb-4">
<div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Brand</th>
                      <th>Model</th>
                      <th>Rental Name</th>
                      <th>Rental Address</th>
                      <th>City</th>
                      <th>Mobile</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($usr as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->model }}</td>
                      <td>{{ $user->brand }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->address }}</td>
                      <td>{{ $user->city }}</td>
                      <td>{{ $user->mobile }}</td>
                      <td><a href='deletecar/{{ $user->id }}'>Delete</a></td>
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