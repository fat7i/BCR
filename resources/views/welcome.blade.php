<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('t1/img/favicon.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('t1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('t1/css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f2f310153a68b98"></script>
</head>
<body>

    <!-- slider -->
    <div class="slider-slick">
        <div class="slider-entry">
            <img src="{{ url('/') }}/t1/img/logo.png" alt=""  width="100%">
        </div>

    </div>
    <!-- end slider -->

    <!-- offers -->
    <div class="offers app-section">
        <div class="container">
            <div class="offers-content">
                <div class="row">
                    <div class="col s4">
                        <div class="icon icon1">
                            <i class="fa fa-barcode"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Scan</h5>
                            <p>Scan product <b>barcode</b>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offers-content">
                <div class="row">
                    <div class="col s4">
                        <div class="icon icon2">
                            <i class="fa fa-info"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Know</h5>
                            <p>Know more info, buyer <b>reviews</b> and where is the <b>best price</b>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offers-content">
                <div class="row row-margin">
                    <div class="col s4">
                        <div class="icon icon3">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Share</h5>
                            <p>Share your <b>experience</b> with the others</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end offers -->

    <!-- note -->
    <div class="app-section">
        <div class="row">
            <div class="col s10 offset-s1">
                <img width="100%" src="{{ url('/') }}/t1/img/get_appstore.png" >
            </div>
        </div>
        <div class="row">
            <div class="col s10 offset-s1">
                <img width="100%" src="{{ url('/') }}/t1/img/get_googleplay.png" >
            </div>
        </div>
    </div>

    <div class="app-section">
        <div class="row">
            <div class="col s10 offset-s1 center-align">
                <h2>Tell a friend!</h2>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f2f310153a68b98"></script>
                <div class="addthis_inline_share_toolbox center-align"></div>
            </div>
        </div>
    </div>
    <!-- end note -->

    <!-- footer -->
    <footer>
        <div class="container">
            <h6>Find & follow us</h6>
            <ul class="icon-social">
                <li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
                <li class="google"><a href=""><i class="fa fa-google"></i></a></li>
                <li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
                <li class="rss"><a href=""><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
        <div class="ft-bottom">
            <span>Copyright © 2017 All Rights Reserved </span>
        </div>
    </footer>
    <!-- end footer -->





    <!-- Scripts -->
    <script src="{{ asset('t1/js/jquery.min.js') }}"></script>
    <script src="{{ asset('t1/js/materialize.min.js') }}"></script>
    <script src="{{ asset('t1/js/slick.min.js') }}"></script>
    <script src="{{ asset('t1/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('t1/js/custom.js') }}"></script>

    {{--
    <script src="{{ asset('t1/js/jquery.filterizr.min.js') }}"></script>
<script src="{{ asset('t1/js/lightbox.min.js') }}"></script>
<script src="{{ asset('t1/js/custom-portfolio.js') }}"></script>

--}}

    @yield('js')

    @if (session('toast'))
        <script>
            $(function () {
                Materialize.toast("{{ session('toast') }}", 4000);
            });
        </script>
    @endif

</body>
</html>