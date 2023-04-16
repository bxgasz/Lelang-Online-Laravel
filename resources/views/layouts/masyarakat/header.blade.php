<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lunatic Auction - @yield('title')</title>
  <meta name="csrf-token" content="{{csrf_token()}}">

  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{  asset('asset-user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{  asset('asset-user/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{  asset('asset-user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{  asset('asset-user/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{  asset('asset-user/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{  asset('asset-user/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{  asset('asset-user/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{  asset('asset-user/css/style.css')}}" rel="stylesheet">

  <link rel="icon" href="{{ asset('img-asset/logo.png') }}">

  <link rel="stylesheet" href="{{ asset('js/toastr.min.css') }}">

  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @stack('css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('masy.index') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Lunatic</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ route('masy.index') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('masy.all') }}">Produk Lelang</a></li>
          @if (Auth::guard('masyarakat')->user() != null)
          <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('masy.riwayat') }}">Riwayat Lelang</a></li>
              <li><a href="#"  onclick="document.getElementById('logout-form').submit()">Logout</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ route('masy.profile') }}">Profile</a></li>
          @else
          <li><a class="nav-link scrollto" href="{{ route('login.index') }}">Sign in</a></li>
          <li><a class="nav-link scrollto" href="{{ route('auth.register') }}">Sign up</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->