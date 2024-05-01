@extends('client_portal.layouts.app')
@section('content')


<div class="container-fluid">
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <h5 class="card-title">Profile Settings</h5>
                <h6 class="card-subtitle mb-2 text-muted">Your current profile details.</h6>

                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center py-5">

                            <img class="rounded-circle mt-5 w-75" src="{{asset($user->user_image)}}">
                            <span class="font-weight-bold">{{$user->first_name}} {{$user->last_name}}</span>
                            <span class="text-black-50">{{$user->email}}</span>
                            <a href="{{route('clients.dashboard')}}" class="mt-4 w-100"><button class="btn btn-dark mb-3 w-100" type="button"><i class="fa fa-arrow-left"></i> Back To Dashboard</button></a>
                            @if($reviewList->count() > 0)
                            @include('client_portal.testimonials.components.view_testimonials')
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                       
                        <div class=" py-5 px-3">
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.common.alerts')
                            </div>

                        </div>
                            <form action="{{route('client.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <label class="labels">First Name</label>
                                        <input type="text" class="form-control" name="f_name" value="{{$user->first_name}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labels">Last Name</label>
                                        <input type="text" class="form-control" name="l_name" value="{{$user->last_name}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <label class="labels">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" value="{{$user->dob}}" required>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels">Phone Number</label>
                                        <input type="number" class="form-control" name="phone" value="{{$user->phone}}" required>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels">Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user->username}}" required>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="labels">Profile Image</label>
                                        <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="user_image" id="src" />
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="mt-5 text-right">
                                    <button class="btn btn-dark profile-button" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script type="module">
    // JavaScript to toggle password visibility
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>