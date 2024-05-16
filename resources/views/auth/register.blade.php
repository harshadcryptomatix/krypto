@extends('layouts.guest')

@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Krypto</span>
                </a>
              </div><!-- End Logo -->
  
              <div class="card mb-3">
  
                <div class="card-body">
  
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>
  
                  <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation">
                      @csrf
  
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Name</label>
                            <div class="input-group has-validation">
                                <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="col-12 mb-3">
                            <label for="yourUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row col-12">
                            <label for="yourUsername" class="form-label">Mobile No.</label>

                            <div class="col-md-4">
                                <select id="country_code" class="form-control @error('country_code') is-invalid @enderror" name="country_code" required>
                                    <option value="91">IN (+91)</option>
                                </select>
                            </div>
                            
                            <div class="col-md-8">
                                <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required>
                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
  
                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="yourPassword" required>
        
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                        </div>
                  </form>
  
                </div>
              </div>
  
            </div>
          </div>
        </div>
  
      </section>
</div>
@endsection
