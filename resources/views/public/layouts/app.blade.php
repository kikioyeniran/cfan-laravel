<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Creative Fingers Art Nexus</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">
    <link href="{{  asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}" />
    <link rel="stylesheet" href="https://cdn.rawgit.com/jackmoore/colorbox/master/example1/colorbox.css" />
</head>
<body>
    <div class="site-wrap">
        @include('public.inc.navbar')
            @include('admin.inc.messages')
            @yield('content')
        @include('public.inc.footer')
    </div>


    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.js')}}"></script>
    {{-- <script src="{{ asset('js/newsletter.js')}}"></script> --}}
    <script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
    <script>
        $(".clear-cookie").on("click", function() {
        Cookies.remove('colorboxShown');
            $(this).replaceWith("<p><em>Cookie cleared. Re-run demo</em></p>");
        });

        $(".order-cheezburger").on("click", function() {
        $.colorbox.close();
        });

        function onPopupOpen() {
        $("#modal-content").show();
        $("#yurEmail").focus();
        }

        function onPopupClose() {
        $("#modal-content").hide();
        Cookies.set('colorboxShown', 'yes', {
            expires: 1
        });
        $(".clear-cookie").fadeIn();
        lastFocus.focus();
        }

        function displayPopup() {
        $.colorbox({
            inline: true,
            href: "#modal-content",
            className: "cta",
            width: 600,
            height: 350,
            onComplete: onPopupOpen,
            onClosed: onPopupClose
        });
        }

        var lastFocus;
        var popupShown = Cookies.get('colorboxShown');

        if (popupShown) {
        console.log("Cookie found. No action necessary");
        $(".clear-cookie").show();
        } else {
        console.log("No cookie found. Opening popup in 3 seconds");
        $(".clear-cookie").hide();
        setTimeout(function() {
            lastFocus = document.activeElement;
            displayPopup();
        }, 3000);
        }
    </script>
    {{-- <script src="{{ asset('js/newsletterpopup.js')}}"></script> --}}

    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('js/swiper.min.js')}}"></script>
    <script src="{{ asset('js/aos.js')}}"></script>

    <script src="{{ asset('js/picturefill.min.js')}}"></script>
    <script src="{{ asset('js/lightgallery-all.min.js')}}"></script>
    <script src="{{ asset('js/jquery.mousewheel.min.js')}}"></script>

    <script src="{{ asset('js/main.js')}}"></script>

    <script>
      $(document).ready(function(){
        $('#lightgallery').lightGallery();
      });
    </script>
</body>

</html>
