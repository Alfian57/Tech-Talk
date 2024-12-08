@extends('app.layouts.main')

@section('body-init')
    <livewire:app.report-modal :currentPost="$post" />
@endsection

@section('content')
    <livewire:app.post-detail :post="$post" />
@endsection
