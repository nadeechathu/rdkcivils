@include('frontend.layouts.components.newsletter')
<div class="container1 d-none d-sm-block">
    <div class="content">
        <!-- Your main content goes here -->
    </div>
    <div class="sticky-social-bar ">
        <ul class="social-icons">
            <!-- Add your social media icons here -->
            <li class="bg-light-black mb-2 rounded-start-new py-2 ps-2 "><a
                    href="{{$commonContent['facebookLink']['description']}}" target="_blank" class="text-white"><i
                        class="fa fa-facebook"></i></a></li>


            <li class="bg-light-black mb-2 rounded-start-new py-2 ps-2 "><a
                    href="{{$commonContent['linkedinLink']['description']}}" class="text-white" target="_blank"><i
                        class="fa fa-linkedin"></i></a></li>

                        <li class="bg-light-black mb-2 rounded-start-new py-2 ps-2 "><a
                    href="{{$commonContent['twitterLink']['description']}}" class="text-white" target="_blank"><i
                        class="fa fa-twitter"></i></a></li>
            <li class="bg-light-black mb-2 rounded-start-new py-2 ps-2 "><a href="https://wa.me/+447985543471"
                    target="_blank" class="text-white"><i class="fa fa-whatsapp"></i></a></li>

        </ul>
        <!-- Messenger Chat Plugin Code -->

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "113025025150318");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>


</div>

<div class="container1">
    <div class="content">
        <!-- Your main content goes here -->
    </div>
    <div class="sticky-social-bar2 ">
        <ul class="">


            <li class="bg-brown  mb-4 rounded-start-new py-3 ps-3 d-block d-sm-none tab-d-block"><a
                    href="tel:07985543471" class="text-white">
                    <i class="fa fa-phone"></i>
                </a></li>



        </ul>
    </div>


</div>
<div class="container-fluid light-rose pb-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pt-lg-5 pt-2 pb-1 mt-4">Contact
                </h4>
                <ul>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder">1 Fernhill Court,
                        Almondsbury, Bristol,
                        BS32 4LX.</li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder mt-2">
                        <a href="mailto:info@rdkcivils.co.uk" class="light-black hvr-forward">info@rdkcivils.co.uk</a>
                    </li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder mt-1">
                        <a href="tel:02038161818" class="light-black hvr-forward">020 38161818</a>
                    </li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder mt-1">
                        <a href="tel:07985543471" class="light-black hvr-forward">079 85543471</a>
                    </li>

                    <div class="rounded-social-buttons pt-2 pe-lg-0">
                        <a class="social-button facebook hvr-wobble-bottom" z
                            href="{{$commonContent['facebookLink']['description']}}" target="_blank"><i
                                class="fa fa-facebook-f"></i></a>
                        {{-- <a class="social-button instagram hvr-wobble-bottom" href="#" target="_blank"><i
                            class="fa fa-instagram"></i></a>
                    <a class="social-button twitter hvr-wobble-bottom" href="#" target="_blank"><i
                            class="fa fa-twitter"></i></a> --}}
                        <a class="social-button linkedin hvr-wobble-bottom"
                            href="{{$commonContent['linkedinLink']['description']}}" target="_blank"><i
                                class="fa fa-linkedin"></i></a>
                         <a class="social-button linkedin hvr-wobble-bottom" href="{{$commonContent['twitterLink']['description']}}" target="_blank"><i
                                class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        {{-- <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                class="fa fa-linkedin" aria-hidden="true"></i></a> --}}

                        </li>
                    </div>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pt-lg-5 pt-2  pb-1 mt-4">Quick Links
                </h4>
                <ul>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{ route('web.story') }}">Our Story</a></li>
                    <li class=" pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{ route('web.services.archive') }}">Our Services</a>
                    </li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="{{ route('web.projects.archive') }}">Projects</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="{{ route('web.blogs.archive') }}">
                            Resources</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="{{ route('web.contact') }}">
                            Contact us</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pt-lg-5 pt-2 pb-1 mt-4">Planing Services
                </h4>
                <ul>
                    @foreach ($commonContent['planingServices'] as $service)
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward"
                            href="{{route('web.services.single',['slug' => $service->slug])}}">{{ $service->name }}</a>
                    </li>
                    @endforeach

                    {{-- <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="#">
                            Propert Externsions</a></li>
                    <li class=" pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="#">
                            Out Buildings</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="#">Drop Kerbs</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="#">New Building</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="#">Lerge Residential Developments</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="#">Change Of Usage</a></li> --}}
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pt-lg-5 pt-2 pb-1 mt-4">Building Control
                    Services
                </h4>
                <ul>
                    @foreach ($commonContent['buldingServices'] as $service)
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward"
                            href="{{route('web.services.single',['slug' => $service->slug])}}">{{ $service->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-0 col-0"></div>

            <!-- <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder  pb-1 mt-4">Finance
                </h4>
                <ul>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" >
                            About Resi Finance</a></li>
                </ul>
            </div> -->

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pb-1 mt-4">Resources
                </h4>
                <ul>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.book.appointment',['slug'=>'booking'])}}">
                            Advice Center</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{ route('web.faq') }}">
                            FAQs</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            House Extension Guide</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            Single Storey Extension Guide</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            Kitchen Extension Guide</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            Loft Conversion Guide</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            Garden Room Extension Guide</a></li>
                    <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{route('web.projects.archive')}}">
                            Garage Conversion Guide</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h4 class="font-20 light-black family-Nunito-sans fw-bolder pb-1 mt-4">Policy
                </h4>
                <ul>
                    {{-- <li class="pt-2 pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="#">
                            FAQ</a></li> --}}
                    <li class=" pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a
                            class="light-black hvr-forward" href="{{ route('web.terms.conditions') }}">
                            Terms and Condition</a></li>
                    <li class="pb-1 font-15 light-black family-Nunito-sans fw-bolder"><a class="light-black hvr-forward"
                            href="{{ route('web.privacy.policy') }}">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="row d-flex justify-content-center mt-5 pt-lg-3">
                <div class="col-lg-5 text-center">
                    <a href="" class="hvr-shrink">
                        <img src="{{ asset('/images/logo.png') }}" class="d-block w-100" alt="...">
                    </a>
                    <p class="font-14 light-black family-Nunito-sans fw-bolder pt-3">
                        Let us help make your dream construction needs into a reality. Give us a call today and see what
                        we
                        can do for you.
                    </p>
                    <div id="fb-root"></div>
                    <!-- Your Chat Plugin code -->
                    <div id="fb-customer-chat" class="fb-customerchat">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="jsScroll" class="scroll" onclick="scrollToTop();">
    <i class="fa fa-angle-up icon-bottom"></i>
</div>

<div class="container-fluid copyright-section bg-brown py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="font-14 text-white family-Nunito-sans fw-500 ">Copyright © <?php echo date('Y'); ?>
                    RDK Civil Engineering Limited All Rights Reserved</p>
            </div>
            <div class="col-lg-6">
                <p class="font-14 text-white family-Nunito-sans fw-500 text-lg-end">Designed & Developed by <a
                        href="https://guisrilanka.com/" class="text-white hover-underline" target="_blank"> GUI
                        Solutions Lanka</a></p>
            </div>



        </div>
    </div>
</div>


<script>
function addSubscription() {

    let subscriptionEmail = document.getElementById("subscription-email").value;

    // check subscription email is empty or not
    // validate entered email is an email or not

    if (subscriptionEmail !== '') {

        var email = document.getElementById('subscription-email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


        if (!filter.test(email.value)) {


            Swal.fire({
                icon: 'info',
                title: 'Hello...',
                customClass: "subcribe-succses",
                text: 'Please enter a valid email address !'
            });

            email.focus;
            return false;

        } else {

            $.ajax({
                type: "post",
                url: "subscribe",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'email': subscriptionEmail
                },
                success: function(res) {
                    if (res.status) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Hello...',
                            customClass: "subcribe-succses",
                            text: res.msg
                        });


                    } else {

                        Swal.fire({
                            icon: 'info',
                            title: 'Hello...',
                            customClass: "subcribe-succses",
                            text: res.msg
                        });
                    }


                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }



    } else {

        Swal.fire({
            icon: 'info',
            title: 'Hello...',
            customClass: "subcribe-succses",
            text: 'Subscription email cannot be empty !'
        });

    }

}
</script>
