@props(['user_profile_picture', 'user_name', 'post', 'is_pinned'])

<div class="tt-item d-flex align-items-center">
    <div class="tt-col-avatar d-flex justify-content-center align-items-center">
        <svg class="tt-icon">
            @if ($user_profile_picture)
                <img src="{{ asset('storage/' . $user_profile_picture) }}" alt="{{ $user_name }}" class="img-fluid"
                    style="width: 50px; height: 50px; border-radius: 50%;">
            @else
                @php
                    $letter = strtolower($user_name[0]);
                @endphp
                <use xlink:href="#icon-ava-{{ $letter }}"></use>
            @endif
        </svg>
    </div>
    <div class="tt-col-description">
        <h6 class="tt-title">
            <a href="{{ route('posts.index', $post->id) }}" class="d-flex align-items-center">
                @if ($is_pinned)
                    <svg class="tt-icon">
                        <use xlink:href="#icon-pinned"></use>
                    </svg>
                @endif
                @if ($post->is_closed)
                    <svg class="tt-icon">
                        <use xlink:href="#icon-locked"></use>
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
