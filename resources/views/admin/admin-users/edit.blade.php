@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
      <h1>{{__('Admin Update')}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Admin Update')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{__('Update')}}</h5>
                <!-- Floating Labels Form -->
            <form action="{{ route('admin.admin-update', $data->id) }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="name"  value="{{old('name',$data->name)}}" class="form-control" id="floatingName" placeholder="Name" required>
                    <label for="floatingName">Admin Name</label>
                       
                    </div>
                    @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="email" class="form-control" value="{{old('email',$data->email)}}" name="email" id="floatingEmail" placeholder="Email" required>
                    <label for="floatingEmail">Email</label>
                    </div>
                    @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="password"  value="{{old('password')}}" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                    </div>
                    @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                    @enderror
                </div>
                <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select name="status" class="form-select" id="floatingSelect" aria-label="Status" required>
                                <option value="0" @if($data->status) == 0) selected @endif>{{__('Inactive')}}</option>
                                <option value="1" @if($data->status) == 1) selected @endif>{{__('Active')}}</option>
                                
                                </select>
                                <label for="floatingSelect">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                </div>
               
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                  
                </div>
                </form><!-- End floating Labels Form -->

                </div>
                </div>
            </div>
      </div>
    </section>


@endsection