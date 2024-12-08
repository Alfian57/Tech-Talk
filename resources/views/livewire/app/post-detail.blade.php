<div class="tt-single-topic-list pt-3">
    <div class="tt-item" @if ($post->created_at->diffInMinutes() < 1) wire:poll.1s @endif>
        <div class="tt-single-topic">
            <div class="tt-item-header">
                <div class="tt-item-info info-top">
                    <div class="tt-avatar-icon">
                        @if ($post->user->profile_picture)
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                alt="{{ $post->user->name }}" class="img-fluid"
                                style="width: 40px; height: 40px; border-radius: 50%;">
                        @else
                            @php
                                $letter = strtolower($post->user->name[0]);
                            @endphp
                            <use xlink:href="#icon-ava-{{ $letter }}"></use>
                        @endif
                    </div>
                    <div class="tt-avatar-title">
                        <a href="javascript:void(0);">{{ $post->user->name }}</a>
                    </div>
                    <a href="javascript:void(0);" class="tt-info-time">
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-time"></use>
                            </svg>
                        </i>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
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
                {{ $post->content }}
            </div>
            <div class="tt-item-info info-bottom">
                <a href="javascript:void(0);" class="tt-icon-btn" wire:click="like('post')">
                    @if ($post->reactions->where('type', 'like')->where('user_id', auth()->id())->count())
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-like" fill="currentColor"></use>
                            </svg>
                        </i>
                    @else
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-like"></use>
                            </svg>
                        </i>
                    @endif

                    <span class="tt-text">
                        {{ $post->reactions->where('type', 'like')->count() }}
                    </span>
                </a>
                <a href="javascript:void(0);" class="tt-icon-btn" wire:click="dislike('post')">
                    @if ($post->reactions->where('type', 'dislike')->where('user_id', auth()->id())->count())
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-dislike" fill="currentColor"></use>
                            </svg>
                        </i>
                    @else
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-dislike"></use>
                            </svg>
                        </i>
                    @endif
                    <span class="tt-text">
                        {{ $post->reactions->where('type', 'dislike')->count() }}
                    </span>
                </a>
                <a href="javascript:void(0);" class="tt-icon-btn" data-toggle="modal" data-target="#reportModal"
                    wire:click="report('{{ $post->id }}', 'post')">
                    <i class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-flag"></use>
                        </svg>
                    </i>
                    <span class="tt-text">Laporkan</span>
                </a>
                <div class="col-separator"></div>
            </div>
        </div>
    </div>

    <div class="tt-item p-3" style="display: flex; justify-content: center">
        @if ($post->is_closed)
            <span>
                Topik ini sudah ditutup
            </span>
        @elseif(auth()->check())
            <span>Ganti Form</span>
        @else
            <span>
                Silahkan <a href="{{ route('login') }}">login</a> untuk memberikan komentar
            </span>
        @endif
    </div>

    @foreach ($post->comments as $comment)
        <div @class([
            'tt-item',
            'tt-wrapper-success' => $comment->is_best,
            'mt-5' => $loop->last,
        ])>
            <div class="tt-single-topic">
                <div class="tt-item-header pt-noborder">
                    <div class="tt-item-info info-top">
                        <div class="tt-avatar-icon">
                            @if ($comment->user->profile_picture)
                                <img src="{{ asset('storage/' . $comment->user->profile_picture) }}"
                                    alt="{{ $comment->user->name }}" class="img-fluid"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                            @else
                                @php
                                    $letter = strtolower($comment->user->name[0]);
                                @endphp
                                <use xlink:href="#icon-ava-{{ $letter }}"></use>
                            @endif
                        </div>
                        <div class="tt-avatar-title">
                            <a href="javascript:void(0);">{{ $comment->user->name }}</a>
                            @if ($comment->is_best)
                                <span class="tt-color13 tt-badge">jawaban terbaik</span>
                            @endif
                        </div>
                        <a href="javascript:void(0);" class="tt-info-time">
                            <i class="tt-icon">
                                <svg>
                                    <use xlink:href="#icon-time"></use>
                                </svg>
                            </i>
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                        </a>
                    </div>
                </div>
                <div class="tt-item-description">
                    {{ $comment->content }}
                </div>
                <div class="tt-item-info info-bottom">
                    <a href="javascript:void(0);" class="tt-icon-btn"
                        wire:click="like('comment', {{ $comment->id }})">
                        @if ($comment->reactions->where('type', 'like')->where('user_id', auth()->id())->count())
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-like" fill="currentColor"></use>
                                </svg>
                            </i>
                        @else
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-like"></use>
                                </svg>
                            </i>
                        @endif
                        <span class="tt-text">
                            {{ $comment->reactions->where('type', 'like')->count() }}
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="tt-icon-btn"
                        wire:click="dislike('comment', {{ $comment->id }})">
                        @if ($comment->reactions->where('type', 'dislike')->where('user_id', auth()->id())->count())
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-dislike" fill="currentColor"></use>
                                </svg>
                            </i>
                        @else
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-dislike"></use>
                                </svg>
                            </i>
                        @endif
                        <span class="tt-text">
                            {{ $comment->reactions->where('type', 'dislike')->count() }}
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="tt-icon-btn" data-toggle="modal" data-target="#reportModal"
                        wire:click="report('{{ $comment->id }}', 'comment')">
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-flag"></use>
                            </svg>
                        </i>
                        <span class="tt-text">Laporkan</span>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
