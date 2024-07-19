<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Core-Backend') }}</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/animate-css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <style>
            .navbar-nav {
                margin-right: 0;
            }
            .navbar-nav .nav-item {
                margin-right: 15px;
            }
            .navbar-nav .nav-item:last-child {
                margin-right: 0;
            }

            .form-inline {
                margin-right: -60px;
                margin-left: 25px;
            }

            .btn-custom {
                color: #655E7A;
                border-color: #655E7A;
            }
            .btn-custom:hover {
                background-color: #524d64;
                border-color: #524d64;
                color: white;
            }
        </style>
    </head>
    <body>
        <header class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg p-0">
                            <a class="navbar-brand" style="color: #333333; margin-left: -15px;" href="{{ url('/') }}">
                                {{ config('app.name', 'Core-Backend') }}
                            </a>

                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ion-android-menu"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarsExample09">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item @@service">
                                        <a class="nav-link" href="{{ url('/articles') }}">Article</a>
                                    </li>
                                    <li class="nav-item @@contact">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                </ul>
                                <!-- Search Bar -->
                                <form class="navbar-nav form-inline" action="{{ route('search') }}" method="POST">
                                    @csrf
                                    <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-custom my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
        <script src="{{ asset('plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>
        <script src="{{ asset('plugins/SyoTimer/jquery.syotimer.min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $('.dropdown-toggle').dropdown();
            });
        </script>

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
