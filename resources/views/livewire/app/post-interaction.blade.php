@props(['post'])

<div class="tt-item-info info-bottom">
    <a href="javascript:void(0);" class="tt-icon-btn" wire:click="like">
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
    <a href="javascript:void(0);" class="tt-icon-btn" wire:click="dislike">
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
    @if (!$post->is_closed && (auth()->id() === $post->user_id || auth()->user()?->role === 'moderator'))
        <a href="javascript:void(0);" class="tt-icon-btn" wire:click="tooglePostStatus">
            <i class="tt-icon">
                <svg>
                    <use xlink:href="#icon-locked"></use>
                </svg>
            </i>
            <span class="tt-text">Tutup Post</span>
        </a>
    @endif
    @if ($post->is_closed && auth()->id() === $post->user_id)
        <a href="javascript:void(0);" class="tt-icon-btn" wire:click="tooglePostStatus">
            <i class="tt-icon">
                <svg>
                    <use xlink:href="#icon-quote"></use>
                </svg>
            </i>
            <span class="tt-text">Buka Post</span>
        </a>
    @endif
    @if (auth()->user()?->role === 'moderator')
        <a href="javascript:void(0);" class="tt-icon-btn" wire:click="togglePinPost">
            <i class="tt-icon">
                <svg>
                    <use xlink:href="#icon-pinned"></use>
                </svg>
            </i>
            <span class="tt-text">{{ $post->is_pinned ? 'Unpin Post' : 'Pin Post' }}</span>
        </a>
    @endif
    @if (auth()->id() === $post->user_id || auth()->user()?->role === 'moderator')
        <a href="javascript:void(0);" class="tt-icon-btn" wire:click="deletePost">
            <i class="tt-icon">
                <svg>
                    <use xlink:href="#icon-cancel"></use>
                </svg>
            </i>
            <span class="tt-text">Hapus Topik</span>
        </a>
    @endif
    <div class="col-separator"></div>
</div>
