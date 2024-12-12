<form class="form-default form-create-topic" wire:submit.prevent="submit">
    <div class="form-group">
        <label for="title">Judul Topik</label>
        <div class="tt-value-wrapper">
            <input type="text" class="form-control" id="title" placeholder="Judul topik Anda" wire:model="title">
        </div>
        @error('title')
            <div style="color: red;">{{ $message }}</div>
        @else
            <div class="tt-note">
                Deskripsikan topik Anda dengan baik, sambil menjaga subjek tetap sesingkat mungkin.
            </div>
        @enderror
    </div>
    <div class="pt-editor">
        <h6 class="pt-title">Konten</h6>
        <div class="form-group">
            <livewire:jodit-text-editor wire:model="content" />
            @error('content')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="category_id">Kategori</label>
                <select class="form-control" id="category_id" wire:model="category_id">
                    <option>Pilih</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-auto ml-md-auto">
                <button type="submit" class="btn btn-secondary btn-width-lg">Buat Topik</button>
            </div>
        </div>
    </div>
</form>
