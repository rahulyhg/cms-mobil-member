@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center" style="padding: 10px;">
		<div class="col-sm-12" style="padding-bottom: 10px;">
			@foreach($promos as $promo)
			{{ $promo->picture }}<br>
			@endforeach
		</div>
		<div class="col-sm-12" style="padding-bottom: 10px;">
			<h2>Syarat & Ketentuan:</h2>
		</div>
		<div class="col-sm-12" style="padding-bottom: 10px;">
			@foreach($about_promos as $about_promo)
			<p style="word-break: all;"><b>- {{ $about_promo->content }}</b></p>
			@endforeach        
		</div>
	</div>
</div>
@endsection