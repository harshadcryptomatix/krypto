@extends('admin.layouts.app')
@section('content')

<div class="row">
    
    <div class="col-6">
        <div class="pagetitle">
          <h1>{{__("Merchant's Applications Details")}}</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">{{__('Home')}}</a></li>
              <li class="breadcrumb-item">{{__('Applications')}}</li>
              <li class="breadcrumb-item active">{{__("Merchant's Applications Details")}}</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    </div>

    <div class="col-6 row d-flex text-end align-items-center">
        <div class="col-6 label"><b>{{__('Application Status')}}</b></div>

        <div class="col-6">
            <form method="post" action="{{route('admin.application-status-change',$data->id)}}" id="application-status-form">
                @csrf
                <select name="status" id="application-status" class="form-control" @if($data->status != 'pending') disabled @endif>
                    <option value="pending" @if($data->status == 'pending') selected @endif>{{__('Pending')}}</option>
                    <option value="approved" @if($data->status == 'approved') selected @endif>{{__('Approved')}}</option>
                    <option value="rejected" @if($data->status == 'rejected') selected @endif>{{__('Rejected')}}</option>
                </select>
            </form>   
        </div>
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
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                 <h5 class="card-title">{{__('Profile Details')}}</h5>

                                 <div class="row mt-4">
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

                            </div>

                        </div>

                   </div>
                </div>
            </div>
        </div>
        
</section>
    <div class="modal fade" id="applicationStatusChangeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure to change status of this application <b id="intialtoupdatestatus"></b>.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submit-application-status">Yes change</button>
        </div>
        </div>
        </div>
    </div><!-- End Vertically centered Modal-->
    @section('scripts')
        <script>
              var intialStatus = "{{$data->status}}";
              $(document).on('change','#application-status',function(e){
                    let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('applicationStatusChangeModal')) // Returns a Bootstrap modal instance
                        $("#intialtoupdatestatus").text($(this).val())
                        modal.show();
              });
              $('#applicationStatusChangeModal').on('hidden.bs.modal', function (e) {
                     $("#application-status").val(intialStatus);
              });
              $(document).on('click',"#submit-application-status",function(){
                   $("#application-status-form").submit();
              })

        </script>

    @endsection
@endsection