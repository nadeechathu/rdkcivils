@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')
<div class="container-fluid slider-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">{{$service->name}} </h2>
            </div>

            <div class="col-lg-6">

                <div class="mb-2 family-Nunito-sans font-15 light-black fw-500 text-justify">
                    {!!$service->description!!}
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <img src="{{ asset($service->image) }}" alt="Your Image" class="w-100">

            </div>
        </div>
        @if(sizeof($service->projects) > 0)
        <div class="row mt-5">
            <div class="col-12 mb-4">
                <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">Related Projects</h2>
            </div>

            <div class="col-12">
                @if(sizeof($service->projects) > 3)
                <div class="row  owl-carousel serviceSingle">
                    @foreach($service->projects as $project)
                    <div class="item">
                        <!-- <a class="example-image-link "
                            href="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}"
                            data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."> -->
                        <a href="{{ route('web.projects.single',['slug' => $project->slug])}}">
                            <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}"
                                class="d-block w-100 filter-black" alt="RDK CIVIL ENGINEERING LIMITED">
                            <h4 class="family-Nunito-sans fw-bolder fs-4 light-black pb-2 mt-3 text-center">
                                {{$project->title}}
                            </h4>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="row">
                    @foreach($service->projects as $project)
                    <div class="col-lg-4 col-sm-6">
                        <!-- <a class="example-image-link "
                            href="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}"
                            data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."> -->
                        <a href="{{ route('web.projects.single',['slug' => $project->slug])}}">
                            <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}"
                                class="d-block w-100 filter-black" alt="RDK CIVIL ENGINEERING LIMITED">
                            <h4 class="family-Nunito-sans fw-bolder fs-4 light-black pb-2 mt-3 text-center">
                                {{$project->title}}
                            </h4>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

        </div>
        @endif
    </div>
</div>
@endsection