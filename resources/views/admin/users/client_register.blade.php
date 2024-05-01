@extends('admin.layouts.app')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<style>
  .dropdown-menu {
    border-radius: 0 !important;
  }
</style>

@section('content')


<div>
  <!-- Breadcrumbs-->
  <div class="bg-white border-bottom py-3 mb-5">
    <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
      <nav class="mb-0" aria-label="breadcrumb">
        <h3 class="m-0">New Client</h3>

      </nav>
      <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">New Client</li>
        </ol>
      </div>
    </div>
  </div> <!-- / Breadcrumbs-->


  <section class="container-fluid">

    <div class="card">
      <div class="row">
        <div class="mb-12">
          @include('admin.common.alerts')
        </div>

      </div>
      <form action="{{ route('clients.register') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="card-body">

          <div class="row">
            <div class="form-group col-6">
              <label for="title">First Name</label>
              <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name')}}" placeholder="First Name" id="first_name" required />
              @error('first_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
            <div class="form-group col-6">
              <label for="title">Last Name</label>
              <input type="text" name="last_name" class="form-control @error('email') is-invalid @enderror" value="{{ old('last_name')}}" placeholder="Last Name" id="email" required />
              @error('last_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>
          </div>



          <div class="row">
          <div class="form-group col-6">
            <label for="title">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}" placeholder="Email" id="email" required />
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
          <div class="form-group col-6">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code')}}" placeholder="postal_code" id="postal_code" required />
            @error('postal_code')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <label for="site_address">Site Address</label>
            <input type="text" name="site_address" class="form-control @error('site_address') is-invalid @enderror" value="{{ old('site_address')}}" placeholder="Site Address" id="site_address" />
            @error('site_address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        
          <div class="form-group col-6">
            <label for="correspondence_address">Correspondence Address</label>
            <input type="text" name="correspondence_address" class="form-control @error('correspondence_address') is-invalid @enderror" value="{{ old('correspondence_address')}}" placeholder="correspondence Address" id="correspondence_address" />
            @error('correspondence_address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
        </div>

          <div class="row">
            <div class="form-group col-6">
              <label for="title">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}" placeholder="Password" id="password" required />
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group col-6">
              <label for="title">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation')}}" placeholder="Confirm Password" id="c_password" required />
              @error('password_confirmation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group col-6">
            <label for="title">Contact Number</label>
            <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number')}}" placeholder="Contact Number" id="contact_number" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>


            @error('contact_number')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>



        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
</div>


@endsection
<script type="module">
  import Tags from "https://cdn.jsdelivr.net/npm/bootstrap5-tags@1.3.1/tags.min.js";
  Tags.init();
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.ckeditor').ckeditor();
    // $('.js-example-basic-single').select2();
  });
</script>