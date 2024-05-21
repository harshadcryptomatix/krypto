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
              <th><b>{{__('S No.')}}</b></th>
              <th><b>{{__('First Name')}}</b></th>
              <th><b>{{__('Last Name')}}</b></th>
              <th><b>{{__('Email')}}</b></th>
              <th> <b>{{__('Country')}}</b></th>
              <th> <b>{{__('Default Currency')}}</b></th>
              <th> <b>{{__('Status')}}</b></th>
              <th>{{__('Action')}}</th>
              </tr>
            </thead>
            <tbody>
            @forelse($applications as $application)
              <tr>
              <td>{{ $loop->iteration }}</td>
                <td>{{ $application->first_name }}</td>
                <td>{{ $application->last_name }}</td>
                <td>{{ $application?->user?->email }}</td>
                <td>{{ $application->country }}</td>
                <td>{{ $application->default_currency }}</td>
                <td>{{ $application->status }}</td>


               
                <td><a href="{{ route('admin.viewapplication',$application->id)}}" class="btn btn-success">{{__('View')}}</a></td>
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
