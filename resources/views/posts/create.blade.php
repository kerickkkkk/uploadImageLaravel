@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
    @csrf             
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 >Add New Post</h2>
                <!-- caption 區域 -->
                <div class="form-group">
                    <label for="caption" class="col-form-label">Post Caption</label>

                    <input id="caption"
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror"
                        name="caption"
                        value="{{ old('caption') }}"
                        autocomplete="caption"
                        autofocus>

                    <!-- caption 錯誤訊息 -->
                   @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- img -->
                <div class="post__img mb-2">
                    <label for="image" class="col-form-label">Post image</label>
                    <input id="image"
                        type="file"
                        class="form-control"
                        name="image"
                        >
                    
                    <!-- img 錯誤訊息 -->
                    @error('image')
                        <!-- <span class="invalid-feedback" role="alert"> -->
                            <strong>{{ $message }}</strong>
                        <!-- </span> -->
                    @enderror
                </div>

                <button class="btn btn-sm btn-primary">送出</button>
            </div>
        </div>
    </form>
</div>
@endsection
