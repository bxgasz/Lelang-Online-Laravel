<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{  asset('assets-petugas/img/apple-icon.png')}}">
  <link rel="icon" href="{{ asset('img-asset/logo.png') }}">
  <title>
    Lelang-Online | Register
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{  asset('assets-petugas/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{  asset('assets-petugas/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js'"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{  asset('assets-petugas/css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain my-3" style="background-color: #f2ebf8;">
                <div class="card-header" style="background-color: #e91e63 !important;
                    color: white;
                }">
                  <h4 class="font-weight-bolder" style="color:white">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" action="{{ route('auth.proses') }}" method="post">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                      @error('nama')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                      @error('username')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                      @error('email')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                      @error('phone')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                      @error('password')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password Confirmation</label>
                      <input type="password" class="form-control" name="password_confirmation">
                      @error('password_confirmation')
                          <div class="invalid-feedback d-block">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ route('login.index') }}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{  asset('assets-petugas/js/core/popper.min.js') }}"></script>
  <script src="{{  asset('assets-petugas/js/core/bootstrap.min.js') }}"></script>
  <script src="{{  asset('assets-petugas/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{  asset('assets-petugas/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{  asset('assets-petugas/js/material-dashboard.min.js?v=3.0.4') }}"></script>
</body>

</html>