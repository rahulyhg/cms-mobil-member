@extends('layouts.app')

@section('head-content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<h3 class="text-danger">Filter Pencarian</h3>
			<form method="GET" action="{{ route('advancedCar') }}">				
				<div class="form-group row">
					<label for="variant" class="col-sm-3 col-form-label text-md-right">Merk</label>
					<div class="col-sm-6">
						<select class="form-control" name="b" id="brand" required style="width: 100%;">
							<?php
							if (isset($_SESSION['brand'])) {
								$old_brand = $_SESSION['brand'];
							}
							else {
								$old_brand = null;
							}
							?>
							<option disabled selected>Pilih Merk</option>
							@foreach($brands as $brand)
							<option value="{{ $brand->id }}" {{ $old_brand == $brand->id ? 'selected' : null }}>{{ $brand->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="transmission" class="col-sm-3 col-form-label text-md-right">Model</label>
					<div class="col-sm-6">
						<select class="form-control" name="m" id="model" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label text-md-right">Harga</label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="float-left">
									<small>Rp.<a id="amount1text"></a></small>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="float-right">
									<small>Rp.<a id="amount2text"></a></small>
								</div>
							</div>
						</div>			
						<input type="hidden" name="pin" id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="pax" id="amount2" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<div id="slider-range"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="fuel" class="col-sm-3 col-form-label text-md-right">Kapasitas Mesin</label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="float-left">
									<small><a id="engine1text"></a>cc</small>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="float-right">
									<small><a id="engine2text"></a>cc</small>
								</div>
							</div>
						</div>			
						<input type="hidden" name="ein" id="engine1" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" name="eax" id="engine2" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<div id="slider-range2"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-danger btn-lg btn-block">Cari</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-8">			
			<div class="row">
				@foreach($cars as $car)
				<div class="col-sm-6">
					<div class="card card-item border-danger" style="background-color: transparent;">
						<div style="padding: 10px;">
							<?php
							$image = App\CarImage::where('car_id', $car->id)->orderBy('created_at', 'asc')->first();
							$price = App\Price::where('car_id', $car->id)->orderBy('tdp', 'asc')->first();
							?>
							<img class="card-img-top" src="{{ url('https://admin.mobilngetop.com/'.$image->picture) }}" alt="{{ $car->name }}">
						</div>
						<div style="padding: 10px;">
							<div class="card-body" style="padding: 0px;flex: 0;">
								<h6 class="card-title text-center"><b>{{ $car->name }}</b></h6>
								<div class="card-text">
									<div class="row justify-content-center">
										<div class="col-sm-4 text-center">
											<small>{{ $car->seat }} Kursi</small>
										</div>
										<div class="col-sm-4 text-center">
											<small>{{ $car->engine_power }}cc</small>
										</div>
										<div class="col-sm-4 text-center">
											<small>{{ $car->power }}hp</small>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-center" style="background-color: transparent;border:0px;padding: 0px;">
								<a class="text-danger"><b>Rp. {{ number_format($price->tdp,0,",",".") }}</b></a>
							</div>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
if (isset($_SESSION['price_min'])) {
	$cheaps = $_SESSION['price_min'];
}
else {
	$cheaps = $cheap->tdp;
}
if (isset($_SESSION['price_max'])) {
	$richs = $_SESSION['price_max'];
}
else {
	$richs = $rich->tdp;
}
if (isset($_SESSION['engine_min'])) {
	$lates = $_SESSION['engine_min'];
}
else {
	$lates = $late->engine_power;
}
if (isset($_SESSION['engine_max'])) {
	$fasts = $_SESSION['engine_max'];
}
else {
	$fasts = $fast->engine_power;
}
?>
<script>
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: {{ $cheap->tdp }},
			max: {{ $rich->tdp }},
			values: [ {{ $cheaps }}, {{ $richs }} ],
			slide: function( event, ui ) {
				$( "#amount1" ).val( ui.values[ 0 ] );
				$( "#amount2" ).val( ui.values[ 1 ] );
				$( "#amount1text" ).text( ui.values[ 0 ] );
				$( "#amount2text" ).text( ui.values[ 1 ] );
			}
		});
		$( "#amount1" ).val( $( "#slider-range" ).slider( "values", 0 ) );
		$( "#amount2" ).val( $( "#slider-range" ).slider( "values", 1 ) );
		$( "#amount1text" ).text( $( "#slider-range" ).slider( "values", 0 ) );
		$( "#amount2text" ).text( $( "#slider-range" ).slider( "values", 1 ) );
	} );
</script>
<script>
	$( function() {
		$( "#slider-range2" ).slider({
			range: true,
			min: {{ $late->engine_power }},
			max: {{ $fast->engine_power }},
			values: [ {{ $lates }}, {{ $fasts }} ],
			slide: function( event, ui ) {
				$( "#engine1" ).val( ui.values[ 0 ] );
				$( "#engine2" ).val( ui.values[ 1 ] );
				$( "#engine1text" ).text( ui.values[ 0 ] );
				$( "#engine2text" ).text( ui.values[ 1 ] );
			}
		});
		$( "#engine1" ).val( $( "#slider-range2" ).slider( "values", 0 ) );
		$( "#engine2" ).val( $( "#slider-range2" ).slider( "values", 1 ) );
		$( "#engine1text" ).text( $( "#slider-range2" ).slider( "values", 0 ) );
		$( "#engine2text" ).text( $( "#slider-range2" ).slider( "values", 1 ) );
	} );
</script>
<script type="text/javascript">	
	$(document).ready(function(){		
		$('#brand').on('change', function(e){
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
					$.each(data, function(index, regenciesObj){
						$('#model').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
						$('#model').change();
					})
					<?php
					if (isset($_SESSION['model'])) {
						echo 'document.getElementById("model").value = "'.$_SESSION['model'].'"';
					}
					?>					
				});
			}
		});
		$('#brand').change();

		$('#model').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var model_id = $(this).val();
			if (model_id == '' || model_id == null)
			{
				$('#variant').prop('disabled', true);
			}
			else {
				$('#variant').prop('disabled', false);
				$.get("{{ url('json-model') }}?id=" + id,function(data) {
					console.log(data);
					$('#variant').empty();					
					$.each(data, function(index, regenciesObj){
						$('#variant').append('<option value="'+ regenciesObj.variant +'">'+ regenciesObj.variant +'</option>');
					})
					$('#variant').change();
				});
			}
		});

		$('#ex6').on('change', function(e){			
			var id = e.target.value;			
			document.getElementById("ex6Val").innerHTML = id;
		});
		$('#ex6').change();
	});
</script>
@endsection