@extends('admin.layouts.app')
@section('content')
<div class="pagetitle">
      <h1>{{__('Admin Create')}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Admin Create')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fill Fields</h5>
                <!-- Floating Labels Form -->
                <form action="{{route('admin.admin-store')}}" method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                    <input type="text" name="name"  value="{{old('name')}}" class="form-control" id="floatingName" placeholder="Name" required>
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
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="floatingEmail" placeholder="Email" required>
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
                    <input type="password"  value="{{old('password')}}" name="password" class="form-control" id="password" placeholder="Password" required>
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
                                <option selected value="">Select</option>
                                <option value="1" @if(old('status') === '1') selected @endif>Active</option>
                                <option value="0" @if(old('status') === '0') selected @endif>Inactive</option>
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
                    <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                    <button type="reset" class="btn btn-secondary">{{__('Reset')}}</button>
                </div>
                </form><!-- End floating Labels Form -->

                </div>
                </div>
            </div>
      </div>
    </section>


@endsection