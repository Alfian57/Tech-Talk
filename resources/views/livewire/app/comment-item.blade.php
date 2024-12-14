@props(['is_last_comment' => false, 'comment'])

@once
    @push('styles')
        <style>
            .tt-item-description iframe {
                width: 100% !important;
                aspect-ratio: 1/1 !important;
            }

            .comment-header {
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .comment-header .comment-detail {
                order: 1;
            }

            .comment-header .comment-info {
                order: 2;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            @media(max-width: 767px) {
                .comment-header {
                    flex-direction: column !important;
                }

                .comment-header .comment-detail {
                    order: 2;
                    display: flex;
                    align-items: center;
                    align-self: flex-start;
                    padding-top: 15px;
                }

                .comment-header .comment-info {
                    order: 1;
                    align-items: center;
                    align-self: flex-end;
                }
            }
        </style>
    @endpush
@endonce

<div @class([
    'tt-item',
    'tt-wrapper-success' => $comment->is_best,
    'mt-5' => $is_last_comment,
])>
    <div class="tt-single-topic">
        <div class="tt-item-header pt-noborder">
            <div class="tt-item-info info-top comment-header">
                <div class="comment-detail">
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
                    </div>
                </div>
                <div class="comment-info">
                    @if ($comment->is_best)
                        <span class="tt-color13 tt-badge">jawaban terbaik</span>
                    @endif
                    <a href="javascript:void(0);" class="tt-info-time">
                        @if (auth()->id() === $comment->user_id)
                            <i class="tt-icon" wire:click="toggleEdit">
                                <svg>
                                    <use xlink:href="#icon-pencil"></use>
                                </svg>
                            </i>
                        @endif
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
        </div>
        <div class="tt-item-description">
            @if ($isEdit)
                <form wire:submit.prevent="edit">
                    <livewire:jodit-text-editor wire:model="new_comment" />
                    @error('new_comment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-secondary btn-width-lg">Ubah</button>
                    </div>
                </form>
            @else
                {!! $comment->content !!}
            @endif
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
                <a href="javascript:void(0);" class="tt-icon-btn" wire:click="toggleAsBest('{{ $comment->id }}')">
                    @if (!$comment->is_best)
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-favorite"></use>
                            </svg>
                        </i>
                        <span class="tt-text">Jawaban Terbaik</span>
                    @else
                        <i class="tt-icon">
                            <svg>
                                <use xlink:href="#icon-unfavorite"></use>
                            </svg>
                        </i>
                        <span class="tt-text">Batalkan yang Terbaik</span>
                    @endif
                </a>
            @endif
            @if (auth()->user()?->role === 'moderator' || auth()->id() === $comment->user_id)
                <a href="javascript:void(0);" class="tt-icon-btn" wire:click="delete({{ $comment->id }})">
                    <i class="tt-icon">
                        <svg>
                            <use xlink:href="#icon-cancel"></use>
                        </svg>
                    </i>
                    <span class="tt-text">Hapus Komentar</span>
                </a>
            @endif
        </div>
    </div>
</div>
