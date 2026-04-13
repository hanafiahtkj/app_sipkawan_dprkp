@include('landing-page.partials.header')

<section class="pb-4 mt-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:center;background-size:cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-md-start text-center">
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7">DETAIL RUMAH SEWA</h1>
            </div>
        </div>
    </div>
</section>

<section id="statistik" class="py-4"
    style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ $data->gambar_path ? asset('storage/' . $data->gambar_path) : route('index') . '/images/600.jpg' }}"
                    class="rounded img-fluid" alt="Gambar Rumah Sewa" id="detailImage" data-bs-toggle="modal"
                    data-bs-target="#imageModal">
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Profil Umum</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Jenis Rumah Sewa</label>
                                <input type="text" class="form-control py-4" value="{{ $data->jenis }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Tarif</label>
                                <input type="text" class="form-control py-4"
                                    value="{{ number_format($data->tarif_sewa, 0, ',', '.') }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Tipe/Luasan Rumah Sewa</label>
                                <input type="text" class="form-control py-4" value="{{ $data->luas_hunian }} m²"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Unit Tersedia</label>
                                <input type="text" class="form-control py-4" value="{{ $data->jumlah_hunian }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control py-4"
                                    value="{{ $data->kecamatan['kecamatan'] ?? '-' }} ({{ $data->kecamatan['kode_kec'] ?? '-' }})"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control py-4"
                                    value="{{ $data->kelurahan['nama_deskel'] ?? '-' }} ({{ $data->kelurahan['kode_deskel'] ?? '-' }})"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Alamat</label>
                                <input type="text" class="form-control py-4" value="{{ $data->alamat ?? '-' }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Skema Sewa</label>
                                <input type="text" class="form-control py-4" value="{{ $data->skema_sewa ?? '-' }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Kontak Person</label>
                                <input type="text" class="form-control py-4"
                                    value="{{ $data->kontak_person ?? '-' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Full size image">
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('vendor/collab/vendors/bootstrap/bootstrap.min.js') }}"></script>

<script>
    // Ketika gambar diklik, buka modal dan tampilkan gambar dalam ukuran penuh
    document.addEventListener('DOMContentLoaded', function() {
        const detailImage = document.getElementById('detailImage');
        detailImage.addEventListener('click', function() {
            const imageUrl = detailImage.getAttribute('src');
            document.getElementById('modalImage').src = imageUrl;
        });
    });
</script>
