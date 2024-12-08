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
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('dashboard.users.create') }}" class="btn btn-success">Tambah Pengguna</a>
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

                    <h4 class="header-title mb-3">Daftar Pengguna</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ $user->is_banned ? 'Diblokir' : 'Aktif' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                            class="btn btn-primary btn-sm me-2">Ubah</a>
                                        <a href="{{ route('dashboard.users.show', $user->id) }}"
                                            class="btn btn-info btn-sm me-2">Aktivitas</a>
                                        @if ($user->is_banned)
                                            <form action="{{ route('dashboard.users.unbanned', $user->id) }}" method="POST"
                                                class="me-2">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Buka Blokir</button>
                                            </form>
                                        @else
                                            <form action="{{ route('dashboard.users.banned', $user->id) }}" method="POST"
                                                class="me-2">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">Blokir</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
