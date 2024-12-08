@extends('dashboard.layouts.main')

@section('content')
    <div class="card" style="margin-top: 125px;">
        <div class="card-body">
            <h1 class="card-title mb-3">{{ $post->title }}</h1>
            <div class="d-flex align-items-center mb-3">
                @if ($post->user->profile_picture)
                    <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="{{ $post->user->name }}"
                        class="rounded-circle" width="50" height="50">
                @else
                    <img src="https://via.placeholder.com/50" alt="{{ $post->user->name }}" class="rounded-circle"
                        width="50" height="50">
                @endif
                <p class="card-text ms-3">Penulis: {{ $post->user->name }}</p>
            </div>
            <p class="card-text">Kategori: {{ $post->category->name }}</p>
            <p class="card-text">{{ $post->created_at->format('d M Y') }}</p>

            <p>{{ $post->content }}</p>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('dashboard.posts.index') }}" class="btn btn-primary mx-1">Kembali</a>
                <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-1">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
