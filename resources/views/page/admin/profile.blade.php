@extends('layouts.base_admin.base_dashboard') @section('judul', 'Halaman
Profil') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if (Auth::user()->user_image)
                            <img
                                src="{{ Auth::user()->user_image }}"
                                class="profile-user-img img-fluid img-circle"
                                alt="User Imagess">
                            @else
                            <img
                                src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                                class="profile-user-img img-fluid img-circle"
                                alt="User Imagess">
                            @endif
                            {{-- <img
                                class="profile-user-img img-fluid img-circle"
                                src="../../dist/img/user4-128x128.jpg"
                                alt="User profile picture"> --}}
                        </div>

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profil" data-toggle="tab">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updateData" data-toggle="tab">Ubah Profil</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="profil">
                                <b>Nama:</b>
                                <br/>
                                {{Auth::user()->name}}
                                <br><br>

                                <b>Email:</b><br>
                                {{Auth::user()->email}}

                                <br>
                                <br>
                                <b>Username:</b><br>
                                <i>Please have customization as needed</i>

                                <br>
                                <br>
                                <b>No Handphone</b>
                                <br>
                                <i>Please have customization as needed</i>

                                <br><br>
                                <b>Alamat</b>
                                <br>
                                <i>Please have customization as needed</i>

                                <br>
                                <br>
                                <b>Roles:</b>
                                <br>
                                <i>Please have customization as needed</i>

                                <br>
                                <br>
                                <b>Bergabung pada:</b>
                                <br>
                                @DateIndo(Auth::user()->created_at)
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="updateData">
                                <form
                                    class="form-horizontal"
                                    method="post"
                                    action="{{ route('profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="inputName"
                                                placeholder="Masukkan Nama"
                                                value="{{ Auth::user()->name }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail"
                                                placeholder="Masukkan Email"
                                                value="{{ Auth::user()->email }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password
                                            <b>(baru)</b>
                                        </label>
                                        <div class="col-sm-10">
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password"
                                                placeholder="Masukkan Password baru">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-10">
                                            <input
                                                type="password"
                                                name="password_confirmation"
                                                class="form-control"
                                                id="password-confirm"
                                                placeholder="Ketik ulang kata sandi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Foto Profil</label>
                                        <div class="col-sm-10">
                                            @if (Auth::user()->user_image)
                                            <img src="{{ Auth::user()->user_image }}" width="200px">
                                            <small>
                                                <b>Jika anda mengupload file baru, maka yang lama kehapus.</b>
                                            </small>
                                            @endif
                                            <input
                                                type="file"
                                                name="user_image"
                                                class="form-control @error('user_image') is-invalid @enderror">
                                            <br>
                                            @error('user_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-danger">{{ $errors->first('gambar_buku') }}</small>
                                            {{-- <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Masukkan Nama" value="{{ Auth::user()->name }}"> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
