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
                            <li class="breadcrumb-item active">Laporan</li>
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

                    <h4 class="header-title mb-3">Daftar Laporan</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Pengadu</th>
                                <th>Isi</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ Str::limit($item->content, 50) }}</td>
                                    <td>
                                        @if ($item->post_id)
                                            <span class="badge bg-primary">Topik</span>
                                        @else
                                            <span class="badge bg-secondary">Komentar</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('dashboard.reports.show', $item->id) }}"
                                            class="btn btn-primary btn-sm me-2">Detail</a>
                                        <form action="{{ route('dashboard.reports.close', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-danger btn-sm">Tutup</button>
                                        </form>
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
