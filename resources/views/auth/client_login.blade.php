@extends('frontend.layouts.app')
@section('content')

<style>
  .larger-text {
    font-size: 15px; /* Adjust the desired font size */
    font-weight: bold; /* Adjust the desired font weight */
  }
</style>

<!-- Main Section-->
<section class="d-flex justify-content-center align-items-start py-5 px-3 px-md-0 mt-5" style="background-image: url('{{ asset('images/clientPortalBg.jpg') }}'); background-size: cover;">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center mt-5">

    <h3 class="mb-3 mt-5 font-24 light-black family-Nunito-sans fw-bold">CLIENT LOGIN</h3>

        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form client-auth-forms">

            <!-- Login Form-->
            <div class="row">
                <div class="col-md-12">
                    @include('admin.common.alerts')
                </div>
            </div>
            <form method="POST" class="mt-4" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label pt-2 mb-1 family-Nunito-sans fw-500 ">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">

                    <label for="password" class="form-label pt-2 mb-1 family-Nunito-sans fw-500  d-flex justify-content-between align-items-center">{{ __('Password') }}</label>


                    </label>
                    <input id="password" type="password" class="pt-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  <p class="py-2">
                    <a href="{{route('web.password.forgot')}}" class="text-muted small ms-2 text-decoration-underline form-label pt-2 mb-1 family-Nunito-sans fw-500 ">Forgotten
                        password?</a>
                  </p>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                </div>
                <button type="submit" class="btn btn-dark d-block w-100 my-4 family-Nunito-sans fw-500 ">Login</button>
            </form>
            <!-- / Login Form -->

            <p class="d-block text-center text-muted small larger-text">New customer? <a class="text-muted text-decoration-underline" href="{{route('clients.registrationUI')}}">Sign up for an account</a></p>
        </div>
    </div>
    <!-- / Login Form-->

</section>

@endsection
