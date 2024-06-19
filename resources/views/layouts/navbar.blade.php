<!-- TopBar -->
<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('img/boy.png')}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">
                    <b>{{ Auth::user()->name }}</b> <i class="fa fa-angle-down"></i>
                </span>
            </a>
            <div class="user-menu dropdown-menu">
                <a href="{{ route('logout') }}" class="dropdown-item"onclick="event.preventDefault();
                document.getElementById('logout.form').submit();">{{ _('Logout') }}</a>
                <form id="logout.form" action="{{route ('logout')}}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
    </ul>
</nav>
<!-- Topbar -->
