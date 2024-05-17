@extends('admin.layouts.app')
@section('content')
   

   

<div class="pagetitle">
  <h1>Merchants List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">User Management</li>
      <li class="breadcrumb-item active">Merchants</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Merchants</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th>
                  <b>S No.</b>
                </th>
                <th>
                  <b>Name</b>
                </th>
                <th>Email</th>
                <!-- <th>City</th> -->
                <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
              <tr>
              <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <!-- <td>Curicó</td> -->
                <!-- <td>2005/02/11</td> -->
                <td><button class="btn btn-success">View</button></td>
              </tr>
              @empty

              @endforelse


            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>



@endsection
