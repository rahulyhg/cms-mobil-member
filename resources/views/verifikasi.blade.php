@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="form-group">
            <h2 class="text-danger">Kode verifikasi telah dikirim ke nomor handphone anda.</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <img src="{{ asset('inset/verifikasi.png') }}" class="img-fluid">
    </div>
    <form method="POST">
        <div class="row justify-content-center">
            <div class="col-sm-2">                
                <input class="form-control text-center" min="1001" max="9999" type="number" name="verification_code" required>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <small class="text-danger">1 dari 3 sms</small>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <button class="btn btn-primary" style="border-radius: 0px;">kirim ulang</button>
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <p class="text-danger text-center" style="word-break: all;">
                <b>Simpan riwayat pencarian harga terbaik anda dengan menjadi member mobilngetop.com, password telah dikirim ke alamat email anda.</b>
            </p>
        </div>
    </div>
</div>
@endsection