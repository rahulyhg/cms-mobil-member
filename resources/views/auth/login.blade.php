@extends('layouts.app')

@section('content')
<div class="container">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <center>
                    <img src="{{ asset('inset/login.png') }}" class="img-fluid">
                </center>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group row mb-0">
                <div class="col-sm-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
