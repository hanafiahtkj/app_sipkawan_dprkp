@include('landing-page.partials.header')

<section class="pb-4 mt-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:bottom;background-size:contain;background-repeat: no-repeat;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-5 col-lg-3 order-0 order-md-1 text-end d-none d-md-block"><img class="pt-7 pt-md-0"
                    src="{{ asset('images/logo-r.webp') }}" alt="hero-header" style="max-height: 300px;" />
            </div>
            <div class="col-md-7 col-lg-9 text-md-start text-left">
                <h6 class="fs-0 text-uppercase fw-bold text-600">Selamat Datang</h6>
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7 text-blue"> <span class="text-orange">SI</span>P-KAWAN</h1>
                <p class="fs-3 fw-bold text-uppercase text-blue">(Sistem Informasi Perumahan dan Kawasan
                    Permukiman)</p>
                <p class="mb-4 fs-1 fw-medium text-green">DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN KOTA
                    BANJARMASIN</p>
                <a class="btn btn-outline-secondary" href="#" style="background-color: #fff;">Basis
                    Data <i class="fas fa-arrow-down"></i></a>
                <!-- <a class="btn hover-top btn-collab-outline text-gradient ms-2" href="#!"> <i class="fas fa-play text-danger me-md-2 me-0"></i> CHECK DEMO</a> -->
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-lg-2 mb-4 mb-lg-0"><img src="{{ asset('assets/img/Ig-Logo-PNG-Photos.png') }}"
                    height="38" alt="brands">
            </div>
            {{-- <div class="col-md-9 col-lg-9 mb-4 mb-lg-0">
                <p class="fs-1 fw-medium text-center mb-0">Memberikan pelayanan informasi terkait pelayanan perumahan
                    dan
                    Kawasan permukiman di Kota Banjarmasin</p>
            </div> --}}
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
                {{-- <h6 class="fw-bold fs-4 display-3 lh-sm mb-2">Basis Data</h6> --}}
                <p class="fw-medium fs-1 text-center mb-0">Memberikan pelayanan informasi terkait pelayanan
                    perumahan
                    dan
                    Kawasan permukiman di Kota Banjarmasin</p>
                <hr>
            </div>
        </div>

        {{-- <div class="card border-warning mb-5">
            <h5 class="card-header bg-light py-3">
                Jumlah Rumah
            </h5>
            <div class="card-body pt-4"> --}}
        {{-- <form action="{{ route('welcome') }}" method="GET">
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
        </form> --}}

        {{-- <div class="row mb-2">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-white">
                    <div class="inner">

                        <h3>{{ number_format(35384, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(17210, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(121868, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(328, 0, ',', '.') }} Komplek</h3>
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

                        <h3>{{ number_format(63, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(1742, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(121466, 0, ',', '.') }} m2</h3>
                        <p><b>Luas Pengadaan Tanah</b></p>
                    </div>
                    <div class="icon">
                        <img src="{{ asset('images/Picture7.png') }}" alt="Icon" style="height: 60px;">
                    </div>
                    <a href="#" class="small-box-footer" data-type="pengadaan-tanah">
                        Data Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div> --}}

        <div class="row mb-2" id="box-icon">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-white" style="max-width:250px">
                    <div class="inner text-center">
                        <img src="{{ asset('images/Picture4.png') }}" alt="Icon" style="height: 80px;">
                        <h4>Perumahan</h4>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="{{ route('perumahan') }}" class="small-box-footer" data-type="komplek-perumahan">
                        Lihat.. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-white" style="max-width:250px">
                    <div class="inner text-center">
                        <img src="{{ asset('images/Picture6.png') }}" alt="Icon" style="height: 80px;">
                        <h4>Rumah Sewa Masyarakat</h4>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="{{ route('rumah-sewa') }}" class="small-box-footer" data-type="rumah-sewa">
                        Lihat... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-white" style="max-width:250px">
                    <div class="inner text-center">
                        <img src="{{ asset('images/Picture5.png') }}" alt="Icon" style="height: 80px;">
                        <h4>Rumah Susun Sederhana Sewa</h4>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="{{ route('rumah-susun') }}" class="small-box-footer" data-type="rusun">
                        Lihat... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-white" style="max-width:250px">
                    <div class="inner text-center">
                        <img src="{{ asset('images/Picture2.png') }}" alt="Icon" style="height: 80px;">
                        <h4>RTLH Tertangani</h4>
                    </div>
                    <div class="icon">

                    </div>
                    <a href="{{ route('rtlh-realisasi') }}" class="small-box-footer" data-type="non-subsidi">
                        Lihat... <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

        {{-- <div class="row mb-2">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-white">
                    <div class="inner">

                        <h3>{{ number_format(35384, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(17210, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(121868, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(328, 0, ',', '.') }} Komplek</h3>
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

                        <h3>{{ number_format(63, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(1742, 0, ',', '.') }} Unit</h3>
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

                        <h3>{{ number_format(121466, 0, ',', '.') }} m2</h3>
                        <p><b>Luas Pengadaan Tanah</b></p>
                    </div>
                    <div class="icon">
                        <img src="{{ asset('images/Picture7.png') }}" alt="Icon" style="height: 60px;">
                    </div>
                    <a href="#" class="small-box-footer" data-type="pengadaan-tanah">
                        Data Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div> --}}
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

<section id="infografis" class="py-4"
    style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center my-2">
                <h6 class="fw-bold fs-4 display-3 lh-sm mb-2">Infografis</h6>
                <hr>
            </div>
        </div>

        <div class="row mb-2">
            <!-- Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS DATA PERUMAHAN.webp') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS DATA PERUMAHAN.webp') }}" class="card-img-top"
                        alt="Card image 1">
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS DATA RUMAH SEWA 2023.webp') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS DATA RUMAH SEWA 2023.webp') }}"
                        class="card-img-top" alt="Card image 2">
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/DATA PERTANAHAN/DATA PERTANAHAN (1)-1.webp') }}">
                    <img src="{{ asset('assets/infografis/DATA PERTANAHAN/DATA PERTANAHAN (1)-1.webp') }}"
                        class="card-img-top" alt="Card image 3">
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS_RUSUNAWA_2024.jpg') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS_RUSUNAWA_2024.jpg') }}" class="card-img-top"
                        alt="Card image 5">
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('infografis') }}" class="btn btn-lg btn-dark effect wow fadeInUp smooth-menu mb-5"
                data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                Lihat Selengkapnya...
            </a>
        </div>
    </div>
    <!-- end of .container-->
</section>

@include('landing-page.partials.footer')
