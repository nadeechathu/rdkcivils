@extends('frontend.layouts.app')
@section('content')
    <div class="container py-5 family-Nunito-sans slider-section">
        <div class="container">
            <div class="row">
                <div class="col-12 px-lg-0">
                    <h2 class="family-Nunito-sans font-36 fw-bolder  light-black pb-3">{{$blog->title}}</h2>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-1 col-1 px-lg-0">
                    <img src="{{ $blog->user->user_image != null ? asset($blog->user->user_image) : asset('/images/no_user_image.png') }}" class="d-block mx-auto w-50" alt="Service Image">

                </div>
                <div class="col-lg-11 col-10">
                    <p class="pt-2 font-16 family-Nunito-sans fw-500 light-black"><span class="font-18 fw-bold ">By</span>
                        {{$blog->user != null ? $blog->user->first_name.' '.$blog->user->last_name.' |' : ''}} Published on {{explode('-',$blog->created_at)[0]}} | 2 min read</p>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-12 px-lg-0">
                    <img src="{{ asset($blog->banner) }}" class="d-block mx-auto w-100" alt="">
                </div>
            </div>

            <div class="row  pt-2 pb-4">
                <div class="col-lg-8 col-md-12 pe-lg-5 ps-lg-0">
                     <div class="blog-content-p f-nunito fs-16 fw-500 light-black pt-4 text-justify">{!!$blog->body!!}</div>
                </div>
                <div class="col-lg-4 col-md-12">
                 @if(sizeof($otherBlogs) > 0)
                 <div class="row">
                     <h6 class="ps-0 pt-4 f-nunito fs-14 fw-400">POPULAR POSTS</h6>
                 </div>
                 @endif
                 @foreach($otherBlogs as $otherBlog)
                 <div class="row border-bottom border-1 border-dark py-4">
                     <div class="col-3 ps-0">

                         <img src="{{ $otherBlog->featuredImage != null ? asset($otherBlog->featuredImage->src) : (sizeof($otherBlog->images) > 0 ? asset($otherBlog->images[0]->src) : asset('images/dummy.jpg')) }}" class="d-block mx-auto w-100" alt="">
                     </div>
                     <div class="col-9">
                         {{--<div class="row">
                             <h6 class="text-uppercase f-nunito fs-12 fw-400">PRODUCT</h6>
                         </div>--}}
                         <div class="row">
                         <a href="{{route('web.blogs.single',['slug' => $otherBlog->slug])}}"><h6 class="f-nunito fs-20 fw-500">{{$otherBlog->title}}</h6></a>
                         </div>
                     </div>
                 </div>
                 @endforeach
                
                 <div class="row pt-4">
                     <div class="get-started text-center">
                         <p class="f-nunito font-27 fw-400">Get More Done Together With RDK</p>
                         <p class="f-nunito font-24 fw-500 pb-2 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                         <a href="{{route('web.contact')}}"><button type="button" class="f-nunito fw-500 btn get-started-button font-16 px-4 py-2 mt-5 hvr-grow">Get Started</button></a>
                     </div>
                 </div>


                </div>
             </div>
        </div>
    </div>
@endsection
