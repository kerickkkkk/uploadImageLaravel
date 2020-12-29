@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="logo p-4 rounded bg-warning text-center">
                <img src="{{$user->profile->defaultImage()}}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-start mb-2">
                {{-- 使用者名稱 --}}
                <div>
                    <div class="d-flex">
                        <h4 class="mr-2">{{$user -> username?? '' }}</h4>
                        <follow-btn user-id="{{$user->id}}"  follows="{{$follows}}"></follow-btn>
                    </div>

                    @can('update', $user->profile)
                        <a href="/profile/{{$user->id}}/edit" class="btn btn-sm btn-outline-primary">Edit Profile</a>
                    @endcan

                </div>
                @can('update', $user->profile)
                    <a href="/p/create" class="btn btn-sm btn-primary">add new post</a>
                @endcan

            </div>
            <ul class="d-flex pl-0" style=" list-style-type: none;">
                <li class="mr-5"><strong class="mr-1">{{ $postCount }}</strong>post</li>
                <li class="mr-5"><strong class="mr-1">{{ $followersCount}}</strong>followers</li>
                <li><strong class="mr-1">{{$followingCount}}</strong>following</li>
            </ul>
            <h3 class="font-weight-bold">
                <!-- ig clone -->
                <!-- 從 user 關聯到 profile 裡面的 title  -->
                {{ $user->profile->title ?? '沒資料'}}
            </h3>
            <p>
                <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque odio, autem consequuntur quod repudiandae dolor tenetur a, maxime harum error tempore nihil magnam rerum. Autem quas ullam ab aliquid praesentium. -->
                {{ $user->profile->description ?? '沒資料'}}
            </p>
            <a href="#" class="text-dark"> 
                <!-- 測試用連結 -->
                <!-- 從 user 關聯到 profile 裡面的 title  -->
                {{ $user->profile->url ?? "沒資料"}}
            </a>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
            <div class="col-lg-4 mb-2">
                <a href="/p/{{ $post->id }}">
                    <img class="img-fluid" src="/storage/{{ $post->image }}" alt="">
                    <h4 class="text-center">{{ $post->caption }}</h4>
                </a>
            </div>
        @endforeach
        <!-- <div class="col-lg-4"><img class="img-fluid" src="https://images.unsplash.com/photo-1468657988500-aca2be09f4c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt=""></div> -->
        <!-- <div class="col-lg-4"><img class="img-fluid" src="https://images.unsplash.com/photo-1468657988500-aca2be09f4c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt=""></div>
        <div class="col-lg-4"><img class="img-fluid" src="https://images.unsplash.com/photo-1468657988500-aca2be09f4c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt=""></div> -->
    </div>
</div>
@endsection
