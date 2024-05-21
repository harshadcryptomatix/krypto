@extends('layouts.app')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">
                
                <div class="pt-2 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Sign In</h5>                  
                </div>

                @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible fade show alert-danger"><i class="bi bi-exclamation-octagon me-1"></i>:message<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')) !!}
                @endif
                  
                  @if (Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  @endif

                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation">
                    @csrf

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email Address</label>
                    <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
                      {{-- <div class="invalid-feedback">Please enter your username.</div> --}}
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password" required>
                    
                    {{-- <div class="invalid-feedback">Please enter your password!</div> --}}
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
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
