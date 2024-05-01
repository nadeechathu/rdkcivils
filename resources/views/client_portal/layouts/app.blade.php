<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   
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
    <link href="{{ asset('css/client_portal.css') }}" rel="stylesheet">

    <link href="{{ asset('css/rdk-styles-old.css') }}" rel="stylesheet">
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
    </style>

</head>

<body style="background-image: url('{{ asset('images/clientPortalBg.jpg') }}'); background-size: inherit; background-repeat:no-repeat;">


    @include('client_portal.layouts.headers.header')
    <!-- Page Content -->
    <main id="main vh-100">


        @yield('content')

        <!-- / Content-->

    </main>

      <!-- Your website content goes here -->

    <!-- Cookie policy section -->


    @include('client_portal.layouts.footers.footer')

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
      </div>
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


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64fec60ab1aaa13b7a762510/1ha1jb6mf';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@yield('scripts')
</body>

</html>
