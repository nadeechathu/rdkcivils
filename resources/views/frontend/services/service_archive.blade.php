@extends('frontend.layouts.app')
@section('content')
<!-- / header banner -->
<div class="container-fluid slider-section">

    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/projects/project-header-banner.png') }}" class="d-block w-100"
                            alt="Services Header Banner">
                        <div class="carousel-caption header-banner">
                            <h1 class="font-40 family-Questrial fw-500 light-black">Our Services</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center pb-lg-4">

        @foreach($serviceTypes as $serviceType)
        <div class="col-lg-5 col-sm-6 pb-lg-0 pb-5 my-4">
                <a href="{{ route('web.services.type.archive',['slug' => $serviceType->slug])}}"><img
                        src="{{ asset($serviceType->thumbnail) }}" class="w-100" alt="{{$serviceType->name}}"></a>
                <a href="{{ route('web.services.type.archive',['slug' => $serviceType->slug])}}"
                    class="blog-content-heading">
                    <h2 class="f-nunito font-30 fw-700 clr-br pt-3 pb-2 blog-content-heading">

                        {{$serviceType->name}}
                    </h2>
                </a>
                <p class="f-nunito fs-16 fw-400">{{$serviceType->description}}</p>
                <p class="pt-4">
                    <a href="{{ route('web.services.type.archive',['slug' => $serviceType->slug])}}"
                        class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                        <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </p>
            </div>
        @endforeach
           
        </div>


    </div>
</div>
@endsection