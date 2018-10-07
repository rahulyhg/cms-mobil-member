@extends('layouts.app')

@section('content')
<div class="container">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row justify-content-center" style="padding-bottom: 20px;padding-top: 10px;">
            <div class="col-sm-6 text-center">
                <img src="{{ asset('inset/login.png') }}" class="img-fluid">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="form-group">                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color: black;background-color: transparent;border:0px;"><i class="fa fa-envelope fa-fw fa-2x"></i></span>
                        </div>
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="color: black;background-color: transparent;border:0px;"><i class="fa fa-lock fa-fw fa-2x"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
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
