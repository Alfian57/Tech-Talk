@extends('dashboard.layouts.main')

@section('content')
    <div class="card" style="margin-top: 125px;">
        <div class="card-body">
            <h1 class="card-title mb-3">{{ $report->title }}</h1>
            <div class="d-flex align-items-center mb-3">
                @if ($report->user->profile_picture)
                    <img src="{{ asset('storage/' . $report->user->profile_picture) }}" alt="{{ $report->user->name }}"
                        class="rounded-circle" width="50" height="50">
                @else
                    <img src="https://via.placeholder.com/50" alt="{{ $report->user->name }}" class="rounded-circle"
                        width="50" height="50">
                @endif
                <p class="card-text ms-3">Penulis: {{ $report->user->name }}</p>
            </div>
            <p class="card-text">{{ $report->created_at->format('d M Y') }}</p>

            <p>{{ $report->content }}</p>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('dashboard.reports.index') }}" class="btn btn-primary mx-1">Kembali</a>
                @if ($report->post_id)
                    <a href="{{ route('dashboard.posts.show', $report->post_id) }}" class="btn btn-info mx-1">Lihat
                        Topik</a>
                @endif
            </div>
        </div>
    </div>
@endsection
