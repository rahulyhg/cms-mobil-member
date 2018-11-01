@extends('layouts.app')

@section('description', $first->content)

@section('content')
<div class="container">	
	<div class="row">
		<div class="col-sm-8">
			<h2>{{ $first->title }}</h2>
			<!-- <a style="color: #006db8;">{{ date("j F Y", strtotime($first->created_at)) }} pada {{ date("H:i", strtotime($first->created_at)) }} oleh {{ $first->user->name }}</a> -->
			<div class="row" style="padding-top: 10px;padding-bottom: 10px;">
				<div class="col-sm-12 text-center">
					<img src="{{ url('https://admin.mobilngetop.com/'.$first->picture) }}" class="img-fluid" style="width: 100%;">
				</div>
				<div class="col-sm-12">
					@if($first->picture_credit !== null)
					<small style="color: #006db8;" class="float-right">Sumber : {{ $first->picture_credit }}</small>
					@endif
				</div>
			</div>
			<b>
				<p style="word-break: all;">{!! $first->content !!}</p>
				<!-- <p>({{ $first->user->name }})</p> -->
			</b>
		</div>
		<div class="col-sm-4">
			@foreach($articles as $article)			
			<div class="col-sm-12" style="padding-bottom: 10px;">
				<div class="card card-item border-info" style="background-color: transparent;">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-12">
										<a href="{{ route('showArticle', $article->id) }}" style="color: black;text-decoration: none;"><b>{{ $article->title }}</b></a>
									</div>
									<div class="col-sm-12">
										<small class="text-muted">{{ date("l, j F", strtotime($article->created_at)) }}</small>
									</div>
								</div>
							</div>
							<div class="col-sm-6 text-center">
								<img src="{{ url('https://admin.mobilngetop.com/'.$article->picture) }}" class="img-fluid" style="width: 100%;">
							</div>
						</div>			
					</div>
				</div>
			</div>
			@endforeach
			<div class="col-sm-12">
				<a href="" class="float-right btn btn-primary" style="border-radius: 0px;">Lihat Semua Berita</a>
			</div>
		</div>
	</div>
</div>
@endsection