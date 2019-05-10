<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Pharos Elenco - Administrativo</title>

        <meta name="description" content="Pharos Elenco - Administrativo">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">
    </head>
    <body>
        <div id="app">
        
            <div id="page-container">

                <!-- Main Container -->
                <main id="main-container">
                    @yield('content')
                </main>
                <!-- END Main Container -->

                <!-- Footer -->
                <footer id="page-footer" class="bg-body-light">
                    <div class="content py-3">
                        <div class="row font-size-sm">
                            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                                Criado com <i class="fa fa-heart text-danger"></i> por <a class="font-w600" href="https://brunobandeira.me" target="_blank">brunobandeira</a>
                            </div>
                            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                                <a class="font-w600" href="http://pharoselenco.com.br" target="_blank">Pharos Elenco</a> &copy; <span data-toggle="year-copy">2018</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- Dashmix Core JS -->
            <script src="{{ mix('js/dashmix.app.js') }}"></script>

            <!-- Laravel Scaffolding JS -->
            <script src="{{ mix('js/laravel.app.js') }}"></script>
        </div>
    </body>
</html>
