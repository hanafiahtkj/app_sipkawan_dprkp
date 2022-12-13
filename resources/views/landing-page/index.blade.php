<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Sistem Informasi Perumahan dan Kawasan Permukiman</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendor/collab/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/ICON.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/ICON.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor/collab/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('vendor/collab/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('vendor/collab/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('assets/vendor/boilerplate/plugins/datatables/datatables.min.css') }}" rel="stylesheet">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('vendor/collab/assets/css/theme.css') }}" rel="stylesheet" />

    <style>
        .navbar {
            border-bottom: 1px solid #f8f3f0;
        }
        .card {
            border-radius: 8px;
        }
        .card-header:first-child {
            border-radius: 8px 8px 0px 0px;
        }
        .form-control {
            padding: .25rem .5rem;
            font-weight: 400;
            line-height: 1.5;
        }
        .form-control-sm {
            min-height: calc(1.5em + 0.5rem + 2px);
            padding: 0.25rem 0.5rem;
            font-size: .875rem;
            border-radius: 0.25rem;
        }
        .text-primary {
            color: #008cff !important;
        }
    </style>

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"> <img class="me-3 d-inline-block" src="{{ asset('images/LOGO2.png') }}" alt="" height="45" /></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto pt-2 pt-lg-0 font-base">
              <!-- <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-bold active" aria-current="page" href="#home">Home</a></li> -->
            </ul>
            <form class="ps-lg-5">
              <!-- <button class="btn btn-link text-danger fw-bold order-1 order-lg-0" type="button">Sign in</button> -->
              <a class="btn hover-top btn-collab" href="{{ route('boilerplate.login') }}">MASUK</a>
            </form>
          </div>
        </div>
      </nav>
      <section id="home" style="background-image:url('{{ asset('images/hero-bg.png') }}');background-position:bottom;background-size:cover;">
        <div class="container">
          <div class="row align-items-center g-2">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="{{ asset('assets/img/home.png') }}" alt="hero-header" /></div>
            <div class="col-md-7 col-lg-6 py-6 text-md-start text-center">
              <!-- <h6 class="fs-0 text-uppercase fw-bold text-600">Top Business App</h6> -->
              <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7 text-primary"> SIP-KAWAN</h1>
              <p class="mb-5 fs-3 fw-medium">Sistem Informasi Perumahan dan Kawasan Permukiman</p>
              <a class="btn hover-top btn-collab" href="{{ route('boilerplate.login') }}"><i class="fas fa-user me-2"></i> MASUK</a>
              <!-- <a class="btn hover-top btn-collab-outline text-gradient ms-2" href="#!"> <i class="fas fa-play text-danger me-md-2 me-0"></i> CHECK DEMO</a> -->
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6 bg-soft-warning" style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">

        <div class="container">
          <div class="row">
            <div class="col-12">
                <div class="card border-warning mb-5">
                    <h5 class="card-header bg-warning text-white py-3">
                        Data Sebaran Rumah Susun
                    </h5>
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

                <div class="card border-warning mb-5">
                    <h5 class="card-header bg-warning text-white py-3">
                        Data Sebaran Komplek Perumahan
                    </h5>
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

                <div class="card border-warning">
                    <h5 class="card-header bg-warning text-white py-3">
                        Data Rumah Sewa Milik Masyarakat
                    </h5>
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
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">

        <div class="container">
          <!-- <hr class="text-200" /> -->
          <!-- <div class="row justify-content-lg-between circle-blend-right circle-danger">
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">WHY US</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Channel</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Engagement</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Scale</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Watch Demo</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">PRODUCT</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Features</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Integrations</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Enterprise</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Solutions</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">RESOURCES</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Partners</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Developers</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Apps</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Blogs</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">COMPANY</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">About Us</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Leadership</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Investor Relations</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">News</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">PRICING</h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Plans</a></li>
                <li class="mb-2"><a class="text-1100 text-decoration-none" href="#!">Paid vs. Free</a></li>
              </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
              <h6 class="my-4 fw-bold fs-0">FOLLOW</h6>
              <ul class="list-unstyled list-inline my-3">
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{ asset('vendor/collab/assets/img/icons/facebook.svg') }}" alt="" /></a></li>
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{ asset('vendor/collab/assets/img/icons/twitter.svg') }}" alt="" /></a></li>
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{ asset('vendor/collab/assets/img/icons/instagram.svg') }}" alt="" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="{{ asset('vendor/collab/assets/img/icons/snapchat.svg') }}" alt="" /></a></li>
              </ul>
            </div>
          </div> -->
          <!-- <hr class="text-200 mb-0" /> -->
          <div class="row justify-content-md-between justify-content-evenly py-3">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs-0 my-2 text-400">All rights Reserved <span class="fw-bold text-500">&copy; Diskominfotik Kota Banjarmasin, 2022</span></p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="text-center text-md-end text-400"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FD7D72" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="fw-bold text-500" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
              </p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('vendor/collab/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/collab/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/collab/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendor/collab/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/boilerplate/plugins/moment/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/boilerplate/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/collab/assets/js/theme.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#dt_rumahsusun').DataTable();
            $('#dt_sebarankomplek').DataTable();
            $('#dt_rumahsewa').DataTable();
        })
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
  </body>

</html>
