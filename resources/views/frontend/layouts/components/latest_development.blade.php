@if(sizeof($projects) > 0)
<div class="container-fluid py-5 letast-section">
    <div class="container">
        <div class="row mb-lg-2 pb-5">
            <div class="col-lg-9">
                <h2 class=" family-Nunito-sans fw-bolder font-40 text-uppercase light-black">Latest Developments</h2>
            </div>
            <div class="col-3 text-end d-none d-sm-block tab-display-none">
                {{-- <p class=" font-18 pt-2" >
                    <a href="{{ route ('web.projects.archive')}}"
                    class="family-Nunito-sans py-3 btn-view-details">
                    <span class="bg-dark py-3 ps-4  btn-view">VIEW</span>
                    <span class="text-black py-3 pe-3">ALL</span>
                    <i class="fa fa-long-arrow-right pe-4" aria-hidden="true"></i>
                    </a>
                    </p> --}}

                    <p class=" font-18  pt-2">
                        <a href="{{ route('web.projects.archive') }}" class="family-Nunito-sans py-3 btn-view-details w-100  text-uppercase fw-500 pe-3">
                        <span class="bg-dark py-3 ps-3  btn-view">VIEW</span>
                        <span class="text-black py-3 pe-3">ALL</span>
                        {{-- <i class="fa fa-long-arrow-right pe-4" aria-hidden="true"></i> --}}
                        <img src="{{ asset('/images/arrow-right1.png') }}" class="">
                        </a>
                     </p>

            </div>
        </div>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-lg-4 col-sm-6 ">

                <a href="{{ route('web.projects.single',['slug' => $project->slug])}}">
                <img src="{{ sizeof($project->images) > 0 ? asset($project->images[0]->src) : asset('/images/projects/dummy.jpg') }}" class="w-100">
                <h4 class=" family-Nunito-sans fw-bolder font-27 pt-3 pb-1 light-black">{{$project->title}}
                </h4>
                <p class="family-Nunito-sans fw-bolder font-18 pb-lg-5 pb-3 light-black">{{$project->location}}</p>
            </a>
            </div>
            @endforeach


        </div>
        <div class="row d-block d-sm-none tab-display">
            <div class="col-12">
                <p class=" font-18  pt-4">
                    <a href="{{ route('web.projects.archive') }}" class="family-Nunito-sans py-3 btn-view-details w-100  text-uppercase fw-500 pe-3">
                    <span class="bg-dark py-3 ps-3  btn-view">VIEW</span>
                    <span class="text-black py-3 pe-3">ALL</span>
                    {{-- <i class="fa fa-long-arrow-right pe-4" aria-hidden="true"></i> --}}
                    <img src="{{ asset('/images/arrow-right1.png') }}" class="">
                    </a>
                 </p>
                {{-- <p class=" font-18 pt-4" >
                    <a href="{{ route ('web.projects.archive')}}"
                    class="family-Nunito-sans py-3 btn-view-details w-100">
                    <span class="bg-dark py-3 ps-4  btn-view">VIEW</span>
                    <span class="text-black py-3 pe-3">ALL</span>
                    <i class="fa fa-long-arrow-right pe-4" aria-hidden="true"></i>
                    </a>
                    </p> --}}
            </div>
        </div>
    </div>
</div>
@endif
