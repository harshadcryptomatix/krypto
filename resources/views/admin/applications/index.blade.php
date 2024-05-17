@extends('admin.layouts.app')
@section('content')
   

   

<div class="pagetitle">
  <h1>Merchant's Applications List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Applications</li>
      <li class="breadcrumb-item active">Merchant's Applications</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Merchant's Applications</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
              <th><b>S No.</b></th>
              <th><b>First Name</b></th>
              <th><b>Last Name</b></th>
              <th><b>DOB</b></th>
              <th> <b>Gender</b></th>
              <th> <b>Country</b></th>
              <th><b>State</b></th>
              <th><b>City</b></th>
              <th><b>Address</b></th>
              <th> <b>Zip Code</b></th>
              <th> <b>Default Currency</b></th>
              <th> <b>Status</b></th>



                
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @forelse($applications as $application)
              <tr>
              <td>{{ $loop->iteration }}</td>
                <td>{{ $application->first_name }}</td>
                <td>{{ $application->last_name }}</td>
                <td>{{ $application->dob }}</td>
                <td>{{ $application->gender }}</td>
                <td>{{ $application->country }}</td>
                <td>{{ $application->state }}</td>
                <td>{{ $application->city }}</td>
                <td>{{ $application->address }}</td>
                <td>{{ $application->zip_code }}</td>
                <td>{{ $application->default_currency }}</td>
                <td>{{ $application->status }}</td>


               
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
