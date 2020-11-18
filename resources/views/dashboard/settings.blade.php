@extends('dashboard.layouts.app')

@section('page_title', 'User Settings')

@section('content')
<div class="container-fluid">
    <div class="section-list">
        <div class="section page-header">
            <h5 class="heading">User Settings..</h5>
        </div>
        @if(session('success'))
        <div class="section alerts">
            <span><i class="far fa-check-circle icon-r"></i>{{session('success')}}</span>
        </div>
        @endif
        <div class="section settings">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-bookmark" role="tab"
                        aria-controls="pills-bookmark" aria-selected="true">Bookmark Settings</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab"
                        aria-controls="pills-account" aria-selected="false">Account Settings</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-bookmark" role="tabpanel"
                    aria-labelledby="pills-bookmark-tab">
                    <form method="POST" action="/settings/update/bookmark">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="bookmark_per_page">Bookmarks Per Page:</label>
                            <input type="number" class="form-control @error('bookmark_per_page') is-invalid @enderror"
                                id="bookmark_per_page" name="bookmark_per_page" value="{{$user->bookmark_per_page}}">
                            <small class="form-text text-muted">Enter a value between 1 and 20.</small>
                            @error('bookmark_per_page')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bookmark_return">Edit on Save:</label>
                            <select class="form-control @error('bookmark_return') is-invalid @enderror"
                                id="bookmark_return" name="bookmark_return">
                                <option value="0" @if ($user->bookmark_return === 0) selected @endif>Off</option>
                                <option value="1" @if ($user->bookmark_return === 1) selected @endif>On</option>
                            </select>
                            <small class="form-text text-muted">Switch to editing after a bookmark is created.</small>
                            @error('bookmark_return')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                    <form method="POST" action="/settings/update/account">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="user_email">Your Email:</label>
                            <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email"
                                value="{{$user->email}}">
                            @error('user_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Email</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection