    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-text mx-3"><img class="logo" src="<?php echo url("/"); ?>/images/myvideo.png" style="width: 100%;"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('upload')}}">
                <i class="fas fa-file-upload"></i>
                <span>Upload Video</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item ">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-film"></i>
                <span>All Video</span>
            </a>
        </li>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Album
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{route('create.album')}}">
                <i class="fab fa-hacker-news"></i>
                <span>Create Album</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-th-list"></i>
                <span>List Album</span></a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item bg-warning" href="{{route('list.album')}}">List Album</a>
                    @foreach($albums as $album)
                    <a class="collapse-item" href="{{route('video.album', ['id'=>$album->id])}}">{{$album->name}}</a>
                    @endforeach
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>