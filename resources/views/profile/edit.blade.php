@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf             
        @method('PATCH')

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2 >Edit Profile</h2>
                    {{-- 修改使者用名稱 --}}
                    <div class="form-group">
                        <label for="title" class="col-form-label">title</label>
    
                        <input id="title"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title"
                            value="{{ old('title') ??  $user->profile->title}}"
                            autocomplete="title"
                            autofocus>
    
                        {{--  title 錯誤訊息 --}}
                       @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- 修改使者用名稱 --}}
                    <div class="form-group">
                        <label for="description" class="col-form-label">user description</label>
    
                        <input id="description"
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            value="{{ old('description') ?? $user->profile->description }}"
                            autocomplete="description"
                            autofocus>
    
                        {{--  description 錯誤訊息 --}}
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- 修改使者用名稱 --}}
                    <div class="form-group">
                        <label for="url" class="col-form-label">profile url</label>
    
                        <input id="url"
                            type="text"
                            class="form-control @error('url') is-invalid @enderror"
                            name="url"
                            value="{{ old('url') ?? $user->profile->url }}"
                            autocomplete="url"
                            autofocus>
    
                        {{--  url 錯誤訊息 --}}
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- img -->
                    <div class="post__img mb-2">
                        <label for="image" class="col-form-label">user image</label>
                        <input id="image"
                            type="file"
                            class="form-control"
                            name="image"
                            value="{{$user->image ?? ''}}"
                            >
                        
                        <!-- img 錯誤訊息 -->
                        @error('image')
                            <!-- <span class="invalid-feedback" role="alert"> -->
                                <strong>{{ $message }}</strong>
                            <!-- </span> -->
                        @enderror
                    </div>
    
                    <button class="btn btn-sm btn-primary">儲存個人資料</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
