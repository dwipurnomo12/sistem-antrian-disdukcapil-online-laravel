  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3><img src="/assets/img/logo.png" alt="" width="150px" height="150px"></h3>
              <p>
                Kec. Kota Kefamenanu, Kabupaten Timor Tengah Utara, Nusa Tenggara Timur.
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/antrian">Antrian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/contact">Contact</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/login">Login</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Jenis Layanan</h4>
            <ul>
              @foreach ($antrians as $antrian)
                <li><i class="bx bx-chevron-right"></i> <a href="/antrian/">{{ $antrian->nama_layanan }}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Dapatkan Update Informasi Terbaru</h4>
            <p>Kirimkan email anda untuk mendapatkan update informasi tentang layanan disdukcapil kabupaten Timor Tengah Utara</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sistem Antrian Online</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->