@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Reset
Password') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">
            <b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Anda hanya selangkah lagi dari kata sandi baru Anda,
                pulihkan kata sandi Anda sekarang.</p>

            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3">
                    <input readonly
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email"
                        name="email"
                        value="{{ $email ?? old('email') }}"
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
                <div class="input-group mb-3">
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required="required"
                        autocomplete="new-password"
                        placeholder="{{ __('Password Baru') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required="required"
                    autocomplete="new-password"
                        placeholder="{{ __('Ketik ulang kata sandi') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                Password sudah terubah?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
