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
          <h1 class="h3 mb-2 text-gray-800">Rental Details</h1>
<!-- DataTales Example -->
          <div class="card shadow mb-4">
<div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Aadhar</th>
                      <th>Licence</th>
                      <th>Email</th>
                      <th>Join Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($usr as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->address }}</td>
                      <td>{{ $user->mobile }}</td>
                      <td>{{ $user->aadhar }}</td>
                      <td>{{ $user->licence }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td><a href='delete2/{{ $user->id }}'>Delete</a></td>
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