@extends('app.layouts.main')

@section('body-init')
    <livewire:app.profile-modal />
@endsection

@section('page-header')
    <div class="tt-wrapper-section">
        <div class="container">
            <div class="tt-user-header">
                <div class="tt-col-avatar">
                    <div class="tt-icon">
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
                    </div>
                </div>
                <div class="tt-col-title">
                    <div class="tt-title">
                        <a href="#">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <div class="tt-col-btn">
                    <div class="tt-list-btn">
                        <a href="#" class="tt-btn-icon" id="js-settings-btn">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-settings_fill"></use>
                            </svg>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="tt-tab-wrapper">
        <div class="tt-wrapper-inner">
            <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                <li class="nav-item show">
                    <a class="nav-link active" data-toggle="tab" href="#tt-tab-01" role="tab">
                        <span>Aktivitas</span>
                    </a>
                </li>
                <li class="nav-item tt-hide-md">
                    <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab">
                        <span>Kategori Diikuti</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane tt-indent-none  show active" id="tt-tab-01" role="tabpanel">
                <div class="tt-topic-list">
                    @forelse (auth()->user()->userLogs as $log)
                        <div class="tt-item">
                            <div class="tt-col-description">
                                <h6 class="tt-title">
                                    @switch($log->action)
                                        @case('post-create')
                                            Membuat postingan
                                        @break

                                        @case('post-edit')
                                            Mengedit postingan
                                        @break

                                        @case('post-delete')
                                            Menghapus postingan
                                        @break

                                        @case('comment-create')
                                            Membuat komentar
                                        @break

                                        @case('comment-edit')
                                            Mengedit komentar
                                        @break

                                        @case('comment-delete')
                                            Menghapus komentar
                                        @break

                                        @default
                                            {{ $log->action }}
                                    @endswitch
                                </h6>
                                <div class="tt-col-message">
                                    {{ $log->description }}
                                </div>
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-12">
                                        <div class="tt-value">{{ $log->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-value-large hide-mobile">{{ $log->created_at->diffForHumans() }}</div>
                        </div>
                        @empty
                            @include('app.components.no-data')
                        @endforelse
                    </div>
                </div>
                <div class="tab-pane" id="tt-tab-02" role="tabpanel">
                    <div class="tt-wrapper-inner">
                        <div class="tt-categories-list">
                            <div class="row">
                                @forelse (auth()->user()->categories as $category)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="tt-item">
                                            <div class="tt-item-header">
                                                <ul class="tt-list-badge">
                                                    <li>
                                                        <a href="{{ route('home', ['category' => $category->id]) }}">
                                                            <span class="tt-color01 tt-badge">{{ $category->name }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <h6 class="tt-title">
                                                    <a href="#">Kategori-{{ number_format($category->id) }}</a>
                                                </h6>
                                            </div>
                                            <div class="tt-item-layout">
                                                <div class="innerwrapper">
                                                    {{ Str::limit($category->description, 100, '...') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    @include('app.components.no-data')
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
