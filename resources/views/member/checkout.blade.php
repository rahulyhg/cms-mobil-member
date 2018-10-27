@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row justify-content-center">
				<h1 class="text-info">Data Diri</h1>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row justify-content-center">
				<img src="{{ url('https://admin.mobilngetop.com/'.$image) }}" class="img-fluid">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row justify-content-center">
				<h2>{{ $title }}</h2>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row justify-content-center">
				<h3>{{ $price }}</h3>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row justify-content-center">
				<form class="col-sm-6" method="POST" action="{{ route('buy') }}">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="nama"><b>Nama*</b></label>
								<input type="text" id="nama" name="nama" class="form-control border-danger" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="ktp"><b>No. KTP*</b></label>
								<input type="number" id="ktp" name="ktp" class="form-control border-danger" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email"><b>Email*</b></label>
								<input type="email" id="email" name="email" class="form-control border-danger" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="kota"><b>Kota*</b></label>
								<input type="text" id="kota" name="kota" class="form-control border-danger" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="hp"><b>No. Hp*</b></label>
								<input type="number" id="hp" name="hp" class="form-control border-danger" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="row justify-content-center">
								<input type="hidden" name="id" value="{{ $id }}">
								<input type="hidden" name="tenor" value="{{ $tenor }}">
								<input type="hidden" name="tdp" value="{{ $price }}">
								<button type="submit" class="btn btn-primary" style="border-radius: 0px;">Checkout</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>
@endsection