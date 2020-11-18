<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name') }} - @yield('page_title')</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script>
    
    </script>
</head>

<body style="display: none;">
    <div id="wrapper">
		@include('dashboard.sidebar')
		<div id="header">
			<div class="hamburger">
				<button type="button" class="btn btn-link sidebarCollapse"><i class="fas fa-bars"></i></button>
			</div>
		</div>
        <div id="content-side">
            @yield('content')
            <div class="modals">
                <div class="modal fade" id="modal_new_collection" tabindex="-1" role="dialog"
                    aria-labelledby="modal_new_collection" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create a Collection</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/collections/new">
                                    @csrf
                                    <div class="form-group">
                                        <label>Collection Name:</label>
                                        <input type="text" class="form-control" name="collection_name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('dashboard/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js//bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/93fcdfb910.js"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
</body>

</html>