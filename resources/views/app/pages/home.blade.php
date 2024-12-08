@extends('app.layouts.main')

@section('content')
    <div class="tt-topic-list">

        @if (!auth()->check())
            <div class="tt-item tt-item-popup mb-3 mt-5">
                <div class="tt-col-message">
                    Sepertinya Anda baru di sini. Daftar gratis, belajar dan berkontribusi.
                </div>
                <div class="tt-col-btn">
                    <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Daftar</a>
                    <button type="button" class="btn-icon">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-cancel"></use>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="tt-list-header">
                <div class="tt-col-topic">Topik</div>
                <div class="tt-col-category">Kategori</div>
                <div class="tt-col-value hide-mobile">Suka</div>
                <div class="tt-col-value hide-mobile">Balasan</div>
                <div class="tt-col-value">Aktivitas</div>
            </div>
        @else
            <div class="mt-5"></div>
        @endif



        @foreach ($pinnedPosts as $post)
            <div class="tt-item d-flex align-items-center">
                <div class="tt-col-avatar d-flex justify-content-center align-items-center">
                    <svg class="tt-icon">
                        @if ($post->user->profile_picture)
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="{{ $post->user->name }}"
                                class="img-fluid" style="width: 50px; height: 50px; border-radius: 50%;">
                        @else
                            @php
                                $letter = strtolower($post->user->name[0]);
                            @endphp
                            <use xlink:href="#icon-ava-{{ $letter }}"></use>
                        @endif
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title">
                        <a href="{{ route('posts.index', $post->id) }}" class="d-flex align-items-center">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-pinned"></use>
                            </svg>
                            @if ($post->is_closed)
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-verified"></use>
                                </svg>
                            @endif
                            {{ $post->title }}
                        </a>
                    </h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value">1h</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category">
                    <span class="tt-badge">{{ $post->category->name }}</span>
                </div>
                <div class="tt-col-value hide-mobile">{{ $post->reactions_count }}</div>
                <div class="tt-col-value tt-color-select hide-mobile">{{ $post->comments_count }}</div>
                <div class="tt-col-value hide-mobile">{{ $post->created_at->diffForHumans() }}</div>
            </div>
        @endforeach

        @foreach ($posts as $post)
            <div class="tt-item d-flex align-items-center">
                <div class="tt-col-avatar d-flex justify-content-center align-items-center">
                    <svg class="tt-icon">
                        @if ($post->user->profile_picture)
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                alt="{{ $post->user->name }}" class="img-fluid"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        @else
                            @php
                                $letter = strtolower($post->user->name[0]);
                            @endphp
                            <use xlink:href="#icon-ava-{{ $letter }}"></use>
                        @endif
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title">
                        <a href="{{ route('posts.index', $post->id) }}">
                            @if ($post->is_closed)
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-verified"></use>
                                </svg>
                            @endif
                            {{ $post->title }}
                        </a>
                    </h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value">1h</div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category">
                    <span class="tt-badge">{{ $post->category->name }}</span>
                </div>
                <div class="tt-col-value hide-mobile">{{ $post->reactions_count }}</div>
                <div class="tt-col-value tt-color-select hide-mobile">{{ $post->comments_count }}</div>
                <div class="tt-col-value hide-mobile">{{ $post->created_at->diffForHumans() }}</div>
            </div>
        @endforeach

        @if ($pinnedPosts->isEmpty() && $posts->isEmpty())
            @include('app.components.no-data')
        @endif


        <div class="tt-row-btn">
            <button type="button" class="btn-icon js-topiclist-showmore">
                {{ $posts->links() }}
            </button>
        </div>
    </div>
@endsection
