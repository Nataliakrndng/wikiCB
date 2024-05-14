<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Core-Backend') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
        <!-- Ionic Icon Css -->
        <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
        <!-- animate.css -->
        <link rel="stylesheet" href="plugins/animate-css/animate.css">
        <!-- Magnify Popup -->
        <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="plugins/slick/slick.css">

        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <header class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg p-0">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'Core-Backend') }}
                            </a>

                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ion-android-menu"></span>
                            </button>

                            <div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item @@service"><a class="nav-link" href="{{ url('/articles') }}">Article</a></li>
                                    <li class="nav-item @@contact"><a class="nav-link" href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header><!-- header close -->

        @yield('content')

            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 3.1 -->
            <script src="plugins/bootstrap/bootstrap.min.js"></script>
            <!-- slick Carousel -->
            <script src="plugins/slick/slick.min.js"></script>
            <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
            <!-- filter -->
            <script src="plugins/shuffle/shuffle.min.js"></script>
            <script src="plugins/SyoTimer/jquery.syotimer.min.js"></script>
            <!-- Google Map -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
            <script src="plugins/google-map/map.js"></script>

            <script>
                $(document).ready(function(){
                    $('.dropdown-toggle').dropdown();
                });
            </script>


            <script src="js/app.js"></script>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; Core-Backend | All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
