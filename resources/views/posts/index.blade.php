@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-4 offset-4">
                {{-- 導到該使用者 --}}
                <a href="/profile/{{$post->user->id}}">
                    <img class="img-fluid" src="/storage/{{ $post->image }}" alt="">
                </a>
            </div>
            <div class="col-4 offset-4">
                <p>                    
                    <a href="/profile/{{$post->user->id}}" class="text-dark">
                        {{$post->user->username}}
                    </a>
                    {{$post->caption}}
                </p>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection
