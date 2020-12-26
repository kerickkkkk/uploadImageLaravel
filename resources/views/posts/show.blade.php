@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid" src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-lg-6">
            <h4>{{$post->user->username}}</h4>
            
            <p>{{$post->caption}}</p>
        </div>
    </div>
</div>
@endsection
