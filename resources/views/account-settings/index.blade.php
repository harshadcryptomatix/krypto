@extends('layouts.app')

@section('content')
    <main id="main" class="main">
<section class="section">
        <div class="col-md-6">

          <div class="card mb-3">

            <div class="card-body">
              
              <div class="pt-2 pb-2">
                <h5 class="card-title pb-0 fs-4">Change Password</h5>

                @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                
                @if (Session::has('success'))
                  <div class="alert alert-success">
                    {{ Session::get('success') }}
                  </div>
                @endif

                @if (Session::has('error'))
                  <div class="alert alert-danger">
                    {{ Session::get('error') }}
                  </div>
                @endif
                
              </div>

              <form method="POST" action="{{ route('change-password') }}" class="row g-3 needs-validation">
                  @csrf

                <div class="col-12">
                  <label for="oldPassword" class="form-label">Old Password</label>
                  <input type="password" name="old_password" class="form-control" id="oldPassword" placeholder="Old Password" required>
                </div>

                <div class="col-12">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="newPassword" placeholder="New Password" required>
                  </div>

                  <div class="col-12">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                  </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>  
              </form>

            </div>
          </div>
    </div>

  </section>
</main>
@endsection