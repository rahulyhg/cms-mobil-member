@extends('layouts.app')

@section('head-content')
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
<style type="text/css">
.half-c {
    background-image: linear-gradient(bottom, #ebe9ea 50%, transparent 50%);
    background-image: -o-linear-gradient(bottom, #ebe9ea 50%, transparent 50%);
    background-image: -moz-linear-gradient(bottom, #ebe9ea 50%, transparent 50%);
    background-image: -webkit-linear-gradient(bottom, #ebe9ea 50%, transparent 50%);
    background-image: -ms-linear-gradient(bottom, #ebe9ea 50%, transparent 50%);
}
</style>
@endsection

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
<div class="d-none d-sm-none d-md-block d-lg-block d-xl-block" id="half">
    <div class="row justify-content-center half-c">
        <div class="col-md-6 nav-item-menu" style="-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04);box-shadow:0 2px 4px rgba(0,0,0,.04);">
            <form>
                @csrf
                <div class="row" style="padding: 10px;">
                    <div class="col-md-4">
                        <select class="form-control" name="brand" id="brand" style="width: 100%;" required>
                            <option disabled selected> Pilih Merk </option>
                            <?php $brands = App\Brand::orderBy('name', 'asc')->get(); ?>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="model" id="model" style="width: 100%;" required>
                            <option disabled selected> Pilih Model </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        @auth
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Cari</button>
                        @endauth
                        @guest
                        <button type="button" class="btn btn-primary d-none d-sm-none d-md-block d-lg-block d-xl-block" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer;color: white;width: 100%;">Cari</button>
                        <button type="button" class="btn btn-primary d-sm-block d-md-none d-lg-none d-xl-none" data-toggle="modal" data-target=".bd-example-modal-lg-hp" style="cursor: pointer;color: white;width: 100%;">Cari</button>
                        @endguest
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row justify-content-center half-c d-block d-sm-block d-md-none d-lg-none d-xl-none">
    <div class="col-md-6 nav-item-menu" style="-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04);box-shadow:0 2px 4px rgba(0,0,0,.04);">
        <form>
            @csrf
            <div class="row" style="padding: 10px;">
                <div class="col-md-4">
                    <select class="form-control" name="brand" id="brand" style="width: 100%;" required>
                        <option disabled selected> Pilih Merk </option>
                        <?php $brands = App\Brand::orderBy('name', 'asc')->get(); ?>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="model" id="model" style="width: 100%;" required>
                        <option disabled selected> Pilih Model </option>
                    </select>
                </div>
                <div class="col-md-4">
                    @auth
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Cari</button>
                    @endauth
                    @guest
                    <button type="button" class="btn btn-primary d-none d-sm-none d-md-block d-lg-block d-xl-block" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer;color: white;width: 100%;">Cari</button>
                    <button type="button" class="btn btn-primary d-sm-block d-md-none d-lg-none d-xl-none" data-toggle="modal" data-target=".bd-example-modal-lg-hp" style="cursor: pointer;color: white;width: 100%;">Cari</button>
                    @endguest
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row justify-content-center" id="half">
    <div class="col-md-12" style="background-color: #ebe9ea;padding: 50px;">
        <div class="form-group">
            <center><h1>Mobil Pilihan</h1></center>
        </div>
        <div class="form-group">
            <div class="row justify-content-center card-deck">
                <?php $specimens = App\Specimen::orderBy('created_at', 'desc')->limit(5)->get(); ?>
                @foreach($specimens as $specimen)
                <?php $cars = App\Car::where('specimen_id', $specimen->id)->orderBy('created_at', 'desc')->limit(1)->get(); ?>
                @foreach($cars as $car)
                <div class="card card-item border-danger" style="background-color: transparent;">
                    <div style="padding: 10px;">
                        <?php
                        $image = App\CarImage::where('car_id', $car->id)->orderBy('created_at', 'asc')->first();
                        $price = App\Price::where('car_id', $car->id)->orderBy('tdp', 'asc')->first();
                        ?>
                        @if($image !== null)
                        <img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$image->picture) }}" alt="{{ $car->name }}">
                        @endif
                    </div>
                    <div style="padding: 10px;">
                        <div class="card-body" style="padding: 0px;flex: 0;">
                            <h5 class="card-title text-center"><b>{{ $car->name }}</b></h5>
                        </div>
                        <div class="card-footer" style="background-color: transparent;border:0px;padding: 0px;">
                            @if($price !== null)
                            <h4 class="text-center text-danger"><b>Rp. {{ number_format($price->tdp,0,",",".") }}</b></h4>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">                
                <a href="{{ route('advancedCar') }}" class="btn btn-primary" style="color: white;text-decoration: none;">Lihat Semua</a>
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
            <div class="container">
                <div class="row justify-content-center card-deck">   
                    <?php $testimonis = App\Testimonial::paginate(2); ?>
                    @foreach($testimonis as $testimoni)
                    <div class="card card-item border-danger" style="background-color: transparent;padding-bottom: 10px;">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$testimoni->picture) }}">
                            <div class="card-body">
                              <h5 class="card-title">{{ $testimoni->name }}</h5>
                              <p class="card-text">"{{ $testimoni->content }}"</p>    
                          </div>                          
                      </div>
                  </div>                    
                  @endforeach
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
            <div class="container">
                <div class="row justify-content-center card-deck">
                    <?php $articles = App\Article::orderBy('updated_at', 'desc')->paginate(3); ?>
                    @foreach($articles as $article)
                    <div class="card col-md-4">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$article->picture) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                @if(strlen($article->content)<=400)
                                <p class="card-text">{{ $article->content }}</p>
                                @else
                                <p class="card-text">{{ substr($article->content, 0, 400) }}...</p>
                                @endif
                                <p class="card-text"><small style="color: #006db8;">ditulis oleh {{ $article->user->name }} pukul {{ date("H:i", strtotime($article->created_at)) }}</small></p>
                            </div>                      
                        </div>
                    </div>
                    @endforeach               
                </div>
            </div>            
        </div>        
    </div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        var height = document.getElementById('half').offsetHeight;
        var css = height / 2;
        document.getElementById('half').style.marginTop = "-" + css + "px";        

        $('#brand').on('click', function(e){
            console.log(e);
            var id = e.target.value;
            var brand_id = $(this).val();            
            if (brand_id == '' || brand_id == null)
            {
                $('#model').prop('disabled', true);
            }
            else {
                $('#model').prop('disabled', false);
                $.get("{{ url('json-regencies') }}?id=" + id,function(data) {
                  console.log(data);
                  $('#model').empty();
                  $('#model').append('<option disabled selected> Pilih Model </option>');
                  $.each(data, function(index, regenciesObj){
                    $('#model').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
                })
              });
            }
        });
        $('#brand').click();
        $('#brand').on('change', function(){
            $('#brand').click();
        });
        $('.slick-artikel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1
        });
        $('.slick-testimoni').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1
        });
        $('.slick-mobile').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    });
</script>
@endsection