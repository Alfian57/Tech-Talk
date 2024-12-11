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
            @include('app.components.home.post-list-item', [
                'user_name' => $post->user->name,
                'user_profile_picture' => $post->user->profile_picture,
                'post' => $post,
                'is_pinned' => true,
            ])
        @endforeach

        @foreach ($posts as $post)
            @include('app.components.home.post-list-item', [
                'user_name' => $post->user->name,
                'user_profile_picture' => $post->user->profile_picture,
                'post' => $post,
                'is_pinned' => false,
            ])
        @endforeach

        @if ($pinnedPosts->isEmpty() && $posts->isEmpty())
            @include('app.components.no-data')
        @endif


        <div class="tt-row-btn">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
