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
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('vendor/collab/assets/img/favicons/apple-touch-icon.png') }}">
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

    <link rel="stylesheet" href="{{ mix('/adminlte.min.css', '/assets/vendor/boilerplate') }}">

    <style>
        .container {
            max-width: 1280px;
        }

        .navbar {
            border-bottom: 1px solid #f8f3f0;
        }

        .navbar-light .navbar-nav .nav-link {
            color: rgba(0, 0, 0, .7);
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

        /* .text-primary {
            color: #008cff !important;
        } */
        .bg-gradient {
            background-image: linear-gradient(to right, #FF5722, #FF9800) !important;
        }

        .bg-soft-warning {
            background-color: #eeeeee40 !important;
        }

        .nav-link {
            color: #888888;
        }

        .text-warning {
            color: #f98d37 !important;
        }

        .text-green {
            color: #2d5740 !important
        }

        .small-box .icon img {
            position: absolute;
            right: 15px;
            top: 15px;
        }
    </style>

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-2 d-block bg-white"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container-fluid"><a class="navbar-brand" href="{{ url('') }}"> <img
                        class="ms-3 d-inline-block" src="{{ asset('images/logo_pemko.png') }}" alt=""
                        height="45" /></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto pt-2 pt-lg-0 font-base">
                        <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-bold"
                                aria-current="page" href="#home">Beranda</a></li>
                        <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-bold"
                                aria-current="page" href="#statistik">Basis Data</a></li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Peta Sebaran
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('webgis') }}?wfsLayerVisibleSebaranPerumahan=true"
                                        target="_blank">Peta Sebaran Perumahan</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('webgis') }}?wfsLayerVisibleSebaranRumahSewa2022=true"
                                        target="_blank">Peta Sebaran Rumah Sewa</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-bold"
                                aria-current="page" href="#contact">Kontak</a></li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tentang
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Deskripsi</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ asset('assets/pdf/11.pedoman-teknis-SIP-KAWAN.pdf') }}"
                                        target="_blank">Pedoman Teknis</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="ps-lg-5">
                        <a class="btn hover-top btn-collab text-white"
                            href="{{ route('boilerplate.login') }}">MASUK</a>
                    </form>
                </div>
            </div>
        </nav>
        <section class="pb-4" id="home"
            style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:bottom;background-size:contain;background-repeat: no-repeat;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-5 col-lg-3 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0"
                            src="{{ asset('images/logo-r.webp') }}" alt="hero-header" style="max-height: 300px;" />
                    </div>
                    <div class="col-md-7 col-lg-9 text-md-start text-left">
                        <h6 class="fs-0 text-uppercase fw-bold text-600">Selamat Datang</h6>
                        <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7 text-green"> SIP-KAWAN</h1>
                        <p class="fs-3 fw-bold text-uppercase text-green">(Sistem Informasi Perumahan dan Kawasan
                            Permukiman)</p>
                        <p class="mb-4 fs-1 fw-medium text-green">DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN KOTA
                            BANJARMASIN</p>
                        <a class="btn btn-outline-secondary" href="#statistik" style="background-color: #fff;">Basis
                            Data <i class="fas fa-arrow-down"></i></a>
                        <!-- <a class="btn hover-top btn-collab-outline text-gradient ms-2" href="#!"> <i class="fas fa-play text-danger me-md-2 me-0"></i> CHECK DEMO</a> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg mb-4 mb-lg-0"><img
                            src="{{ asset('assets/img/Ig-Logo-PNG-Photos.png') }}" height="38" alt="brands">
                    </div>
                    {{-- <div class="col-sm-6 col-lg mb-4 mb-lg-0 d-flex flex-center"><img src="{{ asset('assets/img/facebook-logo-4-1.png') }}" height="22" alt="brands"></div>
            <div class="col-sm-6 col-lg mb-4 mb-lg-0 d-flex flex-center"><img src="{{ asset('assets/img/pngimg.com - twitter_PNG31.png') }}" height="38" alt="brands"></div>
            <div class="col-sm-6 col-lg mb-4 mb-lg-0 d-flex flex-center"><img src="{{ asset('assets/img/youtube.png') }}" height="38" alt="brands"></div> --}}
                </div>
            </div><!-- end of .container-->
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section id="statistik" class="py-4"
            style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 text-center my-2">
                        <h6 class="fw-bold fs-4 display-3 lh-sm mb-2">Basis Data</h6>
                        <hr>
                    </div>
                </div>

                {{-- <div class="card border-warning mb-5">
            <h5 class="card-header bg-light py-3">
                Jumlah Rumah
            </h5>
            <div class="card-body pt-4"> --}}
                <form action="{{ route('welcome') }}" method="GET">
                    <div class="row mt-4 mb-4">
                        <div class="col-md-4">
                            <select class="form-select py-3" name="tahun" id="tahun">
                                @php
                                    $tahunSekarang = date('Y');
                                @endphp
                                @for ($thn = 2022; $thn <= $tahunSekarang; $thn++)
                                    <option value="{{ $thn }}" {{ $thn == $tahun ? 'selected' : '' }}>
                                        {{ $thn }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3"><i class="fa fa-filter"></i>
                                Filter</button>
                        </div>
                    </div>
                </form>
                <div class="row mb-2">
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_umum, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Rumah Subsidi Tersedia</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture1.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="subsidi">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_komersil, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Rumah Non-Subsidi Tersedia</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture2.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="non-subsidi">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_swadaya, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Rumah Swadaya</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture3.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="rumah-swadaya">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_umum, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Komplek Perumahan</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture4.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="komplek-perumahan">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_umum, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Kamar Rusun Tersedia</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture5.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="rusun">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_umum, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Rumah Sewa Tersedia</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture6.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="rumah-sewa">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">

                        <div class="small-box bg-white">
                            <div class="inner">
                                <h3>{{ number_format($jml_rmh_umum, 0, ',', '.') }}</h3>
                                <p><b>Jumlah Pengadaan Tanah</b></p>
                            </div>
                            <div class="icon">
                                <img src="{{ asset('images/Picture7.png') }}" alt="Icon" style="height: 60px;">
                            </div>
                            <a href="#" class="small-box-footer" data-type="pengadaan-tanah">
                                Data Detail <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
                {{-- </div>
            </div> --}}

                {{-- <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-light mb-0">
                        <h5 class="card-header bg-light py-3">
                            Detail Jumlah Rumah
                        </h5>
                        <div class="card-body">
                            <div class="mt-0" id="surveyChart">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card card-warning card-outline card-tabs mb-5">
                            <div class="card-header p-0 border-bottom-0">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab"
                                            aria-controls="nav-home" aria-selected="true">Data Sebaran Komplek
                                            Perumahan</button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Data Sebaran Rumah
                                            Susun</button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false">Data Rumah Sewa Milik
                                            Masyarakat</button>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab" tabindex="0">
                                        <div class="card border-light mb-0">
                                            <h5 class="card-header bg-light py-3">
                                                Data Sebaran Komplek Perumahan
                                            </h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover va-middle w-100"
                                                        id="dt_sebarankomplek">
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
                                                                    <td class="text-right">
                                                                        {{ number_format($value->luas, 0, ',', '.') }}
                                                                    </td>
                                                                    <td>{{ App\Models\SebaranKomplek::jenis($value->jenis) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab" tabindex="0">
                                        <div class="card border-light mb-0">
                                            <h5 class="card-header bg-light py-3">
                                                Data Sebaran Rumah Susun
                                            </h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover va-middle w-100"
                                                        id="dt_rumahsusun">
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
                                                                    <td class="text-right">
                                                                        {{ number_format($value->luas, 0, ',', '.') }}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ number_format($value->jumlah, 0, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab" tabindex="0">
                                        <div class="card border-light mb-0">
                                            <h5 class="card-header bg-light py-3">
                                                Data Rumah Sewa Milik Masyarakat
                                            </h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover va-middle w-100"
                                                        id="dt_rumahsewa">
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
                                                                    <td>{{ number_format($value->jumlah_hunian, 0, ',', '.') }}
                                                                    </td>
                                                                    <td>{{ number_format($value->tarif_sewa, 0, ',', '.') }}
                                                                    </td>
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
                        </div>
                    </div>
                </div> --}}

            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0" id="contact">

            <div class="container">


                <hr class="text-200">

                <div class="row flex-center mt-5">
                    <div class="col-lg-6">
                        <h4 class="fw-bold">Kontak Kami</h4>
                        <p class="fs-1">Hotline: (0511) 3365592</p>
                        <p class="fs-1">WhatsApp: 081935288889</p>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-lg-end mb-4">
                        <form class="row row-cols-lg-auto align-items-center">
                            <!-- You can include additional contact-related form fields here if needed -->
                        </form>
                    </div>
                </div>
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
                        <p class="fs-0 my-2 text-400">All rights Reserved <span class="fw-bold text-500">&copy;
                                Diskominfotik Kota Banjarmasin, 2022</span></p>
                    </div>
                    {{-- <div class="col-12 col-sm-8 col-md-6">
              <p class="text-center text-md-end text-400"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FD7D72" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="fw-bold text-500" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
              </p>
            </div> --}}
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

    <div class="modal fade" id="moreInfoModal" tabindex="-1" aria-labelledby="moreInfoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moreInfoModalLabel">Data Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Konten akan dimuat di sini -->
                </div>
            </div>
        </div>
    </div>


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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.js" integrity="sha512-6LKCH7i2+zMNczKuCT9ciXgFCKFp3MevWTZUXDlk7azIYZ2wF5LRsrwZqO7Flt00enUI+HwzzT5uhOvy6MNPiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&amp;family=Montserrat:wght@200;300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
    {{-- <script src="{{ asset('assets/js/vue.min.js') }}"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.small-box-footer').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    let tahun = document.getElementById('tahun').value;

                    let type = this.getAttribute('data-type');
                    let url = `{{ url('more-info') }}/${type}?tahun=${tahun}`;

                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            document.querySelector('#moreInfoModal .modal-body').innerHTML =
                                data;

                            // Hapus inisialisasi DataTable sebelumnya jika ada
                            if ($.fn.DataTable.isDataTable('#dataTable')) {
                                $('#dataTable').DataTable().destroy();
                            }

                            // Inisialisasi DataTables
                            $('#dataTable').DataTable({
                                responsive: true,
                                lengthMenu: [
                                    [5, 25, 50, -1],
                                    [5, 25, 50, 'All']
                                ]
                            });

                            new bootstrap.Modal(document.getElementById('moreInfoModal'))
                                .show();
                        })
                        .catch(error => console.error('Error loading modal content:', error));
                });
            });
        });
    </script>


    <script type="text/javascript">
        $(function() {
            $('#dt_rumahsusun').DataTable();
            $('#dt_sebarankomplek').DataTable();
            $('#dt_rumahsewa').DataTable();

            const config = {
                type: 'bar',
                // data: data,
                options: {
                    indexAxis: 'y',
                    elements: {
                        bar: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Horizontal Bar Chart'
                        }
                    }
                },
            };
        })
    </script>

    <script>
        function getRandomPastelColor() {
            var hue = Math.floor(Math.random() * 360); // Pilih hue acak antara 0 dan 360
            var pastel = 'hsl(' + hue + ', 70%, 80%)'; // Saturasi 70% dan kecerahan 80%
            return pastel;
        }

        // Fungsi untuk menginisialisasi grafik
        function initializeChart(data) {
            console.log(data);

            // Hapus canvas jika ada sebelumnya
            const existingCanvas = document.getElementById("myChart");
            if (existingCanvas) {
                existingCanvas.remove();
            }

            // Hapus card jika ada sebelumnya
            // const existingCard = document.getElementById("chartCard");
            // if (existingCard) {
            //     existingCard.remove();
            // }

            // Tambahkan canvas baru
            const canvasContainer = document.getElementById("surveyChart");
            const canvas = document.createElement('canvas');
            canvas.setAttribute("id", "myChart");
            canvas.setAttribute("height", "100");
            canvasContainer.appendChild(canvas);

            var labels = <?php echo json_encode($rumahChart['label']); ?>;
            var totals = <?php echo json_encode($rumahChart['total']); ?>;

            var datasets = [];

            for (var i = 0; i < labels.length; i++) {
                var dataset = {
                    label: labels[i],
                    data: [totals[i]],
                    borderWidth: 2,
                    borderColor: '#888888',
                    backgroundColor: getRandomPastelColor(),
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                };

                datasets.push(dataset);
            }

            var statistics_chart = canvas.getContext('2d');
            var myChart2 = new Chart(statistics_chart, {
                type: 'bar',
                data: {
                    labels: ['JUMLAH RUMAH'],
                    datasets: datasets
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            // ticks: {
                            //     stepSize: 50
                            // }
                        }
                    }
                }
            });

            // const chartCard = document.createElement('div');
            // chartCard.setAttribute("id", "chartCard");
            // chartCard.classList.add('card', 'mt-4');
            // const cardBody = document.createElement('div');
            // cardBody.classList.add('card-body');

            // // Tambahkan label dan jumlah menggunakan list group Bootstrap
            // const listGroup = document.createElement('ul');
            // listGroup.classList.add('list-group', 'list-group-flush');
            // for (let i = 0; i < data["label_all"].length; i++) {
            //     const listItem = document.createElement('li');
            //     listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
            //     listItem.innerHTML = `${data["label_all"][i]} <span class="badge bg-primary rounded-pill">${data["total"][i]}</span>`;
            //     listGroup.appendChild(listItem);
            // }

            // // Gabungkan elemen-elemen HTML
            // cardBody.appendChild(listGroup);
            // chartCard.appendChild(cardBody);
            // canvasContainer.appendChild(chartCard);
        }

        var chartData = [];
        initializeChart(chartData);
    </script>

</body>

</html>
