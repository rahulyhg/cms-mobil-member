@extends('layouts.app')

@section('head-content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<h3 class="text-danger">Filter Pencarian</h3>
			<form>
				<div class="form-group row">
					<label for="variant" class="col-sm-3 col-form-label">Merk</label>
					<div class="col-sm-6">
						<select class="form-control" name="variant" id="variant" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="transmission" class="col-sm-3 col-form-label">Model</label>
					<div class="col-sm-6">
						<select class="form-control" name="transmission" id="transmission" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Harga</label>
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
						<input type="hidden" id="amount1" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" id="amount2" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<div id="slider-range"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="fuel" class="col-sm-3 col-form-label">Kapasitas Mesin</label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="float-left">
									<small>Rp.<a id="engine1text"></a></small>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="float-right">
									<small>Rp.<a id="engine2text"></a></small>
								</div>
							</div>
						</div>			
						<input type="hidden" id="engine1" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<input type="hidden" id="engine2" readonly style="border:0; color:#f6931f; font-weight:bold;">
						<div id="slider-range2"></div>
					</div>
				</div>				
			</form>
		</div>
		<div class="col-sm-7">
			<div class="row justify-content-center card-deck">				
				<div class="card card-default col-sm-4">
					<div class="card-body">
						wew
					</div>
				</div>
				<div class="card card-default col-sm-4">
					<div class="card-body">
						wewwew
					</div>
				</div>
				<div class="card card-default col-sm-4">
					<div class="card-body">
						wewwewwew
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('foot-content')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php 
$cheap = App\Car::orderBy('tdp', 'asc')->first();
$rich = App\Car::orderBy('tdp', 'desc')->first();
$late = App\Car::orderBy('tdp', 'asc')->first();
$fast = App\Car::orderBy('tdp', 'desc')->first();
?>
<script>
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: {{ $cheap->tdp }},
			max: {{ $rich->tdp }},
			values: [ {{ $cheap->tdp }}, {{ $rich->tdp }} ],
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
			min: {{ $cheap->tdp }},
			max: {{ $rich->tdp }},
			values: [ {{ $cheap->tdp }}, {{ $rich->tdp }} ],
			slide: function( event, ui ) {
				$( "#engine1" ).val( ui.values[ 0 ] );
				$( "#engine2" ).val( ui.values[ 1 ] );
				$( "#engine1text" ).text( ui.values[ 0 ] );
				$( "#engine2text" ).text( ui.values[ 1 ] );
			}
		});
		$( "#engine1" ).val( $( "#slider-range" ).slider( "values", 0 ) );
		$( "#engine2" ).val( $( "#slider-range" ).slider( "values", 1 ) );
		$( "#engine1text" ).text( $( "#slider-range" ).slider( "values", 0 ) );
		$( "#engine2text" ).text( $( "#slider-range" ).slider( "values", 1 ) );
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

		$('#variant').on('change', function(e){
			console.log(e);
			var id = e.target.value;			
			var model = $('#model').val();
			var variant_id = $(this).val();
			if (variant_id == '' || variant_id == null)
			{
				$('#transmission').prop('disabled', true);
			}
			else {
				$('#transmission').prop('disabled', false);
				$.get("{{ url('json-variant') }}?id=" + id +"&model_id=" + model,function(data) {
					console.log(data);
					$('#transmission').empty();
					$.each(data, function(index, regenciesObj){
						$('#transmission').append('<option>'+ regenciesObj.transmission +'</option>');
						$('#transmission').change();
					})
				});
			}
		});

		$('#transmission').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var model = $('#model').val();
			var variant = $('#variant').val();
			var transmission_id = $(this).val();
			if (transmission_id == '' || transmission_id == null)
			{
				$('#tenor').prop('disabled', true);
			}
			else {
				$('#tenor').prop('disabled', false);
				$.get("{{ url('json-transmission') }}?id=" + id +"&variant_id=" + variant + "&model_id=" + model,function(data) {
					console.log(data);
					$('#tenor').empty();
					$.each(data, function(index, regenciesObj){
						$('#tenor').append('<option>'+ regenciesObj.tenor +'</option>');
					})
					$('#tenor').change();
				});
			}
		});

		$('#tenor').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var model = $('#model').val();
			var variant = $('#variant').val();
			var transmission = $('#transmission').val();
			var tenor_id = $(this).val();
			if (tenor_id == '' || tenor_id == null)
			{
				$('#fuel').prop('disabled', true);
			}
			else {
				$('#fuel').prop('disabled', false);
				$.get("{{ url('json-tenor') }}?id=" + id +"&transmission_id=" + transmission + "&variant_id=" + variant + "&model_id=" + model,function(data) {
					console.log(data);
					$('#fuel').empty();
					$.each(data, function(index, regenciesObj){
						$('#fuel').append('<option>'+ regenciesObj.fuel +'</option>');
					})
					$('#fuel').change();
				});
			}
		});

		$('#fuel').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var model = $('#model').val();
			var variant = $('#variant').val();
			var transmission = $('#transmission').val();
			var tenor = $('#tenor').val();
			$.get("{{ url('json-fuel') }}?id=" + id +"&tenor_id=" + tenor + "&transmission_id=" + transmission + "&variant_id=" + variant + "&model_id=" + model,function(data) {
				console.log(data);
				$.each(data, function(index, regenciesObj){
					document.getElementById("name").innerHTML = "<b>" + regenciesObj.name + "</b>";
					document.getElementById("title").innerHTML = regenciesObj.type;
					var 	bilangan = regenciesObj.tdp;
					var	reverse = bilangan.toString().split('').reverse().join(''),
					ribuan 	= reverse.match(/\d{1,3}/g);
					ribuan	= ribuan.join('.').split('').reverse().join('');					
					document.getElementById("tdp").innerHTML = "<b>Rp. " + ribuan + "</b>";
					document.getElementById("image").src = "https://admin.mobilngetop.com/"+ regenciesObj.picture;
				})
			});
		});

		$('#ex6').on('change', function(e){			
			var id = e.target.value;			
			document.getElementById("ex6Val").innerHTML = id;
		});
		$('#ex6').change();
	});
</script>
@endsection