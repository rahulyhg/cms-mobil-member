@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Akun Saya</h1>
	<div class="row">
		<ul class="list-group">
			<li class="list-group-item" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home">Cras justo odio</li>
			<li class="list-group-item" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Dapibus ac facilisis in</li>
			<li class="list-group-item" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact">Morbi leo risus</li>
		</ul>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
			<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<h3>HOME</h3>
				<p>Some content.</p>
			</div>
			<div id="menu1" class="tab-pane fade">
				<h3>Menu 1</h3>
				<p>Some content in menu 1.</p>
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3>Menu 2</h3>
				<p>Some content in menu 2.</p>
			</div>
		</div>
	</div>
</div>
@endsection