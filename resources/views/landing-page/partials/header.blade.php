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

        .text-blue {
            color: #0064ab !important
        }

        .small-box .icon img {
            position: absolute;
            right: 15px;
            top: 15px;
        }

        #infografis .card {
            overflow: hidden;
            /* Memotong konten yang melebihi tinggi */
            cursor: pointer;
        }

        #infografis .card-img-top {
            height: 400px;
            /* Tinggi tetap untuk semua gambar */
            object-fit: cover;
            /* Menutupi area elemen gambar sambil menjaga proporsi */
            object-position: top;
            /* Menampilkan bagian atas gambar */
            width: 100%;
            /* Memastikan gambar menutupi lebar elemen */
        }

        #box-icon .small-box {
            height: 200px;
            /* Menetapkan tinggi yang sama untuk semua small-box */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #box-icon .small-box .inner {
            flex-grow: 1;
        }

        #box-icon .small-box-footer {
            margin-top: auto;
            /* Agar footer berada di bagian bawah */
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
                        <li class="nav-item px-2"><a class="nav-link fw-bold" aria-current="page"
                                href="{{ route('index') }}/#home">Beranda</a></li>
                        <li class="nav-item px-2"><a class="nav-link fw-bold" aria-current="page"
                                href="{{ route('index') }}/#statistik">Basis Data</a></li>
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
                        <li class="nav-item px-2"><a class="nav-link fw-bold" aria-current="page"
                                href="{{ route('index') }}/#contact">Kontak</a></li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle fw-bold" href="{{ route('index') }}/#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tentang
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('index') }}/#">Deskripsi</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ asset('assets/pdf/11.pedoman-teknis-SIP-KAWAN.pdf') }}"
                                        target="_blank">Pedoman Teknis</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-2"><a target="_blank" class="nav-link fw-bold" aria-current="page"
                                href="https://forms.gle/MkwEBYWBQnX7kWvb8">Testimoni/Feedback</a></li>
                    </ul>
                    <form class="ps-lg-5">
                        <a class="btn hover-top btn-collab text-white"
                            href="{{ route('boilerplate.login') }}">MASUK</a>
                    </form>
                </div>
            </div>
        </nav>
