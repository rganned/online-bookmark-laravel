@extends('dashboard.layouts.app')

@section('page_title', 'All Bookmarks')

@section('content')
<div class="container-fluid">
	<div class="section-list">
		<div class="section page-header">
			<h5 class="heading">All Bookmarks</h5>
		</div>
		@if(count($bookmarks) === 0)
		<div class="section">
			<span>You don't have any bookmarks!</span>
		</div>
		@else
		@foreach($bookmarks as $bookmark)
		<div class="section bookmark">
			<div class="row align-items-center">
				<div class="col-lg-10">
					<div class="bookmark-container">
						<img src="https://www.google.com/s2/favicons?domain={{$bookmark->url}}"
							alt="{{$bookmark->name}}" class="favicon" width="16" height="16">
						<h6 class="title">
							<a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
						</h6>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="bookmark-action">
						<div class="dropdown">
							<button class="btn btn-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="/bookmarks/edit/{{$bookmark->id}}"><i
										class="fas fa-pen icon-r"></i>Edit</a>
								<a class="dropdown-item" href="/bookmarks/delete/{{$bookmark->id}}"><i
										class="fas fa-trash-alt icon-r"></i>Delete</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="section pagination">
			@if($bookmarks->currentPage() > $bookmarks->onFirstPage())
			<a href="{{$bookmarks->previousPageUrl()}}" class="btn btn-link">&#8592; Previous</a>
			@endif
			@if($bookmarks->currentPage() < $bookmarks->lastPage())
				<a href="{{$bookmarks->nextPageUrl()}}" class="btn btn-link">Next &#8594;</a>
			@endif
		</div>
		@endif
	</div>
</div>
@endsection