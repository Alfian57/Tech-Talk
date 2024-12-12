@extends('app.layouts.main')

@push('styles')
    <!-- Include Jodit CSS Styling -->
    <link rel="stylesheet" href="//unpkg.com/jodit@4.1.16/es2021/jodit.min.css">

    <!-- Include the Jodit JS Library -->
    <script src="//unpkg.com/jodit@4.1.16/es2021/jodit.min.js"></script>
@endpush

@section('content')
    <div class="tt-wrapper-inner mt-3">
        <h1 class="tt-title-border">
            Buat Topik Baru
        </h1>
        <livewire:app.post-form />
    </div>
@endsection
