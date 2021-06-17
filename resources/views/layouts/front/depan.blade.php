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
        <h3 class="mar-top1 mar-left1 mar-bottom1">Portfolio</h3>
        @if(count($artikel) >0)
        <div class="row mar-top1">
            @foreach($artikel as $a)
            <div class="col-lg-4 padd-bottom2">
                <div class="col-lg-12">
                    <img src="{{asset('templatemo/img/photo1.png')}}" class="text-center gambar padd-top1">
                    <div class="tm-bg-gray tm-box-2 padding1">
                        <center>
                            <h4 class="tm-text-primary tm-h4">{{$a->judul}}</h4>
                        </center>
                        <div class="text-center">
                            <a href="{{route('front.show', $a->id)}}" class="btn btn-primary rounded-0">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="height: 280px;">
            <p>Belum ada data</p>
        </div>
        @endif
        {{ $artikel->links() }}

        <h3 class="tm-text-primary tm-mb-4" style="padding-top: 30px; margin-bottom: 10px;">About Me</h3>
        <p class="tm-mb-4" style="text-align: justify;">Perkenalkan, nama saya Veto Wardana Putra. Saya adalah mahasiswa Universitas Amikom Yogyakarta. Hobi saya membaca manga dan menonton anime. Impian saya yaitu ingin menjadi programmer profesional.</p>
        <div>
            <a href="http://www.facebook.com/vwdhanap" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
            <a href="http://instagram.com/vwdhanap" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
        </div>
        
        <!-- footer -->
        @include('layouts.front.module.footer')
    </div> <!-- container-fluid -->
</div> <!-- tm-container -->
@endsection