@extends('frontend.layouts.app')
@section('content')

<section class="d-flex justify-content-center align-items-start py-5 px-3 px-md-0 mt-5" style="background-image: url('{{ asset('images/clientPortalBg.jpg') }}'); background-size: cover;">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center mt-5">

        <h3 class="mb-3 mt-5 font-24 light-black family-Nunito-sans fw-bold">CLIENT REGISTRATION</h3>

        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form client-auth-register">

            <div class="row">
                <div class="col-md-12">
                    @include('admin.common.alerts')
                </div>
            </div>

            <!-- Register Form-->
            <form class="mt-4" method="post" action="{{ route('clients.registration') }}" id="client-registration-form">
                @csrf

                <div class="row">
                    <div class="col-lg-6"  >
                        <div class="form-group">
                            <label class="form-label mb-1 family-Nunito-sans fw-500 " for="first_name">First name <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name" required>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="phone">Phone <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" id="phone" name="contact_number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" placeholder="Phone" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="site_address">Site Address <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" id="site_address" name="site_address" class="form-control @error('site_address') is-invalid @enderror" value="{{ old('site_address') }}" placeholder="Site Address" required>

                            @error('site_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="correspondence_address">Correspondence Address <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" id="correspondence_address" name="correspondence_address" class="form-control @error('correspondence_address') is-invalid @enderror" value="{{ old('correspondence_address') }}" placeholder="Correspondence Address" required>

                            @error('correspondence_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="checkbox" id="same-address-checkbox" onClick="fillCorrespondenceAddress()"> Correspondence address is same as site address

                        </div>

                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="postal_code">Post Code <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" placeholder="Post Code" required>

                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="col-lg-6" >

                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="last_name">Last name <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name" required>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="email">Email address <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="password">Password <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label pt-2 mb-1 family-Nunito-sans fw-500 " for="password_confirmation">Confirm Password <span class="text-danger font-16 fw-bolder">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                        </div>
                        <button type="submit" class="btn btn-dark d-block w-100 my-4 pt-2 family-Nunito-sans fw-500 " onClick="onRegisterFormSubmit()">Sign Up</button>
                        <p class="d-block text-center text-muted small">Already registered? <a class="text-muted text-decoration-underline" href="{{route('clients.login')}}">Login here.</a></p>
                    </div>
                </div>


            </form>
            <!-- / Register Form-->


        </div>
    </div>
    <!-- / Login Form-->


</section>

@endsection

@section('scripts')
<script>
    function onRegisterFormSubmit() {

        if (document.getElementById('client-registration-form').checkValidity()) {
            Swal.fire({
            icon: 'info',
            title: 'Please wait....',
            text: 'Registration is in progress',
            allowOutsideClick: false
            })
            Swal.showLoading();

            document.getElementById('client-registration-form').submit();

        }
    }

    function fillCorrespondenceAddress(){

        let correspondenceAddressCheckbox = document.getElementById('same-address-checkbox');

        if(correspondenceAddressCheckbox.checked){

            let siteAddress = document.getElementById('site_address');
            document.getElementById('correspondence_address').value = siteAddress.value;

        }else{

            document.getElementById('correspondence_address').value = '';
        }
    }
</script>
@endsection
