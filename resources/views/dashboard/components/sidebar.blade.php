<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name }}</h5>
                    <span class="font-size-13 text-white-50">{{ ucfirst(auth()->user()->role) }}</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Menu Utama</li>
                <li class="{{ request()->is('dashboard/users*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.users.index') }}" class="waves-effect">
                        <i class="dripicons-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="{{ request()->is('dashboard/categories*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.categories.index') }}" class="waves-effect">
                        <i class="dripicons-tags"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="{{ request()->is('dashboard/posts*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.posts.index') }}" class="waves-effect">
                        <i class="dripicons-message"></i>
                        <span>Topik</span>
                    </a>
                </li>
                <li class="{{ request()->is('dashboard/reports*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.reports.index') }}" class="waves-effect">
                        <i class="dripicons-document"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
