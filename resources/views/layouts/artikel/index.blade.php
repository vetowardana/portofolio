@extends('layouts.user.index')

@section('title')
	<title>My Portofolio - Artikel</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Artikel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Artikel</li>
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
              <h3 class="card-title">Buat Artikel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="judul">Judul Artikel</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Artikel" value="{{ old('judul') }}" required>
                  <p class="text-danger">{{ $errors->first('judul') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="uraian">Uraian Artikel</label>
                  <textarea id="summernote" name="uraian" required>{{ old('uraian') }}</textarea>
                  <p class="text-danger">{{ $errors->first('uraian') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="image">Screenshot</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Screenshot</label>
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
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Tabel lowongan -->
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Artikel Dibuat</h3>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Screenshot</th>
                        <th>Judul Artikel</th>
                        <th>Nama Pemosting</th>
                        <th>Tanggal Posting</th>
                        @if($id)
                        <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($artikel as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('storage/artikel/' . $p->image) }}" style="width: 100px;"></td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->tanggal_posting }}</td>
                        @if($id)
                        <td>
                          <a href="{{route('artikel.edit', $p->id)}}" class="btn btn-info btn-sm">Edit</a>
                          <form action="{{route('artikel.destroy', $p->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                        </td>
                        @endif
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