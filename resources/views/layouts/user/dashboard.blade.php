@extends('layouts.user.index')

@section('title')
	<title>My Portofolio - Dashboard</title>
@endsection

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Dashboard {{auth()->user()->name}}</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
	          <li class="breadcrumb-item active">Dashboard</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
	      <div class="col-lg-6 col-6">
	        <!-- small box -->
	        <div class="small-box bg-info">
	          <div class="inner">
	            <h3>{{$user}}</h3>

	            <p>User</p>
	          </div>
	          <div class="icon">
	            <i class="fas fa-user"></i>
	          </div>
	        </div>
	      </div>
	      <!-- ./col -->
	      <div class="col-lg-6 col-6">
	        <!-- small box -->
	        <div class="small-box bg-success">
	          <div class="inner">
	            <h3>{{$artikel}}</h3>

	            <p>Artikel</p>
	          </div>
	          <div class="icon">
	            <i class="fas fa-newspaper"></i>
	          </div>
	        </div>
	      </div>
	      <!-- ./col -->
	    </div>
	    <!-- /.row -->
	  </div><!-- /.container-fluid -->
	</section>
<!-- /.content -->
</div>
@endsection