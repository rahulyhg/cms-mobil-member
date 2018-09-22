@extends('layouts.app')

@section('slider')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php $sliders = App\Slider::all(); ?>
        @foreach($sliders as $slider)
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('http://admin.mobilngetop.com/'.$slider->picture) }}">            
        </div>
        @endforeach        
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 nav-item-menu" style="-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04);box-shadow:0 2px 4px rgba(0,0,0,.04);">
        <form>
            <div class="row" style="padding: 10px;">
                <div class="col-md-4">
                    <select class="form-control" style="width: 100%;">
                        <option>1</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" style="width: 100%;">
                        <option>1</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" style="width: 100%;">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12" style="background-color: #ebe9ea;padding: 50px;">
        <div class="form-group">
            <center><h1>Mobil Pilihan</h1></center>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">                        
                            <h5 class="text-center"><b>All New Fortuner</b></h5>
                            <h4 class="text-center"><b>RP100000</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5 class="text-center"><b>All New Fortuner</b></h5>
                            <h4 class="text-center"><b>RP100000</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5 class="text-center"><b>All New Fortuner</b></h5>
                            <h4 class="text-center"><b>RP100000</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5 class="text-center"><b>All New Fortuner</b></h5>
                            <h4 class="text-center"><b>RP100000</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5 class="text-center"><b>All New Fortuner</b></h5>
                            <h4 class="text-center"><b>RP100000</b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">
                <button class="btn btn-primary">Lihat Semua</button>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12" style="background-color: white;padding: 50px;">
        <div class="form-group">
            <center><h1>Testimoni Oleh Customer</h1></center>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5><b>David</b></h5>
                            <h5><p><b>"Terimakasih tim Mobilngetop yang sangat ramah sudah membantu menemukan mobil sesuai budget saya dan juga selalu available. Recommend Banget!!!!"</b></p></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <img src="{{ asset('inset/AllNewFortuner-white.png') }}" class="img-fluid">
                            <h5><b>David</b></h5>
                            <h5><p><b>"Terimakasih tim Mobilngetop yang sangat ramah sudah membantu menemukan mobil sesuai budget saya dan juga selalu available. Recommend Banget!!!!"</b></p></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12" style="background-color: #ebe9ea;padding: 50px;">
        <div class="form-group">
            <center><h1>Berita Otomotif</h1></center>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ asset('inset/AllNewFortuner-white.png') }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>Mobil Langkanya Hilang Pria ini Rela Buang Uang Rp 4,1 Milyar!</b></h5>
                            <p class="card-text">Bagi siapapun yang dapat menemukan keberadaan Mercedez-Benz 300SL Gullwing '1955 ini akan mendapatkan hadiah berupa uang tunai sebesar USD284 ribu atau setara dengan 4,1 Milyaran, Uang tersebut  dijanjikan oleh pemilik yang kehilangan sedan langka tersebut.</p>
                            <p class="card-text"><small style="color: #006db8;">ditulis oleh Nia pukul 18:27</small></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ asset('inset/AllNewFortuner-white.png') }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>Mobil Langkanya Hilang Pria ini Rela Buang Uang Rp 4,1 Milyar!</b></h5>
                            <p class="card-text">Bagi siapapun yang dapat menemukan keberadaan Mercedez-Benz 300SL Gullwing '1955 ini akan mendapatkan hadiah berupa uang tunai sebesar USD284 ribu atau setara dengan 4,1 Milyaran, Uang tersebut  dijanjikan oleh pemilik yang kehilangan sedan langka tersebut.</p>
                            <p class="card-text"><small style="color: #006db8;">ditulis oleh Nia pukul 18:27</small></p>
                        </div>
                    </div>              
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ asset('inset/AllNewFortuner-white.png') }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>Mobil Langkanya Hilang Pria ini Rela Buang Uang Rp 4,1 Milyar!</b></h5>
                            <p class="card-text">Bagi siapapun yang dapat menemukan keberadaan Mercedez-Benz 300SL Gullwing '1955 ini akan mendapatkan hadiah berupa uang tunai sebesar USD284 ribu atau setara dengan 4,1 Milyaran, Uang tersebut  dijanjikan oleh pemilik yang kehilangan sedan langka tersebut.</p>
                            <p class="card-text"><small style="color: #006db8;">ditulis oleh Nia pukul 18:27</small></p>
                        </div>
                    </div>              
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
