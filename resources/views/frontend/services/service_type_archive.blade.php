@extends('frontend.layouts.app')

@section('content')

<!-- header banner -->
<div class="container-fluid slider-section">
    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset($serviceType->image) }}" class="d-block w-100" alt="Services Header Banner">
                        <div class="carousel-caption header-banner">
                            <h1 class="font-36 family-Questrial fw-500 light-black">{{$serviceType->name}}</h1>
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

        </div>
    </div>
    <div class="row mt-5">

        @foreach($serviceType->services as $service)
        <div class="col-lg-4 col-md-6 col-12 mb-2 service-div">
            <!-- service card -->
            <div class="card rounded-0 border-0 service-card pb-4 mb-4">
                <a href="{{ route('web.services.single',['slug' => $service->slug])}}">

                    <img src="{{ asset($service->image) }}" class="card-img-top" alt="{{$service->name}}">
                    <div class="card-body px-2 text-center">
                        <h4 class="family-Nunito-sans fw-bolder light-black pb-2 mb-4 text-center font-20">
                            {{$service->name}}</h4>
                        <a href="{{ route('web.services.single',['slug' => $service->slug])}}"
                            class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                            <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                            <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection