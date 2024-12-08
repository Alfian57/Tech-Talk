@include('app.components.head')

<body>
    @include('sweetalert::alert')

    <!-- tt-mobile menu -->
    <nav class="panel-menu" id="mobile-menu">
        <ul>

        </ul>
        <div class="mm-navbtn-names">
            <div class="mm-closebtn">
                Close
                <div class="tt-icon">
                    <svg>
                        <use xlink:href="#icon-cancel"></use>
                    </svg>
                </div>
            </div>
            <div class="mm-backbtn">Back</div>
        </div>
    </nav>
    <main id="tt-pageContent" class="tt-offset-none">
        <div class="container">
            <div class="tt-loginpages-wrapper">
                @yield('content')
            </div>
        </div>
    </main>

    @include('app.components.scripts')
</body>

</html>
