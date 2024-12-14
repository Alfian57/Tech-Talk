<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <div class="navbar-brand-box d-flex align-items-center justify-content-center">
                <a href="{{ route('dashboard.index') }}"
                    class="logo logo-light d-flex align-items-center justify-content-center">
                    <span class="logo-sm d-flex align-items-center">
                        <img src="/assets/logo/logo-transparent.png" alt="Logo" height="30">
                    </span>
                    <h3>{{ config('app.name') }}</h3>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>


        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="/assets/dashboard/images/users/avatar-7.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('dashboard.profile.index') }}">
                        <i class="mdi mdi-account-circle font-size-16 align-middle me-1"></i> Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Keluar
                        </button>
                    </form>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-cog-outline font-size-20"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
