@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center" style="padding: 10px;">
		<div class="col-sm-8" style="padding-bottom: 10px;">
			<h2 class="text-danger">FAQ</h2>
		</div>
		@foreach($faqs as $faq)
		<div class="col-sm-8" style="padding-bottom: 10px;">
			<h3 style="color: #006db8;">{{ $faq->name }}</h3>
			<p style="word-break: all;"><b>{{ $faq->content }}</b></p>
		</div>
		@endforeach        
	</div>
</div>
@endsection