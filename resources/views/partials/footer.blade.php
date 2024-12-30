<footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="/" class="logo d-flex align-items-center">
              <span class="sitename">e-DUKCAPIL.</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Jl. Pemuda No.294, Dusun 1, Tegalyoso, Kec. Klaten Selatan</p>
              <p>Kab. Klaten, Jawa Tengah</p>
              <p class="mt-3"><strong>Phone:</strong> <span>(0272) 321048</span></p>
              <p><strong>Email:</strong> <span>disdukcapil@klaten.go.id</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/"> Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/antrian"> Antrian</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/contact"> Contact</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/login"> Login</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>jenis pelayanan</h4>
            <ul>
                @foreach ($antrians as $antrian )
                <li><i class="bi bi-chevron-right"></i> <a href="/antrian/"> {{ $antrian->nama_layanan }}</a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-12 footer-newsletter">
            <h4>Dapatkan Update Informasi Terbaru</h4>
            <p>Kirimkan email anda untuk mendapatkan update informasi tentang layanan disdukcapil kabupaten Klaten</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your email request has been sent. Thank you!</div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright">
      <div class="container text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Sistem e-DUKCAPIL.</strong> <span>All Rights Reserved</span></p>
        </div>
      </div>
    </div>

  </footer>
