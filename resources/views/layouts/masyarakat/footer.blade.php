 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Lunatic Auction</span>
            </a>
            <p>Ikuti Kami di Sosial Media!! untuk info lelang lainnya</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-5">
            <h4>Pihak yang berKerjasama:</h4>
          </div>

          <div class="col-lg-2 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <h6 class="fw-bold">Lunatic Studios</h6>
            <p><i class="bi bi-map"></i>  Jl. Raya Serua</p>
            <p><i class="bi bi-phone"></i>  +61 88xxxxxxxxx</p>
            <p><i class="bi bi-mailbox"></i>  Lnc.std@gmail.com</p>
            <p><i class="ri ri-global-fill"></i>  Lunatic.studio.com</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <form action="{{route('auth.logout')}}" method="POST" style="display: none;" id="logout-form">
    @csrf
  </form>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-petugas/js/core/jquery.min.js')}}"></script>
  <script src="{{  asset('asset-user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/aos/aos.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{  asset('asset-user/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{  asset('asset-user/js/main.js') }}"></script>

  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.js') }}"></script>
  

  @stack('scripts')

</body>

</html>