@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Lupa
Password') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">
            <b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Anda lupa kata sandi Anda? Di sini Anda dapat dengan
                mudah mengambil kata sandi baru.</p>

            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email"
                        name="email"
                        value="{{ old('email') }}"
                        required="required"
                        autocomplete="email"
                        autofocus="autofocus">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Minta kata sandi baru</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </p>
            <p class="mb-0">
                Baru pertama kali?
                <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
