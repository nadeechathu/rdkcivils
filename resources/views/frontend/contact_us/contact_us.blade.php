@extends('frontend.layouts.app')
@section('content')
<!-- banner -->
<!-- header banner -->
<div class="container-fluid slider-section">
    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/header-banner-contact_us.png') }}" class="d-block w-100"
                            alt="Services Header Banner">
                        <div class="carousel-caption header-banner">
                            <h1 class="font-40 family-Questrial fw-500 light-black">Contact us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / header banner -->
<!-- form and info -->
<div class="container-flluid">
    <div class="container">
        <div class="row info-row pt-5">
            <div class="col-12 pb-3">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <h2 class="f-questrial fs-30 fw-700 text-center inq clr-br">INQUIRIES</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 ">
                <div class="contact-cover contact-radious">
                    <div class="contact-details contact-radious">
                        <div class="pb-4">
                            <h4 class="f-questrial fs-20 fw-700 info-h ">Address</h4>
                            <p class="f-questrial fs-20 fw-300 info-p">1 Fernhill Court, Almondsbury,<br> Bristol, BS32
                                4LX</p>
                        </div>
                        <div class="pb-4">
                            <h4 class="f-questrial fs-20 fw-700 info-h ">Phone</h4>
                            <p class="f-questrial fs-20 fw-300 info-p"><a class=" hover-black hvr-forward info-p"
                                    href="tel:02038161818">
                                    020 38161818
                                </a>
                            </p>
                            <p class="f-questrial fs-20 fw-300 info-p"><a class="hvr-forward info-p hover-black"
                                    href="tel:07985543471">
                                    079 85543471
                                </a>
                            </p>
                        </div>



                        <div class="pb-4">
                            <h4 class="f-questrial fs-20 fw-700 info-h">Email</h4>
                            <p class="f-questrial fs-20 fw-300 info-p"><a class="hvr-forward info-p hover-black"
                                    href="mailto:info@rdkcivils.co.uk">
                                    info@rdkcivils.co.uk
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 form  px-lg-4">
                <div>
                    @include('frontend.common.alerts')
                </div>
                <form class="d-flex contact-form pt-2 px-lg-4" action="{{route('web.contact.submit')}}" method="post"
                id="contact-form-submit">
                @csrf
                <label for="exampleInputName" class="text-uppercase form-label">Name <span class="text-danger font-16 fw-bolder">*</span></label>
                <input type="text" class="form-control rounded-3 border-brown py-2" name="first_name"
                       value="{{old('first_name')}}" id="exampleInputName" required/>
                <span id="nameError" class="error"></span>

                <label for="exampleInputEmail1" class="text-uppercase form-label pt-2">Email address <span class="text-danger font-16 fw-bolder">*</span></label>
                <input type="email" class="form-control rounded-3 border-brown py-2" name="email"
                       id="exampleInputEmail1" value="{{old('email')}}" aria-describedby="emailHelp" required/>
                <span id="emailError" class="error"></span>

                <label for="exampleInputTel" class="text-uppercase form-label pt-2">Telephone <span class="text-danger font-16 fw-bolder">*</span></label>
                <input type="text" required class="form-control rounded-3 border-brown py-2" name="phone"
                       value="{{old('phone')}}"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                       id="exampleInputTel"/>
                <span id="phoneError" class="error"></span>

                <label for="exampleInputSubject" class="text-uppercase form-label pt-2">Subject <span class="text-danger font-16 fw-bolder">*</span></label>
                <input type="text" class="form-control rounded-3 border-brown py-2" name="subject"
                       value="{{old('subject')}}" id="exampleInputSubject" required/>
                <span id="subjectError" class="error"></span>

                <label for="exampleFormControlTextarea1" class="text-uppercase form-label pt-2">Message <span class="text-danger font-16 fw-bolder">*</span></label>
                <textarea class="form-control rounded-3 border-brown" id="exampleFormControlTextarea1"
                          name="message" rows="4" required>{{old('message')}}</textarea>
                <span id="messageError" class="error"></span>

                <div class="form-group mt-2">
                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
                </div>
                <div class="pt-3 d-flex justify-content-around">
                    <button type="button" class="btn btn-primary w-50 hvr-grow d-flex submit-btn py-2"
                            id="contact-submit-btn" onClick="submitContactForm()">SUBMIT
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- map -->
<div class="container-fluid">
    <div class="container">
        <div class="row text-center">
            <h2 class="f-nunito fs-30 fw-700 py-5 reason clr-br">WE ARE HERE</h2>
        </div>
    </div>
</div>
<div class="map-responsive">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9934.619553214683!2d-2.6520327!3d51.5012003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487193e59e7fad01%3A0xa20d20f57002a627!2sRDK%20Civil%20Engineering%20Limited!5e0!3m2!1sen!2slk!4v1687515966907!5m2!1sen!2slk"
        width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-12 mb-5">
            <div class="contact-shadow rounded-3 py-3 px-2">
                <div class="card-body pb-0">
                    <h3 class=" f-nunito fw-800 mb-3">London Office</h3>
                    <p class="f-nunito mb-2 fs-md-5"><b><i class="fa fa-map-marker me-3 map-location"
                                aria-hidden="true"></i>
                            9 Waterloo Road,
                            Sutton,
                            SM1 4LS</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-12 mb-5">
            <div class="contact-shadow rounded-3 py-3 px-2">
                <div class="card-body pb-0">
                    <h3 class=" f-nunito fw-800 mb-3">South West Office</h3>
                    <p class="f-nunito mb-2 fs-md-5"><b><i class="fa fa-map-marker me-3 map-location"
                                aria-hidden="true"></i>
                            1 Fernhill Court,
                            Almondsbury,
                            Bristol,
                            BS32 4LX</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-12">
            <div class="contact-shadow rounded-3 p-3">
                <div class="card-body pb-0">
                    <h3 class=" f-nunito fw-800 mb-3">Other Operational Areas and Sub Offices</h3>
                    <!-- inner row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="f-nunito mb-2 fs-md-5"><i class="fa fa-map-marker me-3 map-location"
                                    aria-hidden="true"></i><b>
                                    South East – Southampton Office</b>
                            </p>
                            <p class="f-nunito mb-2 fs-md-5"><i class="fa fa-map-marker me-3 map-location"
                                    aria-hidden="true"></i><b>
                                    South Midlands -Oxford Office</b>
                            </p>
                            <p class="f-nunito mb-2 fs-md-5"><i class="fa fa-map-marker me-3 map-location"
                                    aria-hidden="true"></i><b>
                                    West Midlands – Birmingham Office</b>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p class="f-nunito mb-2 fs-md-5"><i class="fa fa-map-marker me-3 map-location"
                                    aria-hidden="true"></i><b>
                                    Scotland – Dundee Office</b>
                            </p>
                            <p class="f-nunito mb-2 fs-md-5"><i class="fa fa-map-marker me-3 map-location"
                                    aria-hidden="true"></i><b>
                                    Wales – Cardiff Office</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
    @section('scripts')
    <script>
    

    function submitContactForm() {
        var name = document.getElementById('exampleInputName').value;
        var email = document.getElementById('exampleInputEmail1').value;
        var phone = document.getElementById('exampleInputTel').value;
        var subject = document.getElementById('exampleInputSubject').value;
        var message = document.getElementById('exampleFormControlTextarea1').value;

        var nameError = document.getElementById('nameError');
        var emailError = document.getElementById('emailError');
        var phoneError = document.getElementById('phoneError');
        var subjectError = document.getElementById('subjectError');
        var messageError = document.getElementById('messageError');

        nameError.textContent = '';
        emailError.textContent = '';
        phoneError.textContent = '';
        subjectError.textContent = '';
        messageError.textContent = '';

        var isValid = true;
    var firstErrorField = null;

    if (name.trim() === '') {
        nameError.textContent = 'Name is required';
        isValid = false;
        if (!firstErrorField) firstErrorField = 'exampleInputName';
    }

    if (email.trim() === '') {
        emailError.textContent = 'Email is required';
        isValid = false;
        if (!firstErrorField) firstErrorField = 'exampleInputEmail1';
    }

    if (phone.trim() === '') {
        phoneError.textContent = 'Phone is required';
        isValid = false;
        if (!firstErrorField) firstErrorField = 'exampleInputTel';
    }

    if (subject.trim() === '') {
        subjectError.textContent = 'Subject is required';
        isValid = false;
        if (!firstErrorField) firstErrorField = 'exampleInputSubject';
    }

    if (message.trim() === '') {
        messageError.textContent = 'Message is required';
        isValid = false;
        if (!firstErrorField) firstErrorField = 'exampleFormControlTextarea1';
    }

    if (!isValid) {
        // Scroll to the first error field
        document.getElementById(firstErrorField).scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    if (isValid) {

        document.getElementById('contact-form-submit').submit();

        document.getElementById('contact-submit-btn').setAttribute('disabled', 'disabled');
        Swal.fire({
            icon: 'info',
            title: 'Please wait....',
            text: 'Sending your message ..',
            allowOutsideClick: false
        })
        Swal.showLoading();
        
    }
    }
</script>

    @endsection
