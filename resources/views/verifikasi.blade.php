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
    <form method="POST" action="{{ route('cek-token') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-2">                
                <input id="verif" class="form-control text-center" min="1001" max="9999" type="number" name="verification_code" oninput="return reverse()" required>
                <div class="form-group">
                    <center><small id="salah" class="text-danger" style="display: none;">Kode verifikasi salah</small></center>
                </div>
            </div>
        </div>        
        <div class="row justify-content-center">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="border-radius: 0px;">konfirmasi</button>
            </div>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="form-group">
                <small class="text-danger">1 dari 3 sms</small>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group">
                <button class="btn btn-primary" style="border-radius: 0px;">kirim ulang</button>
            </div>
        </div> -->
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

@section('foot-content')
<script type="text/javascript">
    $('form').submit(function () {

        var x = $.trim($('#verif').val());
        var y = <?php echo $code; ?>;

        if (x != y) {
            document.getElementById('salah').style.display = "block";
            return false;
        }
    });
    function reverse() {
        document.getElementById('salah').style.display = "none";   
    }    
</script>
@endsection