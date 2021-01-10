<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto ">
        <li class="nav-item  no-arrow ">
            <a class="nav-link text-primary" href="{{route('profile', ['id'=>Auth::user()->id])}}" >
                <i class="fas fa-fw fa-cog"></i>
                <span>{{Auth::user()->name}}</span>
            </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item  no-arrow">
            <form action="{{route('logout')}}" method="post" class="nav-link">
                @csrf
            <button class="btn  text-primary" type="submit" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                Logout
            </button>
            </form>
        </li>
    </ul>
</nav>