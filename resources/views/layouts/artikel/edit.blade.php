@extends('layouts.user.index')

@section('title')
	<title>Magang.com - Edit {{ $artikel->judul }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{ $artikel->judul }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('artikel.index')}}">Artikel</a></li>
            <li class="breadcrumb-item active">Edit {{ $artikel->judul }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">


      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Edit Artikel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('artikel.update', $artikel->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="judul">Judul Artikel</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" value="{{ $artikel->judul }}" required>
                  <p class="text-danger">{{ $errors->first('judul') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="uraian">Uraian Artikel</label>
                  <textarea id="summernote" name="uraian" required>{{ $artikel->uraian }}</textarea>
                  <p class="text-danger">{{ $errors->first('uraian') }}</p>
                </div>

                <div class="form-group">
                  <label class="warnaAbu1" for="image">Screenshot</label>
                  <center>
                    <hr>
                    <img src="{{ asset('storage/artikel/' . $artikel->image) }}" width="200px" height="200px" alt="{{ $artikel->judul }}">
                    <p>Biarkan kosong jika tidak ingin mengganti gambar</p>
                    <hr>
                  </center>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image" name="image" value="{{ asset('storage/artikel/' . $artikel->image) }}">
                    <label class="custom-file-label" for="customFile">Screenshot</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Detail Artikel</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h3><strong>{{ $artikel->judul }}</strong></h3>
                    <p class="tgl-dibuat-1"><strong>Nama uploader : </strong>{{ $artikel->name }}</p>
                    <p class="wkt-dibuat-1"><strong>Tanggal upload : </strong>{{ $artikel->tanggal_posting }}</p>
                    <hr>
                    <img src="{{ asset('storage/artikel/' . $artikel->image) }}" width="500px" height="300px" alt="{{ $artikel->judul }}">
                    <hr>
                  </center>
                  <p><strong>Uraian :</strong></p>
                  <p>{!! $artikel->uraian !!}</p>
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