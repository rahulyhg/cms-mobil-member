<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $keyword = App\SearchEngineOptimization::find(2); ?>

    <!-- Meta SEO -->    
    <meta name="description" content="Mobil Ngetop">
    <meta name="keywords" content="{{ $keyword->content }}">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@mobilngetop">
    <meta property="twitter:creator" content="@mobilngetop">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:title" content="Mobil Ngetop">
    <meta property="og:url" content="https://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php $title = App\SearchEngineOptimization::find(1); ?>
    <title>{{ $title->content, config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('head-content')
    
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
        <footer style="background-color: white;padding: 50px;">
            <div class="row justify-content-center">
                <div class="form-group" style="display: inline;">
                    <a style="padding:10px;color: black;text-decoration: none;" href=""><b>FAQ</b></a>
                    <a style="padding:10px;color: black;text-decoration: none;" href=""><b>Ketentuan Pribadi</b></a>
                    <a style="padding:10px;color: black;text-decoration: none;" href=""><b>Tentang Kami</b></a>
                </div>
            </div>
            <?php
            $facebook = App\Social::find(1)->value('link');
            $twitter = App\Social::find(2)->value('link');
            $instagram = App\Social::find(3)->value('link');
            $whatsapp = App\Social::find(4)->value('link');
            ?>
            <div class="row justify-content-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url($facebook) }}" target="_blank">
                    <div style="border: 1px solid #e3342f;border-radius:20%;padding-left: 1px;padding-bottom: 1px;">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-square fa-stack-2x text-danger"></i>
                            <i class="fa fa-facebook fa-stack-1x" style="color: white;"></i>
                        </span>
                    </div>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url($twitter) }}" target="_blank">
                    <div style="border: 1px solid #e3342f;border-radius:20%;padding-left: 1px;padding-bottom: 1px;">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-square fa-stack-2x text-danger"></i>
                            <i class="fa fa-twitter fa-stack-1x" style="color: white;"></i>
                        </span>
                    </div>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url($instagram) }}" target="_blank">
                    <div style="border: 1px solid #e3342f;border-radius:20%;padding-left: 1px;padding-bottom: 1px;">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-square fa-stack-2x text-danger"></i>
                            <i class="fa fa-instagram fa-stack-1x" style="color: white;"></i>
                        </span>
                    </div>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ url($whatsapp) }}" target="_blank">
                    <div style="border: 1px solid #e3342f;border-radius:20%;padding-left: 1px;padding-bottom: 1px;padding-right: 1px;">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-square fa-stack-2x text-danger"></i>
                            <i class="fa fa-whatsapp fa-stack-1x" style="color: white;"></i>
                        </span>
                    </div>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div><br>
            <div class="row justify-content-center">
                <b>Jalan Radin Inten II No. 62</b>
            </div>
            <div class="row justify-content-center">
                <b>Duren Sawit, Jakarta Timur 13440</b>
            </div>
            <br>
            <div class="row justify-content-center">
                <img src="{{ asset('inset/logo.png') }}" style="max-height: 50px;">
            </div>
            <div class="row justify-content-center">
                <small><b>2018 mobilngetop.com All Rights Reserved</b></small>
            </div>
        </footer>
    </div>
</body>
@yield('foot-content')
</html>
