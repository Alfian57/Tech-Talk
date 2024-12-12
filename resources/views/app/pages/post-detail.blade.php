@extends('app.layouts.main')

@push('styles')
    <!-- Include Jodit CSS Styling -->
    <link rel="stylesheet" href="//unpkg.com/jodit@4.1.16/es2021/jodit.min.css">

    <!-- Include the Jodit JS Library -->
    <script src="//unpkg.com/jodit@4.1.16/es2021/jodit.min.js"></script>
@endpush

@section('body-init')
    <livewire:app.report-modal :currentPost="$post" />
@endsection

@section('content')
    <livewire:app.post-detail :post="$post" />
@endsection
