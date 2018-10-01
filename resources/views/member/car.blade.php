@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<h3 id="name"><b>All New Fortuner</b></h3>
			<h4 id="title">ALL NEW FORTUNER 4X2 2.4 G A/T DSL</h4>
			<form>
				<div class="form-group row">
					<label for="variant" class="col-sm-3 col-form-label">Variant</label>
					<div class="col-sm-6">
						<select class="form-control" name="variant" id="variant" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="transmission" class="col-sm-3 col-form-label">Transmisi</label>
					<div class="col-sm-6">
						<select class="form-control" name="transmission" id="transmission" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="tenor" class="col-sm-3 col-form-label">Tenor</label>
					<div class="col-sm-6">
						<select class="form-control" name="tenor" id="tenor" required>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="fuel" class="col-sm-3 col-form-label">Bahan Bakar</label>
					<div class="col-sm-6">
						<select class="form-control" name="fuel" id="fuel" required>
						</select>
					</div>
				</div>
				<div class="form-group text-center">
					<h2>TDP</h2>
					<h1 id="tdp"><b>Rp. 500.000.000</b></h1>
				</div>
				<div class="form-group row justify-content-center">
					<button type="submit" class="btn btn-danger" style="border-radius: 0px;">pesan sekarang</button>
				</div>
			</form>
		</div>
		<div class="col-sm-7">
			<div class="text-center">
				<form class="form-inline row justify-content-center">
					<div class="col-sm-4">
						<select class="form-control" required name="brand" id="brand" style="width: 100%;">							
							@foreach($brands as $brand)
							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-4">
						<select class="form-control" required name="model" id="model" style="width: 100%;">							
						</select>
					</div>
					<img id="image" src="{{ asset('inset/AllNewFortuner-black.png') }}" class="img-fluid">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('foot-content')
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
					document.getElementById("title").innerHTML = regenciesObj.name;
					var rp = (regenciesObj.tdp).formatMoney(2, ".", ",");
					<?php $rp = ?>+ regenciesObj.tdp +<?php ; ?>;
					<?php dd($rp) ?>
					document.getElementById("tdp").innerHTML = rp;
					document.getElementById("image").src = "http://localhost/cms-mobil-admin/public/"+ regenciesObj.picture;					
				})
			});			
		});

		function formatMoney(n, c, d, t) {
			var c = isNaN(c = Math.abs(c)) ? 2 : c,
			d = d == undefined ? "." : d,
			t = t == undefined ? "," : t,
			s = n < 0 ? "-" : "",
			i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
			j = (j = i.length) > 3 ? j % 3 : 0;

			return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		};		
	});
</script>
@endsection