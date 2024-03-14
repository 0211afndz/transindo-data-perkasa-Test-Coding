<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sewa Mobil</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">
          <i class="fa fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('home') }}" class="brand-link">
      <h2 class="brand-image img-circle elevation-3">SM</h2>
      <span class="brand-text font-weight-light">Sewa Mobil</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets') }}/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama_user }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->user_level == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('mobil') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mobil</p>
                </a>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Halaman Awal
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('penyewaan') }}" class="nav-link">
              <i class="nav-icon fa fa-thumbs-up"></i>
              <p>
                Penyewaan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    @yield('content')
  </div>

@include('layout/footer')