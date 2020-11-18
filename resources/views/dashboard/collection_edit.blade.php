@extends('dashboard.layouts.app')

@section('page_title', 'Collection Edit')

@section('content')
<div class="container-fluid">
    <div class="section-list">
        <div class="section page-header">
            <h5 class="heading">Collection Editing..</h5>
        </div>
        @if(session('success'))
        <div class="section alerts">
        <span><i class="far fa-check-circle icon-r"></i>{{session('success')}}</span>
        </div>
        @endif
        <div class="section setting">
            <form method="POST" action="/collections/update/{{$collection->id}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control @error('collection_title') is-invalid @enderror"
                        id="collection_title" name="collection_title" value="{{$collection->name}}">
                    @error('collection_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('collections', $collection->id)}}" class="btn btn-light" role="button">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection