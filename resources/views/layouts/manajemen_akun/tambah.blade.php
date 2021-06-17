@extends('layouts.user.index')

@section('title')
	<title>My Portofolio - Manajemen User</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manajemen User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Manajemen User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Tambah User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('manajemenakun.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="name">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                  <p class="text-danger">{{ $errors->first('username') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                  <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="konfirmPass">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="konfirmPass" name="konfirmPass" placeholder="Konfirmasi Password">
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="image">Foto User</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ old('image') }}" required>
                    <label class="custom-file-label" for="customFile">Foto</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- User -->
        @if (session('success'))
            <div class="alert alert-info">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-light">
                <h3 class="card-title">Tabel User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama User</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @forelse ($akun as $a)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td><img src="{{ asset('storage/user/' . $a->image) }}" style="width: 50px;"></td>
                      <td>{{ $a->name }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection