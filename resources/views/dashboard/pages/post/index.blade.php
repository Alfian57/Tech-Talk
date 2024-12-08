@extends('dashboard.layouts.main')

@push('scripts')
    <script src="/assets/dashboard/js/pages/datatables.init.js"></script>
@endpush

@section('header')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>{{ $title }}</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Postingan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Daftar Postingan</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Disematkan</th>
                                <th>Dibuka</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->is_pinned ? 'Ya' : 'Tidak' }}</td>
                                    <td>{{ $post->is_closed ? 'Tidak' : 'Ya' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('dashboard.posts.show', $post->id) }}"
                                            class="btn btn-primary btn-sm me-2">Detail</a>
                                        @if ($post->is_pinned)
                                            <form action="{{ route('dashboard.posts.unpin', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm me-2">Lepas
                                                    Sematan</button>
                                            </form>
                                        @else
                                            <form action="{{ route('dashboard.posts.pin', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm me-2">Sematkan</button>
                                            </form>
                                        @endif

                                        @if ($post->is_closed)
                                            <form action="{{ route('dashboard.posts.open', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm">Buka</button>
                                            </form>
                                        @else
                                            <form action="{{ route('dashboard.posts.close', $post->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary btn-sm">Tutup</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
