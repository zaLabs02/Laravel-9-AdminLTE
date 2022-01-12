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
                        <a href="{{route('home')}}">Beranda</a>
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
                                @if(session('status'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                                    {{ session('status') }}
                                </div>
                                @endif
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('profile.update',['type'=>'change_profile']) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Informasi Data Diri</h3>

                                                    <div class="card-tools">
                                                        <button
                                                            type="button"
                                                            class="btn btn-tool"
                                                            data-card-widget="collapse"
                                                            title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputName">Nama</label>
                                                        <input
                                                            type="text"
                                                            id="inputName"
                                                            name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="Masukkan Nama"
                                                            value="{{ Auth::user()->name }}"
                                                            required="required"
                                                            autocomplete="name">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email</label>
                                                        <input
                                                            type="email"
                                                            id="inputEmail"
                                                            name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Masukkan Email"
                                                            value="{{ Auth::user()->email }}"
                                                            required="required"
                                                            autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputFoto">Foto Profil</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                @if (Auth::user()->user_image)
                                                                <img
                                                                    class="elevation-3"
                                                                    id="prevImg"
                                                                    src="{{ Auth::user()->user_image }}"
                                                                    width="150px"/>
                                                                @else
                                                                <img
                                                                    class="elevation-3"
                                                                    id="prevImg"
                                                                    src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                                                                    width="80px"/>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input
                                                                    type="file"
                                                                    id="inputFoto"
                                                                    name="user_image"
                                                                    accept="image/*"
                                                                    class="form-control @error('user_image') is-invalid @enderror"
                                                                    placeholder="Upload foto profil">
                                                            </div>
                                                        </div>

                                                        @error('user_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row" style="margin:10px">
                                                    <div class="col-12">
                                                        <input type="submit" value="Ubah Akun" class="btn btn-primary float-right">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('profile.update',['type'=>'change_password']) }}" method="post">
                                            @csrf
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Password</h3>

                                                    <div class="card-tools">
                                                        <button
                                                            type="button"
                                                            class="btn btn-tool"
                                                            data-card-widget="collapse"
                                                            title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input
                                                            id="password"
                                                            type="password"
                                                            placeholder="Kata Sandi"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password"
                                                            required="required"
                                                            autocomplete="new-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password-confirm">Konfirmasi Password</label>
                                                        <input
                                                            placeholder="Ketik ulang kata sandi"
                                                            id="password-confirm"
                                                            type="password"
                                                            class="form-control"
                                                            name="password_confirmation"
                                                            required="required"
                                                            autocomplete="new-password">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin:10px">
                                                    <div class="col-12">
                                                        <input type="submit" value="Simpan Perubahan Password" class="btn btn-warning float-right">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
@section('script_footer')
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
