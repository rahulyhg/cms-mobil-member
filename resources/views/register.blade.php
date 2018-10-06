@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Register</h1>
            <form>
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Ulangi Password*</label>
                    <input type="confirmPassword" class="form-control" id="confirmPassword" name="confirm_password">
                    <small id="confirmPasswordHelp" class="form-text text-muted">*kami sarankan untuk mengganti password pada saat anda telah sign in</small>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary" style="border-radius: 0px;">Register</button>
                </center>
            </form>
        </div>
        <div class="col-sm-6"></div>
    </div>
</div>
@endsection