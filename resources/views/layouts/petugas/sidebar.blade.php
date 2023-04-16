<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main" @yield('sidebar')>
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('img-asset/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Lunatic Auction</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height: 100%">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('dashboard')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master Data</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('barang')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('barang.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Barang</span>
          </a>
        </li>
        @if (Auth::guard('user')->user()->id_role == 2)
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Lelang Buka</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('lelang-baru')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('lelang.tutup') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">gavel</i>
            </div>
            <span class="nav-link-text ms-1">Buat Lelang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('lelang-buka')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('lelang.buka') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">gavel</i>
            </div>
            <span class="nav-link-text ms-1">Lelang Dibuka</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('history')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('history.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Lelang Selesai</span>
          </a>
        </li>
        @endif
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Report</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('laporan-pdf')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('laporan.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">picture_as_pdf</i>
            </div>
            <span class="nav-link-text ms-1">Laporan</span>
          </a>
        </li>
        @if (Auth::guard('user')->user()->id_role == 1)
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Users</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('user')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Petugas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (request()->is('masyarakat')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('masyarakat.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Masyarakat</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </aside>