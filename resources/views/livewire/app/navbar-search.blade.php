<div class="tt-search">
    <form class="search-wrapper">
        <div class="search-form">
            <input type="text" class="tt-search__input" placeholder="Cari topik" wire:model.live="search">
            <button class="tt-search__btn" type="submit">
                <svg class="tt-icon">
                    <use xlink:href="#icon-search"></use>
                </svg>
            </button>
            <button class="tt-search__close">
                <svg class="tt-icon">
                    <use xlink:href="#cancel"></use>
                </svg>
            </button>
        </div>
        <div class="search-results" wire:ignore.self>
            <div class="tt-search-scroll">
                <ul>
                    @foreach ($posts as $post)
                        <li>
                            <a href="{{ route('posts.index', $post->id) }}">
                                <h6 class="tt-title">{{ $post->title }}</h6>
                                <div class="tt-description">
                                    {{ $post->category->name }} - {{ $post->user->name }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </form>
</div>
