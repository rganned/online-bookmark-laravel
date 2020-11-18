<div id="sidebar-side">
    <div class="sidebar-container">
        <div class="panel close-sec">
            <button type="button" class="close sidebarCollapse" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="panel logo">
            <img src="{{ asset('dashboard/assets/img/logo.png') }}" alt="" width="75" height="31">
        </div>
        <div class="panel menu">
            <h6 class="heading">Menu</h6>
            <nav class="nav flex-column">
                <a class="nav-link" href="/">
                    <div class="icon"><i class="fas fa-bookmark"></i></div>All Bookmarks
                </a>
                <a class="nav-link" href="/settings">
                    <div class="icon"><i class="fas fa-cog"></i></div>Settings
                </a>
                <a class="nav-link" href="/about">
                    <div class="icon"><i class="fas fa-comments"></i></div>About
                </a>
                <a class="nav-link" href="/logout">
                    <div class="icon"><i class="fas fa-sign-out-alt"></i></div>Log out
                </a>
            </nav>
        </div>
        <div class="panel collections">
            <h6 class="heading">Collections<button class="btn btn-link" data-toggle="modal"
                    data-target="#modal_new_collection"><i class="fas fa-plus"></i></button></h6>
            <nav class="nav flex-column">
                @foreach ($collections as $collection)
                <a class="nav-link" href="/collections/{{$collection->id}}">{{ $collection->name }}<span
                        class="badge badge-collection-count">{{ $collection->bookmarks() }}</span></a>
                @endforeach
            </nav>
        </div>
    </div>
</div>