<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('personal.main.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image h-100">
                <img src="{{ isset(auth()->user()->photo) ? asset('storage/' . auth()->user()->photo) : asset('storage/images/none.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('personal.user.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>--}}

        <div class="d-flex justify-content-start align-items-center mt-3 mb-3 pl-2" style="height: 50px">
            <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : ''}}"
                 alt="" class="h-100" style="border-radius: 50%; width: 50px">
            <a href="{{ route('personal.user.edit') }}" class="ml-2">{{ auth()->user()->name }}</a>
        </div>
        {{--<!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('personal.like.index') }}" class="nav-link">
                        <i class="fas fa fa-heart nav-icon"></i>
                        <p>Likes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comment.index') }}" class="nav-link">
                        <i class="fas fa fa-comment nav-icon"></i>
                        <p>Comments</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
