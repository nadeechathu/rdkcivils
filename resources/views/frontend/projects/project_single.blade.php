@extends('frontend.layouts.app')
@section('content')
<div class="container py-5 family-Nunito-sans slider-section">
   <div class="row d-flex align-items-center">
      <div class="col-lg-12">
         <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2 d-lg-none d-block">{{$project->title}}
         </h2>
      </div>
      <div class="col-lg-6 col-sm-8 col-12 mb-3">
         <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}" class="d-block w-100" alt="Service Image">
      </div>
      <div class="col-lg-6 col-12">
         <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2 d-lg-block d-none">{{$project->title}}
         </h2>
         <ul class="list-group list-group-flush">
            @if($project->location != null)
            <li class="list-group-item border-0">
               <div class="row d-flex align-items-center">
                  <div class="col-1">
                     <img src="{{ asset('/images/projects/icon-01.png') }}" class="d-block w-100"
                        alt="Service Image">
                  </div>
                  <div class="col-10">
                     <p class="fs-5"><b>Location</b></p>
                     <p>{{$project->location}}</p>
                  </div>
               </div>
            </li>
            @endif
           {{-- @if($project->budget != null)
            <li class="list-group-item border-0">
               <div class="row d-flex align-items-center">
                  <div class="col-1">
                     <img src="{{ asset('/images/projects/icon-02.png') }}" class="d-block w-100"
                        alt="Service Image">
                  </div>
                  <div class="col-10">
                     <p class="fs-5"><b>Budget</b></p>
                     <p>£ {{$project->budget}}</p>
                  </div>
               </div>
            </li>
            @endif --}}
         </ul>
         <p class="mb-2 family-Nunito-sans">{!!substr($project->description,0,700)!!}</p>
      </div>
      <div class="col-md-12">
         {!!substr($project->description,701)!!}
      </div>
      @if(sizeof($project->drawings) > 0)
      <div class="row mt-5">
         <div class="col-12 mb-3">
            <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">Drawing Images</h2>
         </div>
         @if(sizeof($project->drawings) > 3)
         <div class="row  owl-carousel serviceSingle">
            @foreach($project->drawings as $drawing)
            <div class="item">
               <a class="example-image-link " href="{{ asset($drawing->src) }}" data-lightbox="example-set"
                  data-title="Or press the right arrow on your keyboard.">
               <img src="{{ asset($drawing->src) }}" class="d-block w-100 filter-black border"
                  alt="RDK CIVIL ENGINEERING LIMITED">
               </a>
            </div>
            @endforeach
            @else
            @foreach($project->drawings as $drawing)
            <div class="col-lg-4 col-sm-6 col-12">
               <a class="example-image-link " href="{{ asset($drawing->src) }}" data-lightbox="example-set"
                  data-title="Or press the right arrow on your keyboard.">
               <img src="{{ asset($drawing->src) }}" class="d-block w-100 filter-black border"
                  alt="RDK CIVIL ENGINEERING LIMITED">
               </a>
            </div>
            @endforeach
         </div>
         @endif
      </div>
      @endif

      <div class="col-12 mt-5 mb-4">
        <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">Project Images</h2>
     </div>
      @if(sizeof($project->images) > 3)
      <div class="row  owl-carousel serviceSingle">
        @foreach($project->images as $image)
         <div class="item">
            <a class="example-image-link " href="{{ asset($image->src) }}" data-lightbox="example-set"
               data-title="Or press the right arrow on your keyboard.">
            <img src="{{ asset($image->src) }}" class="d-block w-100 filter-black border"
               alt="RDK CIVIL ENGINEERING LIMITED">
            </a>
         </div>
         @endforeach
      </div>
         @else
         <div class="row">
         @foreach($project->images as $image)
         <div class="col-lg-4 col-sm-6 col-12">
            <a class="example-image-link " href="{{ asset($image->src) }}" data-lightbox="example-set"
               data-title="Or press the right arrow on your keyboard.">
            <img src="{{ asset($image->src) }}" class="d-block w-100 filter-black border"
               alt="RDK CIVIL ENGINEERING LIMITED">
            </a>
         </div>
         @endforeach
      </div>
      @endif
      {{-- @if(sizeof($project->images) > 0)
      <div class="row mt-4">
         <div class="col-12 mb-4">
            <h2 class="family-Nunito-sans fw-bolder font-30 light-black pb-2">Project Images</h2>
         </div>
         @foreach($project->images as $image)
         <div class="col-lg-4 col-md-4 col-12 mb-4">
            <a class="example-image-link " href="{{ asset($image->src) }}" data-lightbox="example-set"
               data-title="Or press the right arrow on your keyboard.">
            <img src="{{ asset($image->src) }}" class="d-block w-100 filter-black"
               alt="RDK CIVIL ENGINEERING LIMITED">
            </a>
         </div>
         @endforeach
      </div>
      @endif --}}
   </div>
</div>
@endsection