@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center" style="padding: 10px;">
		<div class="col-sm-12" style="padding-bottom: 10px;">
			<div class="row justify-content-center card-columns">
					@foreach($promos as $promo)					
					<div class="card card-item border-info col-sm-4" style="background-color: transparent;">
						<div style="padding: 10px;">
							<div class="card-body" style="padding: 0px;flex: 0;">
								<center>
									<img src="{{ url('https://admin.mobilngetop.com/'.$promo->picture) }}" class="img-fluid">
								</center>
							</div>
						</div>
					</div>					
					@endforeach				
			</div>
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