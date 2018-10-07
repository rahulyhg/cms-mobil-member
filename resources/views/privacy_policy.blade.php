@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding: 10px;">
        @foreach($privacy_policies as $privacy_policy)
        <div class="col-sm-8" style="padding-bottom: 10px;">
            <h2>{{ $privacy_policy->name }}</h2>
            <p style="word-break: all;"><b>{{ $privacy_policy->content }}</b></p>
        </div>
        @endforeach        
    </div>
</div>
@endsection