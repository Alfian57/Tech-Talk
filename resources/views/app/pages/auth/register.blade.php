@extends('app.layouts.auth')

@section('content')
    <div class="tt-loginpages">
        <a href="{{ route('home') }}" class="tt-block-title">
            <div class="d-flex justify-content-center">
                <img src="/assets/logo/logo-transparent.png" alt="Logo" width="100">
            </div>
            <div class="tt-title">
                Welcome to TechTalk
            </div>
            <div class="tt-description">
                Daftar untuk membuka kekuatan sejati komunitas.
            </div>
        </a>
        <form method="POST" action="{{ route('register') }}" class="form-default">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="example@example.com" value="{{ old('email') }}">
                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="************">
                @error('password')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                    placeholder="************">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-block">Daftar</button>
            </div>
            <p>Sudah punya akun? <a href="{{ route('login') }}" class="tt-underline">Masuk Disini</a></p>
            <div class="tt-notes">
                Dengan mendaftar, saya setuju dengan
                <a href="#" class="tt-underline">Syarat Penggunaan</a> dan <a href="#"
                    class="tt-underline">Kebijakan Privasi</a> TechTalk.
            </div>
        </form>
    </div>
@endsection
