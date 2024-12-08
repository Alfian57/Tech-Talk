@include('app.components.head')

<body>
    @include('sweetalert::alert')
    @include('app.components.mobile-menu')
    @include('app.components.navbar')

    @yield('body-init')

    <main id="tt-pageContent" class="tt-offset-small">
        @yield('page-header')
        <div class="container">
            @yield('content')
        </div>
    </main>

    @if (auth()->check())
        <a href="{{ route('posts.create') }}" class="tt-btn-create-topic">
            <span class="tt-icon">
                <svg>
                    <use xlink:href="#icon-create_new"></use>
                </svg>
            </span>
        </a>
    @endif

    @include('app.components.scripts')
</body>

</html>
