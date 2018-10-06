<center>
	<img src="{{ asset('inset/logo.png') }}" style="max-width: 200px;">
</center>
<p>Hallo, {{ $name }}</p>
<p style="word-break: all;">Terimakasih telah mengunjungi mobilngetop, silahkan klik link dibawah ini dan masukkan password untuk registrasi menjadi member mobilngetop dan dapatkan diskon, promo serta tawaran menarik lainnya dari kami!</p>
<p style="color: red;">password: {{ $password }}</p>
<a href="{{ $url }}">{{ $url }}</a>
<!-- <footer style="background-color: white;padding: 50px;-webkit-box-shadow:0 2px 4px rgba(0,0,0,.04)!important;box-shadow:0 2px 4px black!important;">
	<div class="row justify-content-center">
		<div class="form-group" style="display: inline;">
			<div class="row justify-content-center">
				<center>
					<a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href=""><b>FAQ</b></a>
				</center>
				<center>                            
					<a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href=""><b>Ketentuan Pribadi</b></a>
				</center>
				<center>
					<a class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:10px;color: black;text-decoration: none;" href=""><b>Tentang Kami</b></a>
				</center>
			</div>
		</div>
	</div>
	<?php
	$facebook = App\Social::find(1)->value('link');
	$twitter = App\Social::find(2)->value('link');
	$instagram = App\Social::find(3)->value('link');
	$youtube = App\Social::find(4)->value('link');
	?>
	<div class="row justify-content-center">
		<a class="col-xs-3" href="{{ url($facebook) }}" target="_blank" style="padding: 10px;">
			<img src="{{ asset('inset/facebook.png') }}" class="img-fluid" style="max-width: 50px;">
		</a>
		<a class="col-xs-3" href="{{ url($twitter) }}" target="_blank" style="padding: 10px;">
			<img src="{{ asset('inset/twitter.png') }}" class="img-fluid" style="max-width: 50px;">
		</a>
		<a class="col-xs-3" href="{{ url($instagram) }}" target="_blank" style="padding: 10px;">
			<img src="{{ asset('inset/instagram.png') }}" class="img-fluid" style="max-width: 50px;">
		</a>
		<a class="col-xs-3" href="{{ url($youtube) }}" target="_blank" style="padding: 10px;">
			<img src="{{ asset('inset/youtube.png') }}" class="img-fluid" style="max-width: 50px;">
		</a>
	</div><br>
	<div class="row justify-content-center">
		<b>Jalan Radin Inten II No. 62</b>
	</div>
	<div class="row justify-content-center">
		<b>Duren Sawit, Jakarta Timur 13440</b>
	</div>
	<br>
	<div class="row justify-content-center">
		<img src="{{ asset('inset/logo.png') }}" style="max-height: 50px;">
	</div>
	<div class="row justify-content-center">
		<small><b>
			@if(date('Y')==2018)
			@else
			2018 - 
			@endif
		{{ date('Y') }} mobilngetop.com All Rights Reserved</b></small>
	</div>
</footer> -->