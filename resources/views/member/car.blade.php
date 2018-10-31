@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<h3 id="name"></h3>
			<h4 id="title"></h4>
			<form method="POST" action="{{ route('storeCheckout') }}">
				@csrf
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
					<label for="fuel" class="col-sm-3 col-form-label">Bahan Bakar</label>
					<div class="col-sm-6">
						<select class="form-control" name="fuel" id="fuel" required>
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
				<div class="form-group text-center">
					<h2>TDP</h2>
					<h1 id="tdp"></h1>
				</div>
				<div class="form-group row justify-content-center">
					<input type="hidden" name="id" id="id">
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
				</form>
			</div>
			<br>			
			<img id="image" class="img-fluid">
			<div class="row justify-content-center">
				<div id="color" class="modal-footer" style="background-color: rgba(235, 233, 234, 0.5);"></div>
			</div>			
		</div>
	</div>
</div>
@auth
@if(Auth::user()->role_id >= 2)
<div style="background-color: #ebe9ea;padding: 50px;">
	<div class="container">
		<div class="row">
			<div class="col-sm-6" style="border-right-style: solid;border-right-width: thin;">
				<h1>Spesifikasi</h1>
				<div id="spesifikasi" style="word-break: all;"></div>
			</div>
			<div class="col-sm-6" style="border-left-style: solid;border-left-width: thin;">
				<h1>Engine</h1>
				<div id="engine" style="word-break: all;"></div>
			</div>
		</div>
	</div>
</div>
@endif
@endauth
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
				$('#fuel').prop('disabled', true);
			}
			else {
				$('#fuel').prop('disabled', false);
				$.get("{{ url('json-transmission') }}?id=" + id +"&variant_id=" + variant + "&model_id=" + model,function(data) {
					console.log(data);					
					$('#fuel').empty();
					$.each(data, function(index, regenciesObj){
						document.getElementById("name").innerHTML = "<b>" + regenciesObj.name + "</b>";						
						document.getElementById("title").innerHTML = regenciesObj.type;
						document.getElementById("id").value = regenciesObj.id;
						<?php if(auth()->guard()->check()): ?>
						<?php if(Auth::user()->role_id >= 2): ?>						
						document.getElementById("spesifikasi").innerHTML = '<pre><p><b>' + regenciesObj.specification + '</b></p></pre>';
						document.getElementById("engine").innerHTML = '<pre><p><b>' + regenciesObj.engine + '</b></p></pre>';
						<?php endif; ?>
						<?php endif; ?>
						$('#fuel').append('<option>'+ regenciesObj.fuel +'</option>');
					})
					$('#fuel').change();
				});
				$.get("{{ url('json-first-src') }}?id=" + id +"&variant_id=" + variant + "&model_id=" + model,function(data) {					
					$('#image').attr('src', 'https://admin.mobilngetop.com/' + data.picture);		
				});
				$.get("{{ url('json-image') }}?id=" + id +"&variant_id=" + variant + "&model_id=" + model,function(data) {
					console.log(data);
					$('#color').empty();
					$.each(data, function(index, regenciesObj){						
						$('#color').append('<button onClick="color(' + regenciesObj.id + ')" class="btn btn-sm" id="btn-color" style="padding:10px;border-radius: 100%;background-color: ' + regenciesObj.color + ';"></button>');
					})					
				});
			}
		});		

		$('#fuel').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var model = $('#model').val();
			var variant = $('#variant').val();
			var transmission = $('#transmission').val();
			$.get("{{ url('json-fuel') }}?id=" + id +"&transmission_id=" + transmission + "&variant_id=" + variant + "&model_id=" + model,function(data) {
				console.log(data);
				$('#tenor').empty();
				$.each(data, function(index, regenciesObj){					
					$('#tenor').append('<option value="' + regenciesObj.id + '">'+ regenciesObj.tenor +'</option>');					
				})
				$('#tenor').change();
			});
		});

		$('#tenor').on('change', function(e){
			console.log(e);
			var id = e.target.value;
			var tenor_id = $(this).val();
			if (tenor_id == '' || tenor_id == null)
			{
				
			}
			else {
				$.get("{{ url('json-tenor') }}?id=" + id,function(data) {
					console.log(data);					
					$.each(data, function(index, regenciesObj){
						var bilangan = regenciesObj.tdp;
						var	reverse = bilangan.toString().split('').reverse().join(''),
						ribuan 	= reverse.match(/\d{1,3}/g);
						ribuan	= ribuan.join('.').split('').reverse().join('');
						document.getElementById("tdp").innerHTML = "<b>Rp. " + ribuan + "</b>";
					})
				});
			}
		});

	});
function color(id) {	
	$.get("{{ url('json-src') }}?id=" + id,function(data) {		
		$('#image').attr('src', 'https://admin.mobilngetop.com/' + data.picture);		
	});
}
</script>
@endsection