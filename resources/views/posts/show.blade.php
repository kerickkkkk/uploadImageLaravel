@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid" src="/storage/{{ $post->image }}" alt="">
        </div>
        <div class="col-lg-6">
            <div class="d-flex align-items-center border-bottom pb-3">
                <div class="title-pic mr-3 border" style="width:50px;">
                    <img src="/storage/{{$post->user->profile->image}}" class="img-fluid">
                </div>
                <h4 class="mb-0 mr-2">
                    <a href="/profile/{{$post->user->id}}" class="text-dark">
                        {{$post->user->username}}
                    </a>
                </h4>
                <a href="#" class="text-sm">Follow</a>
            </div>
            
            <p>                    
                <a href="/profile/{{$post->user->id}}" class="text-dark">
                    {{$post->user->username}}
                </a>
                {{$post->caption}}
            </p>
        </div>
    </div>
</div>
@endsection
