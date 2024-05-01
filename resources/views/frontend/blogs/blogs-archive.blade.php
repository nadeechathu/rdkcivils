@extends('frontend.layouts.app')
@section('content')

<!-- header banner -->
<div class="container-fluid slider-section">

    <div class="row">
        <div class="col-12 px-0">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/images/header-banner-our-blog.png') }}" class="d-block w-100"
                alt="Services Header Banner">
            <div class="carousel-caption header-banner">
                <h1 class="font-40 family-Questrial fw-500 light-black">Resources</h1>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- / header banner -->



<div class="container-fluid py-5">
    <div class="container">
        <div class="row pb-lg-4">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-sm-6 pb-sm-4 pt-3">
               <a href="{{route('web.blogs.single',['slug' => $blog->slug])}}"><img src="{{ $blog->featuredImage != null ? asset($blog->featuredImage->src) : (sizeof($blog->images) > 0 ? asset($blog->images[0]->src) : asset('images/dummy.jpg')) }}" class="w-100" alt=""></a>
               <a href="{{route('web.blogs.single',['slug' => $blog->slug])}}" class="blog-content-heading"><h2 class="f-nunito f fw-700 clr-br pt-2 blog-content-heading my-2">{{$blog->title}}</h2></a>
               <p class="f-nunito fs-16 fw-400">{!!substr($blog->body,0,150)!!}...</p></p>
               @if($blog->user != null)
                <div class="row d-flex pt-3 my-2">
                    <div class="col-2 d-flex align-items-center justify-content-evenly">
                        <img src="{{ $blog->user->user_image != null ? asset($blog->user->user_image) : asset('/images/no_user_image.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-10">

                        <h5 class="f-nunito fs-16 fw-700 clr-br mb-0">{{$blog->user->first_name}} {{$blog->user->last_name}}</h5>
                        <h6 class="blog-date fs-14 fw-600">{{explode(' ',$blog->created_at)[0]}}</h6>

                    </div>
                </div>
                @endif
            </div>
            @endforeach

            <br>
            <div class="row pagination-row">
                <div class="col-md-12">
                {!! $blogs->links() !!}
                </div>
            </div>

        </div>


    </div>
</div>


@endsection
