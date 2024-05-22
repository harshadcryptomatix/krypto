@extends('layouts.app')

@section('content')
    

  <main id="main" class="main">

    <div class="row">
        
        <div class="pagetitle col-6">
          <h1>{{__('Profile Details')}}</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active">{{__('Profile Details')}}</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <div class="col-6 text-end">
            <a href="{{route('profile.details')}}?update=true" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
        </div>

    </div>

    <section class="section profile">
       @if (session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle me-1"></i>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <!-- <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                      <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                      <h2>Kevin Anderson</h2>
                      <h3>Web Designer</h3>
                      <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>

                </div>
            </div> -->
            <div class="col-xl-12">

                <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                         <h5 class="card-title">{{__('Profile Details')}}</h5>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label ">{{__('First Name')}}</div>
                        <div class="col-lg-9 col-md-8">{{$data->first_name}}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Last Name')}}</div>
                        <div class="col-lg-9 col-md-8">{{$data->last_name}}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('DOB')}}</div>
                        <div class="col-lg-9 col-md-8">{{ date('Y-m-d',strtotime($data->dob))}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{__('Gender')}}</div>
                            <div class="col-lg-9 col-md-8">{{$data->gender}}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Country')}}</div>
                        @php  $country_details = getCountry($data->country); @endphp
                        <div class="col-lg-9 col-md-8">{{$country_details['name']}} ({{$data->country}})</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('State')}}</div>
                        <div class="col-lg-9 col-md-8">{{$data->state}}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('City')}}</div>
                        <div class="col-lg-9 col-md-8">{{ $data->city }}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">{{__('Address')}}</div>
                        <div class="col-lg-9 col-md-8">{{$data->address}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{__('Zip Code')}}</div>
                            <div class="col-lg-9 col-md-8">{{$data->zip_code}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{__('Default Currency')}}</div>
                            <div class="col-lg-9 col-md-8">{{$data->default_currency}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{__('Status')}}</div>
                            <div class="col-lg-9 col-md-8">{{$data->status}}</div>
                        </div>

                    </div>
                </div>

                       </div>
                </div>

            </div>
        </div>
    </section>

  </main><!-- End #main -->

@endsection
