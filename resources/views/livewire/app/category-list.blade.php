<div>
    <div class="tt-categories-title pt-5">
        <div class="tt-title">List Kategori</div>
        <div class="tt-search">
            <form class="search-wrapper">
                <div class="search-form">
                    <input type="text" class="tt-search__input" placeholder="Cari Kategori" wire:model.live="search">
                    <button class="tt-search__btn" type="submit">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-search"></use>
                        </svg>
                    </button>
                    <button class="tt-search__close">
                        <svg class="tt-icon">
                            <use xlink:href="#icon-cancel"></use>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="tt-categories-list">
        <div class="row">
            @foreach ($categories as $category)
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
                            <a href="javascript:void(0);" class="tt-btn-icon" wire:click="follow({{ $category->id }})">
                                @if ($category->users->where('id', auth()->id())->count())
                                    <i class="tt-icon fill">
                                        <svg>
                                            <use xlink:href="#icon-favorite" fill="currentColor"></use>
                                        </svg>
                                    </i>
                                @else
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-favorite"></use>
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $categories->links() }}
        </div>
        @if ($categories->isEmpty())
            @include('app.components.no-data')
        @endif
    </div>
</div>
