@extends('layouts.data')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
        <img src="{{ asset('inset/image_data_diri.png') }}" class="img-fluid">
    </div>
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-xs-7">
        <br>
        <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block">
            <br><br><br><br><br>
        </div>
        <center>
            <h1>Data Pribadi</h1>
            <br><br>
            <form method="POST" action="{{ route('form-data') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="text-center col-md-6 form-control is-invalid" placeholder="nama" required autofocus>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="text-center col-md-6 form-control is-invalid" placeholder="email" required>
                </div>
                <div class="form-group">
                    <input type="number" name="phone_number" class="text-center col-md-6 form-control is-invalid" placeholder="nomor handphone" required>
                </div>
                <div class="form-group">
                    <input type="text" name="voucher_code" class="text-center col-md-6 form-control is-invalid" placeholder="kode voucher*">
                    <div class="col-md-6">
                        <small class="float-left text-danger">*apabila ada</small>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6">
                        <h4 class="text-center" style="word-break: all;">isi data anda dan kami akan memberikan penawaran terbaik!</h4>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">hubungi saya</button>
                </div>
            </form>
        </center>
    </div>
</div>
@endsection
