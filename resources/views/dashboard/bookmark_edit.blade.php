@extends('dashboard.layouts.app')

@section('page_title', 'Bookmark Edit')

@section('content')
<div class="container-fluid">
    <div class="section-list">
        <div class="section page-header">
            <h5 class="heading">Bookmark Editing..</h5>
        </div>
        @if(session('success'))
        <div class="section alerts">
        <span><i class="far fa-check-circle icon-r"></i>{{session('success')}}</span>
        </div>
        @endif
        <div class="section setting">
            <form method="POST" action="/bookmarks/update/{{$bookmark->id}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="bookmark_title">Title:</label>
                    <input type="text" class="form-control @error('bookmark_title') is-invalid @enderror"
                        id="bookmark_title" name="bookmark_title" value="{{$bookmark->name}}">
                    @error('bookmark_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <!--<div class="form-group">
                    <label for="bookmark_description">Description:</label>
                    <input type="text" class="form-control @error('bookmark_description') is-invalid @enderror"
                        id="bookmark_description" name="bookmark_description" value="{{$bookmark->description}}">
                    @error('bookmark_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>-->
                <div class="form-group">
                    <label for="bookmark_url">URL:</label>
                    <input type="url" class="form-control @error('bookmark_url') is-invalid @enderror"
                        id="bookmark_url" name="bookmark_url" value="{{$bookmark->url}}">
                    @error('bookmark_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('collections', $bookmark->collection_id)}}" class="btn btn-light"
                    role="button">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection