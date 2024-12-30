@extends('layouts.main')

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="service" class="services section">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Kontak</h2>
            <p>Kontak Dan Lokasi</p>
          </div>

          <div>
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=711&amp;height=400&amp;hl=en&amp;q=Jl.%20Pemuda%20No.294,%20Dusun%201,%20Tegalyoso,%20Kec.%20Klaten%20Sel.,%20Kabupaten%20Klaten,%20Jawa%20Tengah%2057424%20+(dukcapil%20klaten)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href='https://maps-generator.com/'></a>
          </div>

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Lokasi :</h4>
                  <p>7HQR+54 Tegalyoso, Kabupaten Klaten, Jawa Tengah.</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>disdukcapil@klaten.go.id</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Nomor Telepon:</h4>
                  <p>(0272) 321048</p>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Tulis Pesan" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan Anda Terkirim</div>
                </div>
                <div class="text-center"><button type="submit">Kirim Pesan</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->
@endsection
