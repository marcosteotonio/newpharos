<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Pharos Elencos</title>
        <meta name="description" content="Agenciamentos de Atores/Elencos">
        <meta name="author" content="edrobeda">
        <!-- <meta name="robots" content="noindex, nofollow"> -->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:title" content="@yield('title')" />
        <meta property="og:type" content="@yield('type')" />
        <meta property="og:url" content="@yield('url')" />
        <meta property="og:image" content="@yield('foto')" />

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ url( env('APP_PREFIX') . '/images/logo.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ url( env('APP_PREFIX') . '/images/logo.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url(env('APP_PREFIX') . '/images/logo.png') }}">

        <!-- JQUERY -->
        <script src="{{ asset( env('APP_PREFIX') . '/js/jquery.js' ) }}" async></script>

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" href="{{ url( env('APP_PREFIX') . '/css/dashmix.css') }}">
        <link rel="stylesheet" href="{{ url( env('APP_PREFIX') . '/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url( env('APP_PREFIX') . '/js/plugins/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}">
        <style>
            @font-face {
                font-family: ProximaNova;
                font-style: normal;
                font-weight: 400;
                src: url("<?php echo url( env('APP_PREFIX') . '/fonts/proxima_ssv/ProximaNova-Regular.otf' ); ?>") format("opentype");
            }

            @font-face {
                font-family: ProximaNova;
                font-weight: 600;
                src: url("<?php echo url( env('APP_PREFIX') . '/fonts/proxima_ssv/ProximaNova-Bold.otf' ); ?>") format("opentype");
            }

            @font-face {
                font-family: ProximaNova;
                font-weight: 800;
                src: url("<?php echo url( env('APP_PREFIX') . '/fonts/proxima_ssv/ProximaNova-Black.otf' ); ?>") format("opentype");
            }

            @font-face {
                font-family: ProximaNova;
                font-weight: 200;
                src: url("<?php echo url( env('APP_PREFIX') . '/fonts/proxima_ssv/ProximaNova-thin.otf' ); ?>") format("opentype");
            }
        </style>

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" href="{{ mix('/css/themes/xwork.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>

    <body style="font-family: 'ProximaNova', serif;">
            <div class="showUP" style="
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: 1fr;
                background-color: white;
                z-index: 100;
                width: 100%;
                height: 100%;
                position: fixed;
                align-items: center;">
                <style>
                @keyframe pulse{
                    0%{ transform: scale(1)};
                    50%{ transform: scale(1.5);}
                    100%{ transform: scale(1);}} 
                }
                .animated{
                    animation-iteration-count: infinite;
                    animation-duration: 1s;
                    animation-timing-function: easy-in-out;
                }
                .pulse-infinite
                {
                    animation-name: pulse;
                }
                </style>
                <img class="animated pulse-infinite"src="<?php echo url( '/images/logo.png' ); ?>" alt="PharosElenco" style="margin-top: 10px; height: 145px;position: relative; left: calc(50% - 93px);">
            </div>
        @include('includes.mainmenu')


        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container" class="main-background">
                    @yield('content')
            </main>

            <!-- FOOTER -->
            @include('includes.mainfooter')
            
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Laravel Original JS -->
        
        <script src="{{ url( env('APP_PREFIX') . '/js/laravel.app.js') }}"></script>

        <!-- Dashmix Core JS -->
        <script src="{{ url(env('APP_PREFIX') . '/js/dashmix.app.js') }}"></script>

        <script type="text/javascript" src="{{ url( env('APP_PREFIX') . '/js/plugins/OwlCarousel2/dist/owl.carousel.min.js' ) }}"></script>

        @yield('js_after')
        <script>
            window.onload = function(){
                setTimeout( function(){
                    document.body.style.overflowY = 'auto'
                    $('.showUP').hide();
                }, 1000);
            }
        </script>

        <script type="text/javascript" src="{{ asset( '/js/plugins/bootstrap-notify-master/bootstrap-notify.min.js' ) }}"></script>
        <script>
            $.notifyDefaults({
                placement: {
                    from: "bottom"
                },
                animate:{
                    enter: "animated fadeInUp",
                    exit: "animated fadeOutDown"
                }
            });
        </script>
        @if(Session::has('error'))
            <script type="text/javascript">
                $.notify({
                    message: "{{ Session::get('error') }}" 
                },{type: 'danger' });
            </script>
        @elseif(Session::has('success'))
            <script type="text/javascript">
                $.notify({
                    message: "{{ Session::get('success') }}" 
                },{type: 'success' });
            </script>
        @elseif(Session::has('warning'))
            < <script type="text/javascript">
                $.notify({
                    message: "{{ Session::get('warning') }}" 
                },{type: 'warning' });
            </script>
        @elseif(Session::has('info'))
            <script type="text/javascript">
                $.notify({
                    message: "{{ Session::get('info') }}" 
                },{type: 'info' });
            </script>
        @endif 
    </body>
</html>
