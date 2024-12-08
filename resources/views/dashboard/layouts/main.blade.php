@include('dashboard.components.head')

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('dashboard.components.navbar')
        @include('dashboard.components.sidebar')

        <div class="main-content">

            <div class="page-content">

                @yield('header')

                <div class="container-fluid">
                    <div class="page-content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('dashboard.components.footer')
        </div>
    </div>

    @include('dashboard.components.theme')

    <div class="rightbar-overlay"></div>

    @include('dashboard.components.scripts')


</body>

</html>
