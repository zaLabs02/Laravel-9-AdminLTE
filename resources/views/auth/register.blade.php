@extends('layouts.base_admin.base_auth')@section('judul', 'Halaman Registrasi') @section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="#">
            <b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Registrasi Akun Baru</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        id="name"
                        type="text"
                        placeholder="Nama Lengkap"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        required="required"
                        autocomplete="name"
                        autofocus="autofocus">
                    {{-- <input type="text" class="form-control"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input
                        id="email"
                        placeholder="Email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required="required"
                        autocomplete="email">
                    {{-- <input type="email" class="form-control" > --}}
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
                        placeholder="Kata Sandi"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required="required"
                        autocomplete="new-password">
                    {{-- <input type="password" class="form-control" > --}}
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
                        placeholder="Ketik ulang kata sandi"
                        id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        required="required"
                        autocomplete="new-password">
                    {{-- <input type="password" class="form-control" > --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        {{-- <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div> --}}
               Sudah punya akun? <a href="{{ route('login') }}" class="text-center">Login</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a> --}}
            </div>


        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
@endsection
