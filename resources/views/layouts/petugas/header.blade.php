<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets-petugas/img/apple-icon.png')}}">
  <link rel="icon" href="{{ asset('img-asset/logo.png') }}">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets-petugas/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets-petugas/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets-petugas/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet" />

  {{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  <link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
  />
  <link
    href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css"
    rel="stylesheet"
  /> --}}

  @livewireStyles

  <link rel="stylesheet" href="{{ asset('js/toastr.min.css') }}">

  @stack('css')
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.petugas.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('pages')</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">@yield('pages')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li>
                <div class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <a class="text-sm font-weight-normal mb-1" onclick="document.getElementById('logout-form').submit()">
                        Logout
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <a class="text-sm font-weight-normal mb-1" href="{{ route('petugas.profile') }}">
                        Profile
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          {{-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <button class="btn bg-gradient-primary btn-sm" href="" onclick="document.getElementById('logout-form').submit()">Logout</button>
            </div>
          </div> --}}
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

    <form action="{{route('auth.logout')}}" method="POST" style="display: none;" id="logout-form">
      @csrf
    </form>