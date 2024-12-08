@extends('app.layouts.main')

@section('content')
    <div class="tt-wrapper-inner mt-3">
        <h1 class="tt-title-border">
            Buat Topik Baru
        </h1>
        <form class="form-default form-create-topic" method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Judul Topik</label>
                <div class="tt-value-wrapper">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Judul topik Anda"
                        value="{{ old('title') }}">
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
                    <textarea name="content" class="form-control" rows="5" placeholder="Masukan isi postingan">{{ old('content') }}</textarea>
                    @error('content')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="category_id">Kategory</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option>Pilih</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}
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
    </div>
@endsection
