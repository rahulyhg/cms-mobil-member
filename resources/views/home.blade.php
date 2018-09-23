@extends('layouts.app')

@section('slider')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $sliders = App\Slider::all();
                $i=1; ?>
                @foreach($sliders as $slider)
                <div class="carousel-item {{ $i == 1 ? 'active' : null }}">
                    <img class="d-block w-100 img-fluid" src="{{ url('https://admin.mobilngetop.com/'.$slider->picture) }}">
                </div>
                <?php $i++; ?>        
                @endforeach        
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 nav-item-menu" style="-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04);box-shadow:0 2px 4px rgba(0,0,0,.04);">
        <form>
            @csrf
            <div class="row" style="padding: 10px;">
                <div class="col-md-4">
                    <select class="form-control" name="brand" id="brand" style="width: 100%;">
                        <option disabled selected> Pilih Merk </option>
                        <?php $brands = App\Brand::orderBy('name', 'asc')->get(); ?>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="model" style="width: 100%;">
                        <option disabled selected> Pilih Model </option>
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
                <?php $cars = App\Car::orderBy('tdp', 'asc')->limit(5)->get(); ?>
                @foreach($cars as $car)
                <div class="col d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body text-center">
                            <img src="{{ url('https://admin.mobilngetop.com/'.$car->picture) }}" class="img-fluid">                        
                            <h5 class="text-center"><b>{{ $car->name }}</b></h5>
                            <h4 class="text-center text-danger"><b>Rp. {{ number_format($car->tdp,0,",",".") }}</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 d-md-none d-lg-none d-xl-none d-sm-block">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body text-center">
                            <img src="{{ url('https://admin.mobilngetop.com/'.$car->picture) }}" class="img-fluid">                        
                            <h5 class="text-center"><b>{{ $car->name }}hp</b></h5>
                            <h4 class="text-center text-danger"><b>Rp. {{ number_format($car->tdp,0,",",".") }}</b></h4>
                        </div>
                    </div>
                </div>                
                @endforeach                
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
                <?php $testimonis = App\Testimonial::all(); ?>
                @foreach($testimonis as $testimoni)
                <div class="col-md-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('https://admin.mobilngetop.com/'.$testimoni->picture) }}" class="img-fluid">
                            </div>
                            <h5><b>{{ $testimoni->name }}</b></h5>
                            <h5><p><b>"{{ $testimoni->content }}"</b></p></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 d-md-none d-lg-none d-xl-none d-sm-block">
                    <div class="card card-item border-danger" style="background-color: transparent;">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('https://admin.mobilngetop.com/'.$testimoni->picture) }}" class="img-fluid">
                            </div>
                            <h5><b>{{ $testimoni->name }}</b></h5>
                            <h5><p><b>"{{ $testimoni->content }}"</b></p></h5>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <?php $articles = App\Article::orderBy('updated_at', 'desc')->get(); ?>
                @foreach($articles as $article)
                <div class="col-md-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$article->picture) }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <p class="card-text"><small style="color: #006db8;">ditulis oleh {{ $article->user->name }} pukul {{ date("H:i", strtotime($article->created_at)) }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 d-md-none d-lg-none d-xl-none d-sm-block">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$article->picture) }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <p class="card-text"><small style="color: #006db8;">ditulis oleh {{ $article->user->name }} pukul {{ date("H:i", strtotime($article->created_at)) }}</small></p>
                        </div>
                    </div>
                </div>
                @endforeach               
            </div>
        </div>        
    </div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">
    $(document).ready(function(){
        $('#brand').on('click', function(){
            var brand_id = $(this).val();
            var _token  = $('input[name="_token"]').val();
            if (brand_id == '' || brand_id == null)
            {
                $('#model').prop('disabled', true);
            }
            else
            {
                $('#model').prop('disabled', false);
                $.ajax({
                    url:"{{ route('select') }}",
                    type: "POST",
                    data: {'brand_id' : brand_id, '_token' : _token},
                    dataType: 'json',
                    success: function(data){
                        $('#model').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                        $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                        console.log('jqXHR:');
                        console.log(jqXHR);
                        console.log('textStatus:');
                        console.log(textStatus);
                        console.log('errorThrown:');
                        console.log(errorThrown);
                    },
                });
            }
        });
        $('#brand').click();
    });
</script>
@endsection