@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Berita Otomotif</h1>
	@if(count($first)>0)
	<div class="row">
		<div class="col-sm-8">			
			<img src="{{ url('https://admin.mobilngetop.com/'.$first->picture) }}" class="img-fluid" style="width: 100%;">
			<div style="padding-top: 20px;">				
				<h2><a href="{{ route('showArticle', $first->id) }}" style="color: black;text-decoration: none;">{{ $first->title }}</a></h2>
			</div>
			<div style="padding-top: 10px;padding-bottom: 20px;">
			<!-- <small style="color: #006db8;">ditulis oleh {{ $first->user->name }} pukul {{ date("H:i", strtotime($first->created_at)) }}</small> -->
			</div>
			@if(strlen($first->content)<=400)
			<p style="word-break: all;"><b>{{ $first->content }}</b></p>
			@else
			<p style="word-break: all;"><b>{{ substr($first->content, 0, 400) }}...</b></p>			
			@endif			
			<a href="{{ route('showArticle', $first->id) }}" class="btn btn-danger" style="border-radius: 0px;">Baca Selengkapnya</a>
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
	@endif
</div>
@endsection