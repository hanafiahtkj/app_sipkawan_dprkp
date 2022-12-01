<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sip-Kawan-Sistem Informasi Perumahan dan Kawasan Permukiman</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('vendor/Ninestars/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('vendor/Ninestars/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/Ninestars/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/Ninestars/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/Ninestars/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/Ninestars/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/Ninestars/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/Ninestars/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boilerplate/plugins/datatables/datatables.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('vendor/Ninestars/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.9.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .section-title p {
        font-size: 24px;
    }
    #footer .footer-newsletter {
        padding: 35px 0;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Sip-Kawan</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('vendor/Ninestars/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="getstarted scrollto" href="{{ route("boilerplate.login") }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>SIP-KAWAN</h1>
          <h2>(Sistem Informasi Perumahan dan Kawasan Permukiman)</h2>
          <div>
            <a href="{{ route("boilerplate.login") }}" class="btn-get-started scrollto">Login</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{ asset('vendor/Ninestars/assets/img/hero-img.svg') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>Portfolio</h2> -->
          <p>DATA SEBARAN RUMAH SUSUN</p>
        </div>

        <div class="card card-info">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover va-middle w-100" id="dt_rumahsusun">
                        <thead>
                            <tr>
                                <th>Nama Rumah Susun</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat</th>
                                <th>Luas Unit</th>
                                <th>Jumlah Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumahsusun as $value)
                                <tr>
                                    <td>{{ $value->nama_rumah_susun }}</td>
                                    <td>{{ $value->kecamatan->kecamatan }}</td>
                                    <td>{{ $value->kelurahan->nama_deskel }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->luas }}</td>
                                    <td>{{ $value->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h2>F.A.Q</h2> -->
          <p>DATA SEBARAN KOMPLEK PERUMAHAN</p>
        </div>

        <div class="card card-info">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover va-middle w-100" id="dt_sebarankomplek">
                        <thead>
                            <tr>
                                <th>Nama Perumahan</th>
                                <th>Nama Pengembang</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Luas</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sebarankomplek as $value)
                                <tr>
                                    <td>{{ $value->nama_perumahan }}</td>
                                    <td>{{ $value->nama_pengembang }}</td>
                                    <td>{{ $value->kecamatan->kecamatan }}</td>
                                    <td>{{ $value->kelurahan->nama_deskel }}</td>
                                    <td>{{ $value->luas}}</td>
                                    <td>{{ $value->jenis }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <!-- <h2>Team</h2> -->
          <p>DATA RUMAH SEWA MILIK MASYARAKAT </p>
        </div>

        <div class="card card-info">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover va-middle w-100" id="dt_rumahsewa">
                        <thead>
                            <tr>
                                <th>Jenis Sarana</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Tipe/Luas Hunian</th>
                                <th>Jumlah Hunian</th>
                                <th>Tarif Sewa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rumahsewa as $value)
                                <tr>
                                    <td>{{ $value->jenis }}</td>
                                    <td>{{ $value->kecamatan->kecamatan }}</td>
                                    <td>{{ $value->kelurahan->nama_deskel }}</td>
                                    <td>{{ $value->luas_hunian }}</td>
                                    <td>{{ $value->jumlah_hunian }}</td>
                                    <td>{{ $value->tarif_sewa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div> -->
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-md-6 footer-contact">
            <h3>DPRKP</h3>
            <p>
              Kertak Baru Ilir <br>
              Kec. Banjarmasin Tengah, Kota Banjarmasin<br>
              Kalimantan Selatan 70231 <br><br>
              <strong>Phone:</strong> (0511) 3365592<br>
              <!-- <strong>Email:</strong> info@example.com<br> -->
            </p>
          </div>

          <div class="col-md-6 footer-links">
            <h4>Media Sosial</h4>
            <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
            <div class="social-links mt-3">
              <a href="https://twitter.com/dckp_bjm" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/dinasrumahkawanbjm/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Diskominfotik Kota Banjarmasin</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/Ninestars/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/boilerplate/plugins/moment/moment-with-locales.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/boilerplate/plugins/datatables/datatables.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('vendor/Ninestars/assets/js/main.js') }}"></script>

  <script type="text/javascript">
        $(function() {
            $('#dt_rumahsusun').DataTable();
            $('#dt_sebarankomplek').DataTable();
            $('#dt_rumahsewa').DataTable();
        })
    </script>

</body>

</html>
