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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('head-content')
    <!-- Fonts -->
    <style type="text/css">
    @font-face {
        font-family: Gotham-Thin;
        src: url('{{ asset('font/Gotham-Thin.otf') }}') format('truetype');
    }
    @font-face {
        font-family: Gotham-Light;
        src: url('{{ asset('font/Gotham-Light.otf') }}') format('truetype');
    }
    @font-face {
        font-family: Gotham-Medium;
        src: url('{{ asset('font/Gotham-Medium.otf') }}') format('truetype');
    }
    html {
        font-family: "Gotham-Thin", sans-serif;
    }
    p {
        font-family: "Gotham-Light", sans-serif;
    }
    h1,h2,h3,h4,h5,h6 {
        font-family: "Gotham-Medium", sans-serif;
    }
</style>

<!-- <link href="{{ asset('css/footer.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app" style="overflow-x: hidden;">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                    <img src="{{ asset('inset/logo.png') }}" class="img-fluid" style="width: 200px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->                    
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('car') }}" class="nav-link d-md-none d-lg-none d-xl-none" style="cursor: pointer;">Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-md-none d-lg-none d-xl-none" style="cursor: pointer;">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('article') }}" class="nav-link d-md-none d-lg-none d-xl-none" style="cursor: pointer;">Artikel</a>
                        </li>
                    </ul>

                    <div class="row justify-content-center  d-none d-sm-none d-md-block d-lg-block d-xl-block" style="margin-bottom: -54px;margin-right: 80px;">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('car') }}" class="nav-link nav-item-menu" style="cursor: pointer;color: white;padding-left: 50px;padding-right: 50px;">Mobil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-item-menu" style="cursor: pointer;color: white;padding-left: 50px;padding-right: 50px;">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('article') }}" class="nav-link nav-item-menu" style="cursor: pointer;color: white;padding-left: 50px;padding-right: 50px;">Artikel</a>
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
                            <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a> -->
                            <a href="{{ route('account') }}" class="btn btn-primary">{{ Auth::user()->name }}</a>

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
        <div style="background-color: white;">
            @yield('slider')
            <div class="py-4">
                @yield('content')
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg-hp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="border-radius: 0px;">
                    <div class="float-right" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="row justify-content-center">                        
                    <center>                        
                        <h1>Data Pribadi</h1>                            
                        <form method="POST" action="{{ route('form-data') }}">
                            @csrf
                            <div class="form-group" style="width: 75%;">
                                <input type="text" name="name" class="text-center  form-control is-invalid" placeholder="nama" required autofocus>
                            </div>
                            <div class="form-group" style="width: 75%;">
                                <input type="email" name="email" class="text-center  form-control is-invalid" placeholder="email" required>
                            </div>
                            <div class="form-group" style="width: 75%;">
                                <input type="number" name="phone_number" class="text-center  form-control is-invalid" placeholder="nomor handphone" required>
                            </div>
                            <div class="form-group" style="width: 75%;">
                                <input type="text" name="voucher_code" class="text-center  form-control is-invalid" placeholder="kode voucher*">
                                <div class="">
                                    <small class="float-left text-danger">*apabila ada</small>
                                </div>
                            </div>
                            <br>
                            <div class="form-group" style="width: 75%;">
                                <div class="">
                                    <h6 class="text-center" style="word-break: all;">isi data anda dan kami akan memberikan penawaran terbaik!</h6>
                                </div>
                            </div>
                            <div class="form-group" style="width: 75%;">
                                <button class="btn btn-primary" style="border-radius: 0px;">hubungi saya</button>
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="padding: 17px!important;">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 75%;max-height: 75%;">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                        <img src="{{ asset('inset/image_data_diri.png') }}" class="img-fluid">
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <br>                            
                        <center>
                            <h1>Data Pribadi</h1>
                            <br><br>
                            <form method="POST" action="{{ route('form-data') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="text-center col-md-6 form-control is-invalid" placeholder="nama" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="text-center col-md-6 form-control is-invalid" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="phone_number" class="text-center col-md-6 form-control is-invalid" placeholder="nomor handphone" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="voucher_code" class="text-center col-md-6 form-control is-invalid" placeholder="kode voucher*">
                                    <div class="col-md-6">
                                        <small class="float-left text-danger">*apabila ada</small>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <h6 class="text-center" style="word-break: all;">isi data anda dan kami akan memberikan penawaran terbaik!</h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" style="border-radius: 0px;">hubungi saya</button>
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="background-color: white;padding: 50px;-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04)!important;box-shadow:0 2px 4px black!important;">
        <div class="row justify-content-center">
            <div class="form-group" style="display: inline;">
                <div class="row justify-content-center">
                    <center>
                        <a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href="{{ route('faq') }}"><b>FAQ</b></a>
                    </center>
                    <center>                            
                        <a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href="{{ route('privacyPolicy') }}"><b>Ketentuan Pribadi</b></a>
                    </center>
                    <center>
                        <a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href="{{ route('aboutUs') }}"><b>Tentang Kami</b></a>
                    </center>
                </div>
            </div>
        </div>
        <?php
        $facebook = App\Social::find(1)->value('link');
        $twitter = App\Social::find(2)->value('link');
        $instagram = App\Social::find(3)->value('link');
        $youtube = App\Social::find(4)->value('link');
        ?>
        <div class="row justify-content-center">
            <a class="col-xs-3" href="{{ url($facebook) }}" target="_blank" style="padding: 10px;">
                <img src="{{ asset('inset/facebook.png') }}" class="img-fluid" style="max-width: 50px;">
            </a>
            <a class="col-xs-3" href="{{ url($twitter) }}" target="_blank" style="padding: 10px;">
                <img src="{{ asset('inset/twitter.png') }}" class="img-fluid" style="max-width: 50px;">
            </a>
            <a class="col-xs-3" href="{{ url($instagram) }}" target="_blank" style="padding: 10px;">
                <img src="{{ asset('inset/instagram.png') }}" class="img-fluid" style="max-width: 50px;">
            </a>
            <a class="col-xs-3" href="{{ url($youtube) }}" target="_blank" style="padding: 10px;">
                <img src="{{ asset('inset/youtube.png') }}" class="img-fluid" style="max-width: 50px;">
            </a>
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
            <small><b>
                @if(date('Y')==2018)
                @else
                2018 - 
                @endif
            {{ date('Y') }} mobilngetop.com All Rights Reserved</b></small>
        </div>
    </footer>
</div>
</body>
@yield('foot-content')
</html>
