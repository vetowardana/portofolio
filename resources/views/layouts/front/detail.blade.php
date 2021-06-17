@extends('layouts.front.index')

@section('title')
    <title>My Portofolio - Veto Wardana Putra</title>
@endsection

@section('content')

<div class="tm-container bg-white">
    <div class="tm-header-stripe w-100"></div>
    <div class="container-fluid">
        <!--Intro-->
        <!-- <section class="row tm-mb-1">
        </section> -->

        <!-- Services -->
        <div class="row mar-top1">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <center>
                  <h3><strong>{{ $artikel->judul }}</strong></h3>
                  <div class="row">
                      <div class="col-md-6"><p class="tgl-dibuat-1"><strong>Nama uploader : </strong>{{ $artikel->name }}</p></div>
                      <div class="col-md-6"><p class="wkt-dibuat-1"><strong>Tanggal upload : </strong>{{ $artikel->tanggal_posting }}</p></div>
                  </div>
                  <hr>
                  <img src="{{ asset('storage/artikel/' . $artikel->image) }}" class="gbr1" alt="{{ $artikel->judul }}">
                  <hr>
                </center>
                <p><strong>Tentang Aplikasi :</strong></p>
                <p>{!! $artikel->uraian !!}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <h3 class="tm-text-primary tm-mb-4" style="padding-top: 30px; margin-bottom: 10px;">About Me</h3>
        <p class="tm-mb-4" style="text-align: justify;">Perkenalkan, nama saya Veto Wardana Putra. Saya adalah mahasiswa Universitas Amikom Yogyakarta. Hobi saya membaca manga dan menonton anime. Impian saya yaitu ingin menjadi programmer profesional.</p>
        <div>
            <a href="#" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
            <a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
        </div>
        
        <!-- footer -->
        @include('layouts.front.module.footer')
    </div> <!-- container-fluid -->
</div> <!-- tm-container -->
@endsection