<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <a class="toggle-mobile-menu" href="#">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-menu_icon"></use>
                    </svg>
                </a>

                <div class="tt-logo">
                    <a href="{{ route('home') }}"><img src="/assets/logo/logo-transparent.png" alt="Logo"></a>
                </div>

                <div class="tt-desktop-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}"><span>Beranda</span></a></li>
                            <li><a href="{{ route('categories.index') }}"><span>Kategori</span></a></li>
                            <li><a href="{{ route('about-us') }}"><span>Tentang Kami</span></a></li>
                        </ul>
                    </nav>
                </div>

                <livewire:app.navbar-search />

            </div>
            <div class="col-auto ml-auto">
                <div class="tt-account-btn">
                    @if (auth()->check())
                        <div class="tt-user-info d-flex justify-content-center align-items-center">
                            <div class="tt-avatar-icon tt-size-md d-flex align-items-center">
                                <a href="{{ route('profile.index') }}">
                                    <i class="tt-icon">
                                        @if (auth()->user()->profile_picture)
                                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                                alt="{{ auth()->user()->name }}" class="img-fluid"
                                                style="width: 40px; height: 40px; border-radius: 50%;">
                                        @else
                                            @php
                                                $letter = strtolower(auth()->user()->name[0]);
                                            @endphp
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-ava-{{ $letter }}"></use>
                                            </svg>
                                        @endif
                                    </i>
                                </a>
                            </div>
                            <a href="{{ route('profile.index') }}">
                                <h4>{{ auth()->user()->name }}</h4>
                            </a>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
