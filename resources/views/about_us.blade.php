@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center" style="padding: 10px;">		
		<h2 style="padding-bottom: 10px;" class="text-danger">Tentang Kami</h2>
	</div>
	<div class="row justify-content-center">
		@foreach($abouts as $about)
		<div class="col-sm-8" style="padding-bottom: 10px;">
			<h3>{{ $about->name }}</h3>
			<p style="word-break: all;"><b>{{ $about->content }}</b></p>
		</div>
		@endforeach        
	</div>
</div>
@endsection