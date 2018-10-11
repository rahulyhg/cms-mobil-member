@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('p') }}">
            @csrf
            <input type="text" name="p" class="form-control">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
    </div>
</div>
@endsection