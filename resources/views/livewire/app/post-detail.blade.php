@push('styles')
    <style>
        .post-detail {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .post-detail div {
            order: 1;
        }

        .post-detail a {
            order: 2;
        }

        .tt-avatar-title {
            padding-top: 0;
        }

        @media (max-width: 767px) {

            .post-detail {
                flex-direction: column !important;
            }

            .post-detail div {
                order: 2;
                display: flex;
                align-items: center;
                align-self: flex-start;
                padding-top: 15px;
            }

            .post-detail a {
                order: 1;
                display: flex;
                align-items: center;
                align-self: flex-end;
            }

            .tt-avatar-title {
                padding-top: 7px;
            }
        }
    </style>
@endpush

<div class="tt-single-topic-list pt-3">
    <div class="tt-item">
        <div class="tt-single-topic">
            <div class="tt-item-header">
                <div class="tt-item-info info-top post-detail">
                    <div>
                        <div class="tt-avatar-icon">
                            @if ($post->user->profile_picture)
                                <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                    alt="{{ $post->user->name }}" class="img-fluid"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                            @else
                                @php
                                    $letter = strtolower($post->user->name[0]);
                                @endphp
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-ava-{{ $letter }}"></use>
                                </svg>
                            @endif
                        </div>
                        <div class="tt-avatar-title">
                            <a href="javascript:void(0);">{{ $post->user->name }}</a>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="tt-info-time">
                        @if ($post->is_pinned)
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-pinned"></use>
                                </svg>
                            </i>
                        @endif
                        @if ($post->is_closed)
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-locked"></use>
                                </svg>
                            </i>
                        @endif
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-time"></use>
                            </svg>
                        </i>
                        <span @if ($post->created_at->diffInMinutes() < 1) wire:poll.1s @endif>
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </a>
                </div>
                <h3 class="tt-item-title">
                    <a href="javascript:void(0);">{{ $post->title }}</a>
                </h3>
                <div class="tt-item-tag">
                    <ul class="tt-list-badge">
                        <li>
                            <a href="javascript:void(0);">
                                <span class="tt-badge">{{ $post->category->name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tt-item-description">
                {!! $post->content !!}
            </div>
            <livewire:app.post-interaction :post="$post" />
        </div>
    </div>

    <livewire:app.comment-form :post="$post" />

    @foreach ($post->comments as $comment)
        <livewire:app.comment-item :post="$post" :comment="$comment" :is_last_comment="$loop->last" :key="$comment->id" />
    @endforeach
</div>
