@extends('layouts.app')

@section('content')
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{__('Profile Details')}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Profile Details')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
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

                <div class="card">
                        <div class="card-body pt-3">
                         <h5 class="card-title">{{__('Profile Details')}}</h5>
                         <a href="{{route('profile.details')}}?update=true" class="btn btn-primary margin-left-94"><i class="bi bi-pencil-fill"></i> Edit</a>

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
                            @php  $currency_details = getCurrency($data->default_currency); @endphp
                            <div class="col-lg-9 col-md-8">{{$currency_details['name']}} ({{$currency_details['symbol']}})</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{__('Status')}}</div>
                            <div class="col-lg-9 col-md-8">{{$data->status}}</div>
                        </div>
                       </div>
                </div>
    </section>

  </main><!-- End #main -->

@endsection
