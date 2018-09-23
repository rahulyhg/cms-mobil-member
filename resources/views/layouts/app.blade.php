<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/footer.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app" style="overflow-x: hidden;">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('inset/logo.png') }}" class="img-fluid" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link d-md-none d-lg-none d-xl-none" href="#">Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-md-none d-lg-none d-xl-none" href="#">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-md-none d-lg-none d-xl-none" href="#">Artikel</a>
                        </li>
                    </ul>

                    <div class="row justify-content-center">
                        <ul class="nav nav-tabs mx-auto" style="margin-bottom: -20px;">
                            <li class="nav-item">
                                <a class="nav-link nav-item-menu d-none d-sm-none d-md-block d-lg-block d-xl-block" href="#" style="padding-left: 50px;padding-right: 50px;">Mobil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-item-menu d-none d-sm-none d-md-block d-lg-block d-xl-block" href="#" style="padding-left: 50px;padding-right: 50px;">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-item-menu d-none d-sm-none d-md-block d-lg-block d-xl-block" href="#" style="padding-left: 50px;padding-right: 50px;">Artikel</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest                        
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                        </li>                        
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('slider')
        @yield('content')
        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>
    </div>
</body>
@yield('foot-content')
</html>
