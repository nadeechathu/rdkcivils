<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Analytics tag -->
    @if (isset($commonContent))
        @if ($commonContent['analytics'] != null)
            {!! $commonContent['analytics']['description'] !!}
        @endif
    @endif
    <title>@yield('title', 'RDK Civil Engineering Limited')</title>
    <meta name="title" content="@yield('page_title', '')">
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">

    <link rel="canonical" href="@yield('canonical_url', '')">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" />

    <link href="{{ asset('css/custom_s.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_c.css') }}" rel="stylesheet">

    <link href="{{ asset('css/rdk-styles-old_1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rdk-responsive.css') }}" rel="stylesheet">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900&family=Questrial&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
    <style>
        body {
            font-size: 0.9rem !important;
        }

        .user-image {
            width: 50px;
        }
        .red-border{
            border: 5px solid #ff0000;
        }

    </style>

</head>

<body class="">


    @include('frontend.layouts.headers.header')
    <!-- Page Content -->
    <main id="main">


        @yield('content')

        <!-- / Content-->

    </main>

      <!-- Your website content goes here -->

    <!-- Cookie policy section -->


    @include('frontend.layouts.footers.footer')

    @if(session()->has('registerMessage'))
    <input type="text" hidden id="client-register-message" value="{{Session::get('registerMessage')}}">
    {{Session::forget('registerMessage')}}
    @endif

    <div class="container-fluid py-3 bg-light-black position-fixed bottom-0" id="cookie-policy" style="display: none;">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-9">
                <p class="font-16 family-Nunito-sans fw-500 text-white pt-2 pb-lg- pb-sm-0 pb-3 text-lg-start text-sm-start text-center"><span class="cookie">🍪</span> This website uses cookies to ensure you get the best experience on our website.</p>

            </div>
            <div class="col-lg-2 col-sm-3">
                <button id="accept-cookies" class="btn btn-primary w-100 fw-bolder bg-white text-black py-2 font-16 family-Nunito-sans fw-500 text-center border-0">Accept</button>

            </div>
           </div>
          </div>
      </div>

      <div id="fb-root"></div>

      <!-- Your Chat Plugin code -->
      <div id="fb-customer-chat" class="fb-customerchat">
      </div>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ url('/js/vendor.bundle.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>

    <!-- CKEditor -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ url('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/js/cookie.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    @yield('scripts')

<script>

$('.serviceSingle').owlCarousel({

margin: 20,
rewind: true,
lazyLoad: true,
loop: true,
dots: false,
nav: true,

autoplay: true,
smartSpeed: 300,
singleItem: true,
animateIn: 'fadeIn',
animateOut: 'fadeOut',
autoplayTimeout: 7000,
responsive: {
    0: {
        items: 1
    },
    600: {
        items: 1
    },
    1000: {
        items: 3
    }
}
});

$('.homeTestimonial').owlCarousel({

margin: 20,
rewind: true,
lazyLoad: true,
loop: true,
dots: true,
nav: false,

autoplay: true,
smartSpeed: 300,
singleItem: true,
animateIn: 'fadeIn',
animateOut: 'fadeOut',
autoplayTimeout: 7000,
responsive: {
    0: {
        items: 1
    },
    600: {
        items: 1
    },
    1000: {
        items: 1
    }
}
});




$(document).ready(function() {

    //show register message
    let registerElm = document.getElementById('client-register-message');

    if(registerElm !== null){

        Swal.fire({
            icon: 'success',
            title: 'Registration Successful',
            text: registerElm.value,
            allowOutsideClick: false
        })
    }


    setTimeout(function() {

$("#preloaders").fadeOut(1000);
}, 1000);



var sync1 = $("#sync1");
var sync2 = $("#sync2");
var slidesPerPage = 4; //globaly define number of elements per page
var syncedSecondary = true;

sync1.owlCarousel({
  items : 1,
  slideSpeed : 2000,
  nav: false,
  autoplay: true,
  dots: true,
  loop: true,
  responsiveRefreshRate : 200,

}).on('changed.owl.carousel', syncPosition);

sync2
  .on('initialized.owl.carousel', function () {
    sync2.find(".owl-item").eq(0).addClass("current");
  })
  .owlCarousel({
  items : slidesPerPage,
  dots: true,
  margin:20,
  nav: true,
  smartSpeed: 200,
  slideSpeed : 500,
  slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
  responsiveRefreshRate : 100,
  responsive: {
    0: {
        items: 1
    },
    600: {
        items: 2
    },
    1000: {
        items: 4
    }
}
}).on('changed.owl.carousel', syncPosition2);

function syncPosition(el) {

  var count = el.item.count-1;
  var current = Math.round(el.item.index - (el.item.count/2) - .5);

  if(current < 0) {
    current = count;
  }
  if(current > count) {
    current = 0;
  }

  //end block

  sync2
    .find(".owl-item")
    .removeClass("current")
    .eq(current)
    .addClass("current");
  var onscreen = sync2.find('.owl-item.active').length - 1;
  var start = sync2.find('.owl-item.active').first().index();
  var end = sync2.find('.owl-item.active').last().index();

  if (current > end) {
    sync2.data('owl.carousel').to(current, 100, true);
  }
  if (current < start) {
    sync2.data('owl.carousel').to(current - onscreen, 100, true);
  }
}

function syncPosition2(el) {
  if(syncedSecondary) {
    var number = el.item.index;
    sync1.data('owl.carousel').to(number, 100, true);
  }
}

sync2.on("click", ".owl-item", function(e){
  e.preventDefault();
  var number = $(this).index();
  sync1.data('owl.carousel').to(number, 300, true);
});

$('#phone-btn').click(function() {

    $('#phone-bar').removeClass('d-none');
    $('#phone-bar').addClass('d-block');
    $('#phone-bar').animate( 300);
  });


});
window.addEventListener('scroll', e => {
            var el = document.getElementById('jsScroll');
            if (window.scrollY > 300) {
                el.classList.add('visible');
            } else {
                el.classList.remove('visible');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }


        $(function () {
    var shrinkHeader = 100;
    $(window).scroll(function () {
        var scroll = getCurrentScroll();
        if (scroll >= shrinkHeader) {
            $('.header-section').addClass('shink-header-full');
        }
        else {

            $('.header-section').removeClass('shink-header-full');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }

    $(document).ready(function() {
        $('.barList > ul > li').hover(
           function(){ $(this).addClass('opened') },
           function(){ $(this).removeClass('opened') }
        )
        $('.barList > ul > li.highlight').addClass('animate');
        $('.barList > ul > li.highlight').on('mouseleave', function() {
            $(this).addClass("animate");
        });
        $('.barList > ul > li.highlight').on('mouseenter', function() {
            $(this).addClass("opened");
            $(this).removeClass("animate");
        });
    });
});
</script>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "113025025150318");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v17.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

<!-- Quotation form script-->
  <script>


    let propertyDesignId = '';
    let extendPart = '';
    let extendSubPart = '';
    let bedRoomCount = '';
    let designingProcess = '';
    let otherService = '';
    let professional = '';
    let serviceYouNeed = '';


    function setSelectedItem(designId){
        propertyDesignId = designId;
        var inputElement = document.getElementById("propertyDesignId");
        inputElement.value = propertyDesignId;

        let previewImages = document.getElementsByClassName('design-image');
        let imageToPreview = document.getElementById('preview-image'+designId);
        let normalImage = document.getElementById('normal-image'+designId);
        let hoverImage = document.getElementById('hover-image'+designId);

        let normalImages = document.getElementsByClassName('normal-images');
        let hoverImages = document.getElementsByClassName('hover-images');

        let selectedDesign = document.getElementById('selected-design'+designId);

        let designDivs = document.getElementsByClassName('design-div');
        let selectedDesignDiv = document.getElementById('design-div-'+designId);

        if(selectedDesign.checked){

            for(let i = 0; i<previewImages.length;i++){

                previewImages[i].style.display = "none";

            }


            for(let i = 0; i<hoverImages.length;i++){

                hoverImages[i].style.display = "none";

            }


            for(let i = 0; i<normalImages.length;i++){

                normalImages[i].style.display = "block";

            }

            imageToPreview.style.display="block";
            normalImage.style.display="none";
            hoverImage.style.display="block";

            for(let i = 0; i<designDivs.length;i++){

                designDivs[i].classList.remove("bg-brown");
                designDivs[i].classList.remove("text-white");
                designDivs[i].classList.add("bg-light-yellow");


            }
            selectedDesignDiv.classList.remove("bg-light-yellow");
            selectedDesignDiv.classList.add('bg-brown');
            selectedDesignDiv.classList.add('text-white');

        }

    }

    function clickCheckbox(id){

        document.getElementById('selected-design'+id).click();
    }


    $(document).on('click','.part-item', function(){

        let partId = $(this).attr("data-id");
        let subItemId = $(this).attr("subitem-id");
        extendPart = partId;
        extendSubPart = subItemId;
        var inputElement = document.getElementById("extendPart");
        inputElement.value = extendPart;
        var inputElement = document.getElementById("extendSubPart");


        let parentElement = document.getElementById('partsection'+partId);

        if(!parentElement.classList.contains('border-brown')){

            $('#part-item-'+partId).html($(this).attr("data-name"));
            document.getElementById('part-item-collector-'+partId).value = subItemId;
            parentElement.classList.add('border-brown');
            inputElement.value = extendSubPart;
            document.getElementById('modal-close'+partId).click();

        }else{
            $('#part-item-'+partId).html('');
            parentElement.classList.remove('border-brown');
            inputElement.value = '';
            document.getElementById('part-item-collector-'+partId).value = '';
            document.getElementById('modal-close'+partId).click();

        }

     });


    $(document).on('click','.bed-rooms', function(){

            var bedRoomElements = document.querySelectorAll('.bed-rooms');
            bedRoomElements.forEach(function(element) {
                element.classList.remove('border-brown');
            });
            $(this).addClass('border-brown');

            bedRoomCount = $(this).attr('bed-room');
            var inputElement = document.getElementById("bedRoomCount");
            inputElement.value = bedRoomCount;

     });


    $(document).on('click','.designing-process', function(){
            var bedRoomElements = document.querySelectorAll('.designing-process');
            bedRoomElements.forEach(function(element) {
                element.classList.remove('border-brown');
            });
            $(this).addClass('border-brown');

            designingProcess = $(this).attr('time-period');
            var inputElement = document.getElementById("designingProcess");
            inputElement.value = designingProcess;
     });

    $(document).on('click','.other-service', function(){


            if($(this).hasClass('border-brown')){

                $(this).removeClass('border-brown');

            }else{

                $(this).addClass('border-brown');
            }

            //set selected values for the services

            var serviceElements = document.getElementsByClassName('other-service');

            let selectedServices = [];

            for(let i =0 ; i<serviceElements.length ; i++){

                if(serviceElements[i].classList.contains('border-brown')){

                selectedServices.push(serviceElements[i].getAttribute('other-service'));
                }

            }


            var inputElement = document.getElementById("otherService");

            inputElement.value = selectedServices;
     });

    $(document).on('click','.what-professionals', function(){


            if($(this).hasClass('border-brown')){

                $(this).removeClass('border-brown');

            }else{

                $(this).addClass('border-brown');

            }

            var professionalElements = document.getElementsByClassName('what-professionals');

            let selectedProfessionals = [];

            for(let i =0 ; i<professionalElements.length ; i++){

                if(professionalElements[i].classList.contains('border-brown')){

                    selectedProfessionals.push(professionalElements[i].getAttribute('professional'));

                }

            }

            var inputElement = document.getElementById("professional");

            inputElement.value = selectedProfessionals;

     });

    $(document).on('keypress','.service_you_need', function(){
        serviceYouNeed = document.getElementById("service_you_need").value;
        var inputElement = document.getElementById("serviceYouNeed");
        inputElement.value = serviceYouNeed;
    });

    function submitGetQuoteForm(){
        
        //   var response = grecaptcha.getResponse();
        //   if (response.length === 0) {
        //  // reCAPTCHA not verified, do not submit the form
        //     Swal.fire({
        //                     icon: 'error',
        //                     title: 'Hello',
        //                     text: "Please complete the reCAPTCHA challenge"
        //                 });
        //     //   alert("Please complete the reCAPTCHA challenge");
        //     return false;
        //     }
             let extendedParts = document.getElementsByClassName('part-item-collector');
             let partIds = [];
             
             for(let i = 0; i < extendedParts.length ; i++){

                if(extendedParts[i].value !== ''){

                    partIds.push(extendedParts[i].value);
                }
             }
     
             let propertyDesignId = document.getElementById("propertyDesignId").value;
             let extendParts = partIds;
             let extendSubPart = document.getElementById("extendSubPart").value;
             let bedRoomCount = document.getElementById("bedRoomCount").value;
             let designingProcess = document.getElementById("designingProcess").value;
             let otherService = document.getElementById("otherService").value;
             let professional = document.getElementById("professional").value;
             let serviceYouNeed = document.getElementById("serviceYouNeed").value;
             let first_name = document.getElementById("first_name").value;
            //  let last_name = document.getElementById("last_name").value;
            //  let projectAddress = document.getElementById("projectAddress").value;
             let postcode = document.getElementById("postcode").value;
             let email = document.getElementById("email").value;
             let contact = document.getElementById("contact").value;
             let hear_about_us = document.getElementById("hear_about_us").value;
             let message = document.getElementById("message").value;
             let checkState = $("#keep_me_update").is(":checked") ? "true" : "false";
             let type = document.getElementById('quotation_type').value;  // type is  quotation
             let termsCheckbox = document.getElementById('exampleCheck1');
             let dateElm = document.getElementById("booking-date");
             let date = null;
             let time = null;
             
             if(dateElm !== null){

                date = dateElm.value;
             }
            
             let timeElm = document.getElementById("booking-time");
             
             if(timeElm !== null){

                    time = timeElm.value;
                }

             let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

             removeClassFromDiv();


            $bookingQuotation = document.getElementById('quotation_type').value;

            if($bookingQuotation == 2){
                    if(first_name === ''){

                        Swal.fire({
                            icon: 'error',
                            title: 'Hello',
                            text: "Your name is required"
                        });

                        let getElement = document.getElementById('first_name');
                        getElement.classList.add('red-border');
                        window.scrollTo({
                            top: getElement.offsetTop-150,
                            behavior: 'smooth'
                            });

                        document.getElementById('first-name-error').innerHTML = "Your name is required";
                    }else if(contact === ''){

                        Swal.fire({
                            icon: 'error',
                            title: 'Hello',
                            text: "Your contact number is required"
                        });

                        let getElement = document.getElementById('contact');
                        getElement.classList.add('red-border');
                        window.scrollTo({
                            top: getElement.offsetTop-150,
                            behavior: 'smooth'
                        });
                        document.getElementById('contact-error').innerHTML = "Your contact number is required";

                    }else if (!termsCheckbox.checked){

                        Swal.fire({
                            icon: 'error',
                            title: 'Hello',
                            text: "Please accept the terms and conditions to proceed"
                        });

                    }else{

                        submitQuotationData();

                    }

            }else{


                         if(propertyDesignId === ''){

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Hello',
                                    text: "Please select the property type",

                                });


                         }else if(extendParts.length === 0){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Please select the extension parts",

                            });

                            // extend-section

                        }else if(designingProcess === ''){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Design process start duration is required"
                            });

                        }else if(first_name === ''){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Your name is required"
                            });

                            let getElement = document.getElementById('first_name');
                            getElement.classList.add('red-border');
                            window.scrollTo({
                                top: getElement.offsetTop-150,
                                behavior: 'smooth'
                                });

                            document.getElementById('first-name-error').innerHTML = "Your name is required";
                        }
                        // else if(last_name === ''){

                        //     Swal.fire({
                        //         icon: 'error',
                        //         title: 'Hello',
                        //         text: "Your last name is required"
                        //     });

                        //     let getElement = document.getElementById('last_name');
                        //     getElement.classList.add('red-border');
                        //     window.scrollTo({
                        //         top: getElement.offsetTop-150,
                        //         behavior: 'smooth'
                        //         });
                        //         document.getElementById('last-name-error').innerHTML = "Your last name is required";
                        // }
                        // else if(projectAddress === ''){

                        //     Swal.fire({
                        //         icon: 'error',
                        //         title: 'Hello',
                        //         text: "Project address is required"
                        //     });

                        //     let getElement = document.getElementById('projectAddress');
                        //     getElement.classList.add('red-border');
                        //     window.scrollTo({
                        //         top: getElement.offsetTop-150,
                        //         behavior: 'smooth'
                        //         });
                        //         document.getElementById('address-error').innerHTML = "Project address is required";
                        // }
                        else if(postcode === ''){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Postcode is required"
                            });

                            let getElement = document.getElementById('postcode');
                            getElement.classList.add('red-border');
                            window.scrollTo({
                                top: getElement.offsetTop-150,
                                behavior: 'smooth'
                            });
                            document.getElementById('postcode-error').innerHTML = "Postcode is required";
                        }else if(email === ''){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Your email is required"
                            });


                            let getElement = document.getElementById('email');
                            getElement.classList.add('red-border');
                            window.scrollTo({
                                top: getElement.offsetTop-150,
                                behavior: 'smooth'
                            });
                            document.getElementById('email-error').innerHTML = "Your email is required";
                        }else if(!pattern.test(email)){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Invalid email entered"
                            });


                            let getElement = document.getElementById('email');
                            getElement.classList.add('red-border');
                            window.scrollTo({
                                top: getElement.offsetTop-150,
                                behavior: 'smooth'
                            });
                            document.getElementById('email-error').innerHTML = "Invalid email entered";
                        }else if(contact === ''){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Your contact number is required"
                            });

                            let getElement = document.getElementById('contact');
                            getElement.classList.add('red-border');
                            window.scrollTo({
                                top: getElement.offsetTop-150,
                                behavior: 'smooth'
                            });
                            document.getElementById('contact-error').innerHTML = "Your contact number is required";

                        }else if (!termsCheckbox.checked){

                            Swal.fire({
                                icon: 'error',
                                title: 'Hello',
                                text: "Please accept the terms and conditions to proceed"
                            });

                        }
                        // else if(message === ''){

                        //     Swal.fire({
                        //         icon: 'error',
                        //         title: 'Hello',
                        //         text: "Your message is required"
                        //     });

                        //     let getElement = document.getElementById('message');
                        //     getElement.classList.add('red-border');
                        //     window.scrollTo({
                        //         top: getElement.offsetTop-150,
                        //         behavior: 'smooth'
                        //     });
                        //     document.getElementById('message-error').innerHTML = "Your message is required";

                        // }
                        else{

                            submitQuotationData();

                        }

            }

            function  submitQuotationData(){

                if(checkState == 'true'){
                        checkState = 1;
                }else{
                        checkState = 0;
                }

                Swal.fire({
                    icon: 'info',
                    title: 'Please wait....',
                    text: 'We are processing your details ..',
                    allowOutsideClick: false
                })
                Swal.showLoading();


                $.ajax({
                    type: "post",
                    url: "/quotation/form/submit",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        design_id: propertyDesignId,
                        extend_part_ids: extendParts,
                        extend_sub_part_id:extendSubPart ,
                        bed_rooms: bedRoomCount,
                        design_process_start: designingProcess,
                        other_service: otherService,
                        professionals: professional ,
                        expecting_service: serviceYouNeed ,
                        first_name: first_name,
                        // last_name: last_name,
                        // address: projectAddress,
                        post_code: postcode,
                        email: email,
                        contact: contact,
                        message: message,
                        hear_about_us: hear_about_us ,
                        keep_me_update: checkState,
                        date:date,
                        time:time,
                        type:type
                    },

                    success: function(res) {

                        Swal.close();
                        if (res.status) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                customClass: "success",
                                text: res.message
                            }).then((result) => {
                                // Check if the confirmation button (OK) is clicked
                                if (result.isConfirmed) {
                                    
                                    window.location.href = "/";
                                }
                            });


                        } else {

                            Swal.fire({
                                icon: 'info',
                                title: 'Invalid data',
                                customClass: "danger",
                                text: res.message
                            });
                        }


                    },
                    error: function(data) {

                        printErrorMsg(data.responseJSON.errors);
                        Swal.fire({
                                icon: 'info',
                                title: 'Something went wrong',
                                customClass: "danger",
                                text: "Please contact support"
                            });
                    }
                });
            }



    }

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });

                 // window.location.href = "/quotation#print-error-msg";
                 // Scroll a little bit after redirecting
                  setTimeout(function() {
                    window.scrollTo(0,0); // Adjust the value as needed
                }, 100); // Adjust the timeout duration as needed

    }

    //  remove border class function
    function removeClassFromDiv() {

        var sectionElement = document.getElementById('quotation-section');

        // Use querySelector to find the specific element with the class inside the section
        var specificElement = sectionElement.querySelector('.red-border');

        // Check if the element is found
        if (specificElement) {
            // Remove the specific class from the element
            specificElement.classList.remove('red-border');

        }

        let errorElements = document.getElementsByClassName('form-errors');

        for(let i=0 ; i<errorElements.length ; i++){

            errorElements[i].innerHTML = '';
        }
    }

    function checkBoxValue() {

        var checkBox = document.getElementById("exampleCheck1");
        var quoteButtonContainer = document.getElementById("formSubmitBtn");


        if (checkBox.checked) {

            quoteButtonContainer.classList.remove("d-none");
        } else {
        
            quoteButtonContainer.classList.add("d-none");
        }
    }

  </script>
  <!-- End quotation form script-->
</body>

</html>
