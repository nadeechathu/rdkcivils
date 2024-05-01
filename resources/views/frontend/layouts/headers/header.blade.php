<div class="container-fluid header-section px-0 family-Questrial ">
    <div class="header-top py-2">
        <div class="container">
       <div class="row">
        <div class="col-lg-6">
            <p class="mb-0 fs-6 align-text-center"><i class="fa fa-phone me-2" aria-hidden="true"></i><span
                class="me-3"><a href="tel:02038161818" class="light-yellow">020 38161818</a></span>
                | <i class="fa fa-phone mx-2" aria-hidden="true"></i>
                <span class="me-3"><a href="tel:07985543471" class="light-yellow">079 85543471</a></span>
             </p>
          </div>
          <div class="col-lg-6 col-sm-12 col-12 text-md-end text-center">
            <div class="row justify-content-lg-end justify-content-center">
               <div class="col-lg-5 col-sm-4 col-7 col-lg-8-tabs px-lg-0 pt-1 border-end">
                  <p class="mb-0 fs-6"><i class="fa fa-envelope me-3" aria-hidden="true"></i><span
                     class="me-3">
                     <a href="mailto:info@rdkcivils.co.uk" class="light-yellow">info@rdkcivils.co.uk</a>
                  </p>
               </div>
               <div class="col-lg-1 col-sm-2 col-3 pt-1">
                  <p class="mb-0 fs-6 text-sm-start">
                     @if (Auth::user() == null)
                     <a href="{{route('clients.login')}}" class="light-yellow">
                     Login </a>
                     @else
                     @if (in_array(Auth::user()->role_id,[1,3,4,5,6,7]))
                     {{-- <i class="fa fa-tachometer fw-light"></i>&nbsp; <a href="/admin/dashboard"
                        class="poppins-font text-secondary p-small p-hover">Dashboard</a>&nbsp; | &nbsp;  --}}
                     @endif
                  <div class="dropdown d-inline">
                     <button class="btn dropdown-toggle p-0 border-0 text-white" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     {{ Auth::user()->first_name }}
                     {{-- {{ Auth::user()->last_name }} --}}
                     </button>
                     <ul class="dropdown-menu bg-gray-light profile-dropdown"
                        aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item font-14 family-Nunito-sans fw-bolder light-black"
                           href="{{route('clients.dashboard')}}">Dashboard</a>
                        {{-- <a class="dropdown-item account-dropdown poppins-font text-dark font-13 mb-1 d-inline-block fw-500 hover-green" href="{{route('web.user.account')}}">My
                        Account
                        </a> --}}
                        <a class="dropdown-item font-14 family-Nunito-sans fw-bolder light-black" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </ul>
                  </div>
                  @endif
                  </p>
               </div>
               <!-- <div class="col-lg-3 col-sm-5 col-7 col-lg-8-tabs px-lg-0">
                  <a class="btn bg-light-yellow text-dark mx-2"
                         href="{{route('web.quotation')}}">Get a Quote</a>
                  </div> -->
            </div>
            {{--
            @if(Auth::user())
            <a class="text-white " href="{{route('clients.dashboard')}}">Dashboard</a></p>
            @else
            <a class="text-white " href="{{route('clients.login')}}">Login</a>
            @endif --}}
            </p>
         </div>
       </div>
    </div>
    </div>
    <div class="row px-lg-0 px-sm-3 px-3">
       <div class="col-lg-3 col-sm-3 col-12 pt-1 d-none d-sm-block tab-d-none text-center">
          <a href="/" title="RDK CIVIL ENGINEERING LIMITED | HOME">
          <img class=" logo-header" src="{{ asset($commonContent['siteLogo']['description']) }}"
             alt="RDK Engineering">
          </a>
       </div>

       <div class="col-lg-9 col-sm-12 pt-lg-0 pt-3 ">
          <nav class="navbar navbar-expand-lg py-0 ">
             <a class="navbar-brand d-block d-sm-none tab-d-block" href="/"
                title="RDK CIVIL ENGINEERING LIMITED | HOME">
             <img class=" logo-header" src="{{ asset($commonContent['siteLogo']['description']) }}"
                alt="RDK Engineering">
             </a>
             <button class="navbar-toggler bg-dark toggle-btn " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
             <i class="fa fa-bars text-white" aria-hidden="true"></i>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ps-lg-5 text-lg-end">
                   <li class="nav-item ">
                      <a class="nav-link font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black {{ request()->is('/') ? 'active' : '' }}"
                         aria-current="page" href="{{ route ('web.home')}}">Home</a>
                   </li>
                   <li class="nav-item px-lg-2">
                      <a class="nav-link font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black {{ request()->is('our-story') ? 'active' : '' }}"
                         href="{{route('web.story')}}">Our Story</a>
                   </li>
                   {{--
                   <li class="nav-item px-lg-2">
                      <a class="nav-link font-18 family-Nunito-sans fw-500 px-3  hvr-sweep-to-top pt-10 light-black {{ request()->is('services') ? 'active' : '' }}"
                         href="{{ route ('web.services.archive')}}">Our Services</a>
                   </li>
                   --}}
                   <li class="nav-item dropdown d-block d-sm-none">
                      <a class="nav-link dropdown-toggle font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black  {{ request()->is('services') ? 'active' : '' }}"
                         href="{{route('web.services.archive')}}" id="navbarDropdownMenuLink" role="button"
                         data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Our Services
                      </a>
                      <ul class="dropdown-menu  bg-brown" aria-labelledby="navbarDropdownMenuLink">
                         @foreach($commonContent['serviceTypes'] as $serviceType)
                         <li>
                            <a class="dropdown-item font-14 family-Nunito-sans fw-bolder px-3 text-white py-2"
                               href="{{ route('web.services.type.archive',['slug' => $serviceType->slug])}}">{{$serviceType->description}}</a>
                            <ul class="ms-4">
                               @foreach($serviceType->services as $service)
                               <li>
                                  <a class="dropdown-item font-14 family-Nunito-sans fw-bolder px-3 text-white py-2"
                                     href="{{ route('web.services.single',['slug' => $service->slug])}}">
                                  {{$service->name}}
                                  </a>
                               </li>
                               @endforeach
                            </ul>
                         </li>
                         @endforeach
                      </ul>
                   </li>
                   <li class="nav-item dropdown  d-none d-sm-block">
                      <a class="nav-link dropdown-toggle font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black  {{ request()->is('services*') ? 'active' : '' }}"
                         href="{{route('web.services.archive')}}" id="navbarDropdownMenuLink"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Our Services
                      </a>
                      <div class="dropdown-menu bg-brown" aria-labelledby="navbarDropdownMenuLink">
                         @foreach($commonContent['serviceTypes'] as $serviceType)
                         <div class="planing-services">
                            <a class="dropdown-item font-15 family-Nunito-sans fw-bolder px-3 text-white py-2 {{ request()->is('*'.$serviceType->slug) ? 'nav-active' : '' }}"
                               href="{{ route('web.services.type.archive',['slug' => $serviceType->slug])}}">{{$serviceType->description}}</a>
                            <div class="dropdown-menuitem1 bg-brown d-none"
                               aria-labelledby="navbarDropdownMenuLink">
                               @foreach($serviceType->services as $service)
                               <a class="dropdown-item font-15 family-Nunito-sans fw-bolder px-3 text-white py-2 {{ request()->is('*'.$service->slug) ? 'nav-active' : '' }}"
                                  href="{{ route('web.services.single',['slug' => $service->slug])}}">
                               {{$service->name}}
                               </a>
                               @endforeach
                            </div>
                         </div>
                         @endforeach
                         {{--
                         <div class="building-control-services">
                            <a class="dropdown-item font-15 family-Nunito-sans fw-bolder px-3 text-white py-2 {{ request()->is('*structural') ? 'nav-active' : '' }}"
                               href="{{ route('web.services.type.archive',['slug' => 'structural'])}}">Building
                            Control Services</a>
                            <div class="dropdown-menuitem2 bg-brown d-none"
                               aria-labelledby="navbarDropdownMenuLink">
                               @foreach($commonContent['buldingServices'] as $building)
                               <a class="dropdown-item font-15 family-Nunito-sans fw-bolder px-3 text-white py-2 {{ request()->is('*'.$building->slug) ? 'nav-active' : '' }}"
                                  href="{{ route('web.services.single',['slug' => $building->slug])}}">
                               {{$building->name}}
                               </a>
                               @endforeach
                            </div>
                         </div>
                         --}}
                      </div>
                   </li>
                   <li class="nav-item px-lg-2">
                      <a class="nav-link font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black  {{ request()->is('projects') ? 'active' : '' }}"
                         href="{{ route ('web.projects.archive')}}">Projects</a>
                   </li>
                   <li class="nav-item px-lg-2">
                      <a class="nav-link font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black  {{ request()->is('resources') ? 'active' : '' }}"
                         href="{{route('web.blogs.archive')}}">Resources</a>
                   </li>
                   <li class="nav-item px-lg-2">
                      <a class="nav-link font-15 family-Nunito-sans fw-bolder px-3  hvr-sweep-to-top pt-10 light-black  {{ request()->is('contact-us') ? 'active' : '' }}"
                         href="{{route('web.contact')}}">Contact Us</a>
                   </li>
                   <li class="nav-item px-lg-2">
                      <a class=" nav-link font-15 family-Nunito-sans fw-bolder px-3   pt-10 light-black  "
                         href="{{route('web.quotation')}}"><button class="btn fw-bold text-dark mx-2 mb-2 btn-quote">Get a Quote</button></a>
                   </li>
                </ul>
                <!-- <div class="col-lg-3 col-sm-5 col-7 col-lg-8-tabs px-lg-0">
                   <a class="btn  text-dark mx-2 btn-quote"
                          href="{{route('web.quotation')}}">Instant Quote</a>
                   </div> -->
                {{-- <button id="phone-btn" class="rounded-circle bg-brown px-2 py-1 mx-auto">
                <i class="fa fa-phone font-20 text-white" aria-hidden="true"></i>
                </button>
                <div id="phone-bar" class="d-none ">
                   <p class="py-1 font-15  family-Nunito-sans fw-bolder"> <a class="text-white" href="tel:7547976051">
                      +44 7547 976051</a>
                   </p>
                </div>
                --}}
                <div class="info_side_bar d-none d-sm-block tab-d-none ">
                   <div class="bar_wrapper">
                      <div class="barList">
                         <ul class="d-none">
                            <li class="highlight">
                               <div class="barEntry mail">
                                  {{-- <i class="fa fa-phone icon-phone font-20 text-white float-start" aria-hidden="true"></i> --}}
                                  <div class="phone">
                                     <svg version "1.1" id="phone" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 82 82" style="enable-background:new 0 0 82 82;"
                                        xml:space="preserve">
                                        <path
                                           d="M64.5,78.2c1.7-1.9,3.6-3.6,5.4-5.4c2.6-2.7,2.7-5.9,0-8.6c-3.1-3.2-6.3-6.3-9.4-9.4
                                           c-2.6-2.6-5.8-2.6-8.4,0c-2,1.9-3.9,3.9-5.9,5.9c-0.1,0.1-0.3,0.2-0.4,0.3l-1.3,1.3c-0.4,0.2-0.7,0.2-1.2,0
                                           c-1.3-0.7-2.6-1.2-3.8-2c-5.7-3.6-10.5-8.2-14.7-13.4c-2.1-2.6-4-5.3-5.3-8.4c-0.2-0.5-0.2-0.9,0.1-1.3l1.3-1.3
                                           c0.1-0.1,0.1-0.2,0.2-0.3c0.6-0.6,1.2-1.1,1.8-1.7c1.4-1.3,2.7-2.7,4.1-4.1c2.7-2.7,2.7-5.9,0-8.6c-1.5-1.5-3.1-3.1-4.6-4.6
                                           c-1.6-1.6-3.2-3.2-4.8-4.8c-2.6-2.5-5.8-2.5-8.4,0c-2,1.9-3.9,3.9-5.9,5.9c-1.9,1.8-2.8,3.9-3,6.5c-0.3,4.1,0.7,8,2.1,11.8
                                           C5.2,43.8,9.6,50.7,15,57.1c7.2,8.6,15.9,15.4,26,20.4c4.6,2.2,9.3,3.9,14.4,4.2C58.9,81.8,62,81,64.5,78.2z">
                                        </path>
                                        <path
                                           d="M41.1,15.7
                                           c-0.7,0-1.5,0.1-2.2,0.4c-1.7,0.8-2.5,2.8-2,4.8c0.4,1.8,2,3,3.9,3c4.6,0.1,8.6,1.5,12,4.6c3.7,3.4,5.4,7.7,5.6,12.8
                                           c0,0.9,0.4,1.9,0.9,2.6c1.1,1.5,3,1.9,4.8,1.2c1.6-0.6,2.5-2,2.5-3.9c-0.1-7-2.6-12.9-7.5-18.1C54.1,18.4,48.1,15.8,41.1,15.7z">
                                        </path>
                                        <path d="M69,11.4c8.5,8.7,12.5,18.1,12.8,29.1c0.1,2.5-1.5,4.2-3.9,4.3c-2.6,0.1-4.3-1.4-4.4-4c-0.1-5.4-1.4-10.5-4-15.2
                                           C63.5,14.9,54.2,9.3,42,8.6c-1.4-0.1-2.6-0.2-3.6-1.3c-1.2-1.4-1.3-3-0.7-4.6c0.7-1.6,2-2.4,3.8-2.4c8,0.1,15.3,2.4,22,6.8
                                           C65.7,8.6,67.8,10.4,69,11.4z"></path>
                                     </svg>
                                  </div>
                                  <div class="barContent ">
                                     <p class="py-1 font-15  family-Nunito-sans fw-bolder"> <a
                                        class="text-white" href="tel:079 8554 3471">
                                        079 8554 3471</a>
                                     </p>
                                  </div>
                               </div>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </nav>
       </div>

    </div>
 </div>
 <script>
    $(document).ready(function() {
        $('.dropdown-menuitem').hover(function() {
            $(this).addClass('show');
            $(this).find('.dropdown-menu3').addClass('show');
        }, function() {
            $(this).removeClass('show');
            $(this).find('.dropdown-menu3').removeClass('show');
        });
    });
 </script>
