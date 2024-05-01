@extends('frontend.layouts.app')
@section('content')

<!-- header banner -->
<div class="container-fluid slider-section">

    <div class="row">
        <div class="col-12 px-0">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/images/projects/project-header-banner.png') }}" class="d-block w-100"
                alt="Services Header Banner">
            <div class="carousel-caption header-banner">
                <h1 class="font-40 family-Questrial fw-500 light-black">Projects</h1>
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
            <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">Our Recent Projects</h2>
            <p class="mb-2 family-Nunito-sans mt-lg-0 ">Let us help make your dream construction needs into a
                reality. Give us a call today and see what we can do for you.</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 mb-4">
            @foreach($projects as $key => $project)
            @if($key % 2 == 0)
            <!-- projects card -->
            <div class="row  mb-4 pb-sm-4">
                <div class="col-lg-6 col-sm-5 col-12 pe-lg-0 rounded-0 border-0">
                    <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}" class="card-img-top rounded-0 border-0"
                        alt="...">
                </div>
                <div class="col-lg-6 col-sm-7 col-12 ps-0 d-flex align-items-center">
                    <div class="card rounded-0 border-0">
                        <div class="card-body px-lg-5 px-3 py-sm-0">
                            <h3 class="family-Nunito-sans fw-bolder light-black pb-3">
                                {{$project->title}}</h3>
                            <div class="mb-2 family-Nunito-sans mt-lg-0 pb-4 font-16">{!!substr($project->description,0,300)!!} ...</div>
                            <p> <a href="{{ route('web.projects.single',['slug' => $project->slug])}}"
                                class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                                <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                                <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>    </p>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <!-- projects card -->
            <div class="row  mb-4 pb-sm-4">
                <div class="col-lg-6 col-sm-5 col-12 pe-lg-0 rounded-0 border-0 d-lg-none d-block">
                    <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}" class="card-img-top rounded-0 border-0"
                        alt="...">
                </div>
                <div class="col-lg-6 col-sm-7 col-12 ps-0 d-flex align-items-center">
                    <div class="card rounded-0 border-0">
                        <div class="card-body px-lg-5 px-3 py-sm-0">
                            <h3 class="family-Nunito-sans fw-bolder light-black pb-3">
                            {{$project->title}}</h3>
                            <div class="mb-2 family-Nunito-sans mt-lg-0 pb-4 font-16">{!!substr($project->description,0,300)!!} ...</div>
                           <p>
                            <a href="{{ route('web.projects.single',['slug' => $project->slug])}}" class="family-Nunito-sans py-3 pe-4 fs-6 btn-view-details">
                                <span class="bg-dark py-3 ps-4 pe-1 fs-6 btn-view">VIEW</span>
                                <span class="text-black py-3 pe-3 ps-0 fs-6">DETAILS</span>
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                           </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 pe-lg-0 rounded-0 border-0 d-lg-block d-none">
                    <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}" class="card-img-top rounded-0 border-0"
                        alt="...">
                </div>
            </div>

            @endif
            @endforeach


        </div>
    </div>
</div>

@endsection
