@extends('layouts.app')
@section('content')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{__('Persional Information')}}</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('Persional Information')}}</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- Floating Labels Form -->
                        <form method="post" action="{{ route('save-personal-info')}}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input value="{{old('first_name')}}" type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                                <label for="first_name">{{__('First Name')}}</label>
                            </div>
                                 @error('first_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <div class="form-floating">
                                <input value="{{old('last_name')}}" type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                                <label for="last_name">{{__('Last Name')}}</label>
                            </div>
                               @error('last_name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="{{old('dob')}}" name="dob" type="date" class="form-control" id="date_of_birth" placeholder="Date of birth" max="{{date('Y-m-d')}}" required>
                                    <label for="date_of_birth">{{__('Date of birth')}}</label>
                                </div>
                                @error('dob')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                            <label class="form-label">{{__('Gender')}}</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check me-3">
                                        <input {{ old('gender')=='male' ? 'checked':'' }} class="form-check-input" type="radio" name="gender" value="male" id="maleRadio" required>
                                        <label class="form-check-label" for="maleRadio">
                                            {{__('Male')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input {{ old('gender')=='female' ? 'checked':'' }} class="form-check-input" type="radio" name="gender" value="female" id="femaleRadio" required>
                                        <label class="form-check-label" for="femaleRadio">
                                            {{__('Female')}}
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                          
                                <select name="country" class="form-select select2" id="countries" aria-label="Country" required>
                                <option  value="" selected>{{__('Select Country')}}</option>
                                @foreach($countries ?? [] as $key => $value) 
                                  <option {{ old('country') == $key ? 'selected':'' }} value="{{$key}}">{{$value['name']}}</option>
                                @endforeach
                                </select>
                               
                                @error('country')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror


                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input value="{{old('state')}}" name="state" type="text" class="form-control" id="floatingState" placeholder="State" required>
                                    <label for="floatingState">{{__('State')}}</label>
                                </div>
                                @error('state')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input value="{{old('city')}}" name="city" type="text" class="form-control" id="floatingCity" placeholder="City" required>
                                    <label for="floatingCity">{{__('City')}}</label>
                                </div>
                                @error('city')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input value="{{ old('address')}}" name="address" type="text" class="form-control" id="floatingAddress" placeholder="Address" required>
                                    <label for="floatingAddress">{{__('Address')}}</label>
                                </div>
                                @error('address')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                @enderror
                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="{{old('zip_code')}}" name="zip_code" type="text" class="form-control" id="floatingZip" placeholder="Zip" required>
                                    <label for="floatingZip">{{__('Zip Code')}}</label>
                                </div>
                                @error('zip_code')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                    <select class="form-select select2" name="default_currency" id="default_currency" aria-label="Default Currency" required>
                                    <option selected value="">{{__('Default Currency')}}</option>
                                    @foreach($currencies ?? [] as $key => $value)
                                      <option {{ old('default_currency') == $key ? 'selected':'' }} value="{{$key}}">{{$key}}</option>
                                    @endforeach 
                                    </select>
                                @error('default_currency')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{__('Save Info')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('Reset')}}</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                        </div>
            </div>
        </section>    
    </main>
    @section('scripts')
    <script>
       $(document).ready(function() {
            $('.select2').select2();
            // Bootstrap validation script
            (function () {
                'use strict';
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation');

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                            // Manually trigger validation for Select2
                            $('.select2').each(function() {
                                if (!$(this).val()) {
                                    $(this).siblings('.select2-container').find('.select2-selection--single')
                                        .addClass('is-invalid').removeClass('is-valid');
                                } else {
                                    $(this).siblings('.select2-container').find('.select2-selection--single')
                                        .addClass('is-valid').removeClass('is-invalid');
                                }
                            });
                        }, false);
                    });

                // Handle change event for Select2 to toggle valid/invalid classes
                $('.select2').on('change', function() {
                    if ($(this).val()) {
                        $(this).siblings('.select2-container').find('.select2-selection--single')
                            .addClass('is-valid').removeClass('is-invalid');
                    } else {
                        $(this).siblings('.select2-container').find('.select2-selection--single')
                            .addClass('is-invalid').removeClass('is-valid');
                    }
                });
            })();
        });
    </script>
    @endsection
@endsection