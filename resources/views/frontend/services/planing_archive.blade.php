@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')

<!-- header banner -->
<div class="container-fluid slider-section">

    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/services/header-banner.png') }}" class="d-block w-100"
                            alt="Services Header Banner">
                        <div class="carousel-caption header-banner">

                            <h1 class="font-36 family-Questrial fw-500 light-black">Planning Permissions <br>and
                                Architectural
                                Control<br> Services</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / header banner -->

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            {{-- <h2 class="family-Nunito-sans fw-bolder font-30 font-27-mobile light-black pb-2">Planning Permissions and Architectural
                Services</h2> --}}
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-01.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">Property
                        Extensions</h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-02.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">Out
                        Buildings</h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-03.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">Drop Kerbs
                    </h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-04.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">New
                        Building</h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-05.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">Large
                        Residential
                        Developments
                    </h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-2">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-5 mb-4">
                <img src="{{ asset('/images/services/service-06.png') }}" class="card-img-top" alt="...">
                <div class="card-body px-lg-5 px-2 text-center">
                    <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center service-title">Change Of
                        Usage
                    </h4>
                    <a href="{{ route('web.services.single')}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection