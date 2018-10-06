@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Register</h1>
            <form method="POST" action="{{ route('chgpwd') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <input type="hidden" name="id" value="{{ $user }}">
                </div>
                @if (session('message'))
                <div class="form-group">
                    <label for="confirmPassword">Ulangi Password*</label>
                    <input type="password" class="form-control is-invalid" id="confirmPassword" name="confirm_password" required>
                    <small id="confirmPasswordHelp" class="form-text text-danger">*password tidak sama</small>
                </div>
                @else
                <div class="form-group">
                    <label for="confirmPassword">Ulangi Password*</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                    <small id="confirmPasswordHelp" class="form-text text-muted">*kami sarankan untuk mengganti password pada saat anda telah sign in</small>
                </div>
                @endif
                <center>
                    <button type="submit" class="btn btn-primary" style="border-radius: 0px;">Register</button>
                </center>
            </form>
        </div>
        <div class="col-sm-6"></div>
    </div>
</div>
@endsection