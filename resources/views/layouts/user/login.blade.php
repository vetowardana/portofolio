@extends('layouts.user.index2')

@section('title')
  <title>My Portofolio - Login</title>
@endsection

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline">
    <div class="card-header text-center bg-light">
      <a href="{{route('login')}}" class="h1 warnaAbu1"><b>My</b>Portofolio</a>
    </div>
    <div class="card-body">

      <form action="{{route('postlogin')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <center>
          <div class="col-4">
            <button type="submit" class="btn btn-orange btn-block">Login</button>
          </div>
        </center>
      </form>
      <a href="{{route('/')}}"><i class="fas fa-backward" style="color: grey;"></i></a>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection