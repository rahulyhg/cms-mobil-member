@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<h3><b>All New Fortuner</b></h3>
			<h4>ALL NEW FORTUNER 4X2 2.4 G A/T DSL</h4>
			<form>
				<div class="form-group row">
					<label for="variant" class="col-sm-3 col-form-label">Variant</label>
					<div class="col-sm-6">
						<select class="form-control" name="variant" id="variant" required>
							<option>G</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="transmission" class="col-sm-3 col-form-label">Transmisi</label>
					<div class="col-sm-6">
						<select class="form-control" name="transmission" id="transmission" required>
							<option>A/T</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="tenor" class="col-sm-3 col-form-label">Tenor</label>
					<div class="col-sm-6">
						<select class="form-control" name="tenor" id="tenor" required>
							<option>36</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="fuel" class="col-sm-3 col-form-label">Bahan Bakar</label>
					<div class="col-sm-6">
						<select class="form-control" name="fuel" id="fuel" required>
							<option>Diesel</option>
						</select>
					</div>
				</div>
				<div class="form-group text-center">
					<h2>TDP</h2>
					<h1><b>Rp. 500.000.000</b></h1>
				</div>
				<div class="form-group row justify-content-center">
					<button type="submit" class="btn btn-danger">pesan sekarang</button>
				</div>
			</form>
		</div>
		<div class="col-sm-7">
			<div class="text-center">
				<form class="form-inline row justify-content-center">
					<div class="col-sm-4">
						<select class="form-control" required name="brand" id="brand" style="width: 100%;">
							<option>daihatsu</option>
						</select>
					</div>
					<div class="col-sm-4">
						<select class="form-control" required name="model" id="model" style="width: 100%;">
							<option>ayla</option>
						</select>
					</div>
					<img src="{{ asset('inset/AllNewFortuner-black.png') }}" class="img-fluid">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('foot-content')
@endsection