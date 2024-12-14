@extends('dashboard.layouts.main')


@section('header')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>{{ $title }}</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Profil Pengguna</h4>

                    <div class="text-center">
                        @if (auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Photo"
                                class="rounded-circle mb-3" width="150" height="150">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Profile Photo" class="rounded-circle mb-3"
                                width="150" height="150">
                        @endif
                        <h5>{{ auth()->user()->name }}</h5>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                        <p>{{ auth()->user()->bio ?? 'Tidak ada biodata' }}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Formulir Ubah</h4>

                    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="bio">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio">{{ old('bio', auth()->user()->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="profile_picture">Foto Profil</label>
                            <input type="file" class="form-control @error('profile_picture') is-invalid @enderror"
                                id="profile_picture" name="profile_picture">
                            @error('profile_picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                id="current_password" name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <p class="text-info mt-3">*Abaikan foto profil dan password jika tidak ingin mengubahnya</p>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3">Ubah Profil</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
