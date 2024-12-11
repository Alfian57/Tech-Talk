@props(['is_last_comment' => false, 'comment'])

<div @class([
    'tt-item',
    'tt-wrapper-success' => $comment->is_best,
    'mt-5' => $is_last_comment,
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
                    <span @if ($comment->created_at->diffInMinutes() < 1) wire:poll.1s @endif>
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </a>
            </div>
        </div>
        <div class="tt-item-description">
            {{ $comment->content }}
        </div>
        <div class="tt-item-info info-bottom">
            <a href="javascript:void(0);" class="tt-icon-btn" wire:click="like({{ $comment->id }})">
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
            <a href="javascript:void(0);" class="tt-icon-btn" wire:click="dislike({{ $comment->id }})">
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
                wire:click="report({{ $comment->id }})">
                <i class="tt-icon">
                    <svg>
                        <use xlink:href="#icon-flag"></use>
                    </svg>
                </i>
                <span class="tt-text">Laporkan</span>
            </a>
            @if (auth()->id() === $comment->user_id || auth()->user()?->role === 'moderator')
                @if (!$comment->is_best)
                    <a href="javascript:void(0);" wire:click="toggleAsBest('{{ $comment->id }}')">
                        <span style="color: green; margin-left: 30px; font-weight: bold;">Jadikan Jawaban
                            Terbaik
                        </span>
                    </a>
                @else
                    <a href="javascript:void(0);" wire:click="toggleAsBest('{{ $comment->id }}')">
                        <span style="color: orange; margin-left: 30px; font-weight: bold;">Batalkan Jawaban
                            Terbaik
                        </span>
                    </a>
                @endif
            @endif
            @if (auth()->user()?->role === 'moderator')
                <a href="javascript:void(0);" wire:click="delete({{ $comment->id }})">
                    <span style="color: red; margin-left: 30px; font-weight: bold;">Hapus Komentar</span>
                </a>
            @endif
        </div>
    </div>
</div>
