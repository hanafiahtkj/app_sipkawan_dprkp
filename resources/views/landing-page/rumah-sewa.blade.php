@include('landing-page.partials.header')

<section class="pb-4 mt-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:center;background-size:cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-md-start text-center">
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7"> RUMAH SEWA</h1>
            </div>
        </div>
    </div>
</section>



<section id="statistik" class="py-4"
    style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">

    <div class="container mt-4">
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 text-center" style="border-radius: 15px;">
                    <p class="text-muted small mb-1 fw-bold uppercase">Total Properti</p>
                    <h4 class="fw-bold mb-0 text-primary">{{ number_format($stats['total']) }}</h4>
                    <small class="text-muted" style="font-size: 10px;">UNIT TERDATA</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 text-center" style="border-radius: 15px;">
                    <p class="text-muted small mb-1 fw-bold uppercase">Jenis Terbanyak</p>
                    <h4 class="fw-bold mb-0 text-success">{{ $stats['top_jenis']->total ?? 0 }}</h4>
                    <small class="text-muted text-uppercase" style="font-size: 10px;">
                        TIPE: {{ $stats['top_jenis']->jenis ?? '-' }}
                    </small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 text-center" style="border-radius: 15px;">
                    <p class="text-muted small mb-1 fw-bold uppercase">Tarif Terjangkau</p>
                    <h4 class="fw-bold mb-0 text-danger">{{ $stats['tarif_terjangkau'] }}</h4>
                    <small class="text-muted" style="font-size: 10px;">DI BAWAH RP 500RB</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-3 text-center" style="border-radius: 15px;">
                    <p class="text-muted small mb-1 fw-bold uppercase">Wilayah</p>
                    <h4 class="fw-bold mb-0 text-warning">{{ $stats['total_kecamatan'] }}</h4>
                    <small class="text-muted" style="font-size: 10px;">KECAMATAN AKTIF</small>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3 small text-muted"><i class="fa fa-home me-2 text-primary"></i>JUMLAH
                            MENURUT JENIS RUMAH</h6>
                        <div class="row">
                            @foreach ($stats_jenis as $sj)
                                <div class="col-6 mb-2">
                                    <div class="d-flex justify-content-between border-bottom pb-1">
                                        <span style="font-size: 13px;">{{ $sj->jenis }}</span>
                                        <span class="fw-bold text-primary"
                                            style="font-size: 13px;">{{ $sj->total }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3 small text-muted"><i class="fa fa-tag me-2 text-success"></i>JUMLAH
                            MENURUT TARIF</h6>
                        <div class="row">
                            @foreach ($stats_tarif as $label => $total)
                                <div class="col-6 mb-2">
                                    <div class="d-flex justify-content-between border-bottom pb-1">
                                        <span style="font-size: 13px;">{{ $label }}</span>
                                        <span class="fw-bold text-success"
                                            style="font-size: 13px;">{{ $total }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px; background: #f8f9fa;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">
                    <i class="fa fa-map-marker-alt text-danger me-2"></i>
                    SEBARAN PROPERTI PER KECAMATAN
                </h6>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($kecamatan_stats as $ks)
                        <div class="bg-white border rounded-pill px-3 py-2 d-flex align-items-center shadow-sm">
                            <span class="fw-bold text-dark me-2" style="font-size: 12px; letter-spacing: 0.5px;">
                                {{ strtoupper($ks->kecamatan) }}
                            </span>
                            <span class="badge bg-primary rounded-pill">{{ $ks->rumah_sewa_count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('rumah-sewa') }}" method="GET">
            <div class="row mt-4 mb-3">
                <div class="col-md-4 mb-3">
                    <label class="fw-bold mb-1">Kecamatan</label>
                    <select class="form-select py-3" name="id_kecamatan" id="id_kecamatan">
                        <option value="">Pilih...</option>
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id }}"
                                {{ request('id_kecamatan') == $kec->id ? 'selected' : '' }}>
                                {{ $kec->kode_kec }} - {{ $kec->kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold mb-1">Kelurahan</label>
                    <select class="form-select py-3" name="id_kelurahan" id="id_kelurahan">
                        <option value="">Pilih...</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold mb-1">Jenis Rumah</label>
                    <select class="form-select py-3" name="jenis" id="jenis">
                        <option value="">Pilih...</option>
                        @foreach ($jenis as $j)
                            <option value="{{ $j }}" {{ request('jenis') == $j ? 'selected' : '' }}>
                                {{ $j }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold mb-1">Tipe/Luas (m²)</label>
                    <select class="form-select py-3" name="luas_hunian" id="luas_hunian">
                        <option value="">Pilih...</option>
                        <option value="20-50" {{ request('luas_hunian') == '20-50' ? 'selected' : '' }}>20 - 50
                        </option>
                        <option value="51-80" {{ request('luas_hunian') == '51-80' ? 'selected' : '' }}>51 - 80
                        </option>
                        <option value="81-110" {{ request('luas_hunian') == '81-110' ? 'selected' : '' }}>81 - 110
                        </option>
                        <option value="101-130" {{ request('luas_hunian') == '101-130' ? 'selected' : '' }}>101 - 130
                        </option>
                        <option value="131+" {{ request('luas_hunian') == '131+' ? 'selected' : '' }}>131 ></option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold mb-1">Tarif Sewa</label>
                    <select class="form-select py-3" name="tarif_sewa" id="tarif_sewa">
                        <option value="">Pilih...</option>
                        <option value="100000-300000"
                            {{ request('tarif_sewa') == '100000-300000' ? 'selected' : '' }}>
                            Rp 100.000 - 300.000</option>
                        <option value="300000-500000"
                            {{ request('tarif_sewa') == '300000-500000' ? 'selected' : '' }}>
                            Rp 300.000 - 500.000</option>
                        <option value="500000-700000"
                            {{ request('tarif_sewa') == '500000-700000' ? 'selected' : '' }}>
                            Rp 500.000 - 700.000</option>
                        <option value="700000-900000"
                            {{ request('tarif_sewa') == '700000-900000' ? 'selected' : '' }}>
                            Rp 700.000 - 900.000</option>
                        <option value="900000+" {{ request('tarif_sewa') == '900000+' ? 'selected' : '' }}>Rp 900.000
                            >
                        </option>
                    </select>
                </div>

                {{-- <div class="col-md-4 d-flex align-items-end gap-2 mb-3">
                    <button type="submit" class="btn btn-dark border-0 flex-grow-1 py-3 mt-4">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('rumah-sewa') }}" class="btn btn-outline-dark py-3 mt-4" title="Reset Filter">
                        <i class="fa fa-sync"></i>
                    </a>
                    <button type="button" class="btn btn-success border-0 py-3 mt-4" id="exportExcel"
                        title="Export Excel">
                        <i class="fa fa-file-excel"></i>
                    </button>
                    <button type="button" class="btn btn-info border-0 py-3 mt-4 text-white" id="exportCsv"
                        title="Export CSV">
                        <i class="fa fa-file-csv"></i>
                    </button>
                </div> --}}

                <div class="col-md-4 d-flex align-items-end gap-2 mb-3">
                    <button class="btn btn-dark border-0 flex-grow-1 py-3 mt-4" id="filter">
                        <i class="fa fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('rumah-sewa') }}" class="btn btn-outline-dark py-3 mt-4" title="Reset Filter">
                        <i class="fa fa-sync"></i> Reset
                    </a>
                    <button class="btn btn-success border-0 py-3 mt-4" id="exportExcel" title="Export Excel">
                        <i class="fa fa-file-excel"></i> Excel
                    </button>
                    <button class="btn btn-info border-0 py-3 mt-4 text-white" id="exportCsv" title="Export CSV">
                        <i class="fa fa-file-csv"></i> CSV
                    </button>
                </div>
            </div>
        </form>

        <div class="row mt-4">
            @forelse($rumahSewaList as $rumahSewa)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="position-relative">
                            <img src="{{ $rumahSewa->gambar_path ? asset('storage/' . $rumahSewa->gambar_path) : asset('images/200.png') }}"
                                class="card-img-top"
                                style="height: 180px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"
                                alt="Rumah Sewa">
                            <span class="badge bg-dark position-absolute bottom-0 start-0 m-2 opacity-75 fw-normal"
                                style="font-size: 10px;">
                                {{ strtoupper($rumahSewa->jenis) }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-3">
                            <div class="mb-2">
                                <small class="text-primary fw-bold" style="font-size: 10px; letter-spacing: 1px;">
                                    {{ $rumahSewa->kecamatan->kode_kec }} / {{ $rumahSewa->kelurahan->kode_deskel }}
                                </small>
                                <h6 class="text-dark fw-bold mb-0 text-truncate" style="font-size: 14px;">
                                    {{ $rumahSewa->kelurahan->nama_deskel }}
                                </h6>
                                <small class="text-muted">{{ $rumahSewa->kecamatan->kecamatan }}</small>
                            </div>

                            <div class="d-flex gap-3 mb-3 border-top pt-2 mt-auto">
                                <div class="small"><i
                                        class="fa fa-expand text-muted me-1"></i>{{ $rumahSewa->luas_hunian }}m²</div>
                                <div class="small"><i
                                        class="fa fa-door-open text-muted me-1"></i>{{ $rumahSewa->jumlah_hunian }}
                                    Unit</div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between pt-2">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 9px;">MULAI DARI</small>
                                    <span class="fw-black text-success" style="font-size: 16px;">
                                        Rp {{ number_format($rumahSewa->tarif_sewa / 1000, 0) }}k<span
                                            class="text-muted fw-normal" style="font-size: 11px;">/bln</span>
                                    </span>
                                </div>
                                <a href="{{ url('/rumah-sewa/' . $rumahSewa->id) }}"
                                    class="btn btn-outline-dark btn-sm px-3 rounded-pill" style="font-size: 11px;">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Tidak ada properti yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $rumahSewaList->links() }}
        </div>

        <section class="py-5 mt-5 border-top">
            <div class="container">
                <div class="text-center mb-5">
                    <h6 class="fw-black text-dark mb-1" style="font-size: 11px; letter-spacing: 3px;">TIMELINE
                        PENDATAAN
                    </h6>
                    <div class="mx-auto bg-primary" style="width: 30px; height: 3px; border-radius: 10px;"></div>
                </div>

                <div class="row g-0 justify-content-center">
                    @php
                        $colors = ['#4F46E5', '#7C3AED', '#DB2777', '#E11D48', '#D97706'];
                    @endphp

                    @foreach ($timeline as $index => $item)
                        <div class="col-md-2 col-6 mb-4 mb-md-0">
                            <div class="text-center position-relative px-2">

                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                        style="width: 35px; height: 35px; background: white; border: 2px solid {{ $colors[$index] }}; z-index: 2; position: relative;">
                                        <div class="rounded-circle"
                                            style="width: 12px; height: 12px; background: {{ $colors[$index] }};">
                                        </div>
                                    </div>
                                </div>

                                @if (!$loop->last)
                                    <div class="d-none d-md-block position-absolute"
                                        style="top: 17px; left: 50%; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;">
                                    </div>
                                @endif

                                <div class="position-relative" style="z-index: 2;">
                                    <h6 class="fw-bold mb-1 text-dark" style="font-size: 12px;">
                                        {{ $item['kegiatan'] }}
                                    </h6>
                                    <span class="fw-medium" style="font-size: 10px; color: {{ $colors[$index] }};">
                                        {{ $item['tgl'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- <div class="row mt-4 mb-3">
            <div class="col-md-4">
                <label>Kecamatan</label>
                <select class="form-select py-3" name="id_kecamatan" id="id_kecamatan">
                    <option value="">Pilih...</option>
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->kode_kec }} - {{ $kec->kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Kelurahan</label>
                <select class="form-select py-3" name="id_kelurahan" id="id_kelurahan">
                </select>
            </div>
            <div class="col-md-4">
                <label>Jenis Rumah</label>
                <select class="form-select py-3" name="jenis" id="jenis">
                    <option value="">Pilih...</option>
                    @foreach ($jenis as $kec)
                        <option value="{{ $kec }}">{{ $kec }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Tipe/Luas</label>
                <select class="form-select py-3" name="luas_hunian" id="luas_hunian">
                    <option value="">Pilih...</option>
                    <option value="20-50">20 - 50</option>
                    <option value="51-80">51 - 80</option>
                    <option value="81-110">81 - 110</option>
                    <option value="101-130">101 - 130</option>
                    <option value="131+">131 ></option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Tarif</label>
                <select class="form-select py-3" name="tarif_sewa" id="tarif_sewa">
                    <option value="">Pilih...</option>
                    <option value="100000-300000">Rp 100.000 - 300.000</option>
                    <option value="300000-500000">Rp 300.000 - 500.000</option>
                    <option value="500000-700000">Rp 500.000 - 700.000</option>
                    <option value="700000-900000">Rp 700.000 - 900.000</option>
                    <option value="900000+">Rp 900.000 ></option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end gap-2">
                <button class="btn btn-dark border-0 flex-grow-1 py-3 mt-4" id="filter">
                    <i class="fa fa-filter"></i> Filter
                </button>
                <button class="btn btn-success border-0 py-3 mt-4" id="exportExcel" title="Export Excel">
                    <i class="fa fa-file-excel"></i> Excel
                </button>
                <button class="btn btn-info border-0 py-3 mt-4 text-white" id="exportCsv" title="Export CSV">
                    <i class="fa fa-file-csv"></i> CSV
                </button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-light mb-0">
                    <div class="card-body">
                        <div class="row" id="rumahSewaCards">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <button class="btn btn-dark" id="prevBtn" disabled>Prev</button>
                <button class="btn btn-dark" id="nextBtn">Next</button>
            </div>
        </div> --}}
    </div>
</section>

<div class="modal fade" id="modalSurvey" tabindex="-1" aria-labelledby="modalSurveyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSurveyLabel">Survey Kepuasan Masyarakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe
                    src="https://surveidigital.spbe.go.id/embed/survey/eyJzdXJ2ZXlfaWQiOjIsInNlcnZpY2VfaWQiOjI4OCwiaG9zdCI6Imh0dHBzOi8vc2lwLWthd2FuLmJhbmphcm1hc2lua290YS5nby5pZC8saHR0cDovLzEyNy4wLjAuMTo4MDAwLyIsImtleSI6ImxEQlFYcHM4In0=/embed/view/"
                    style="width: 100%; height: 600px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('vendor/collab/vendors/bootstrap/bootstrap.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>

<script>
    $(function() {
        $('#id_kecamatan').on('change', function() {
            var id_kecamatan = $(this).val(); // Ambil nilai kecamatan yang dipilih

            // Kosongkan pilihan kelurahan saat kecamatan berubah
            $('#id_kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');

            // Pastikan ada kecamatan yang dipilih
            if (id_kecamatan) {
                // Lakukan request AJAX
                $.ajax({
                    url: "{{ route('boilerplate.kel-desa.get-byidkec') }}", // URL route Laravel
                    type: "POST", // Method request
                    data: {
                        idKec: id_kecamatan
                    }, // Kirim parameter id_kecamatan
                    success: function(response) {
                        // Lakukan pengecekan jika response sukses
                        if (response.results) {
                            // Iterasi melalui data kelurahan yang diterima
                            $.each(response.results, function(key, value) {
                                $('#id_kelurahan').append('<option value="' + value
                                    .id + '">' + value.kode_deskel + ' - ' +
                                    value.text +
                                    '</option>');
                            });
                        } else {
                            alert('Data kelurahan tidak ditemukan!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Terjadi kesalahan: " + error);
                    }
                });
            }
        });

        let currentPage = 1;
        let totalPages = 1;

        // Fungsi untuk mengambil data dengan pagination
        function loadRumahSewaData(page = 1) {
            var id_kecamatan = $('#id_kecamatan').val();
            var id_kelurahan = $('#id_kelurahan').val();
            var jenis = $('#jenis').val();
            var luas_hunian = $('#luas_hunian').val();
            var tarif_sewa = $('#tarif_sewa').val();

            $.ajax({
                url: "{{ route('loadRumahSewaDatatables') }}",
                type: "GET",
                data: {
                    id_kecamatan: id_kecamatan,
                    id_kelurahan: id_kelurahan,
                    jenis: jenis,
                    luas_hunian: luas_hunian,
                    tarif_sewa: tarif_sewa,
                    page: page
                },
                success: function(response) {
                    totalPages = response
                        .total_pages; // Pastikan server mengembalikan total halaman

                    $('#rumahSewaCards').empty(); // Kosongkan konten kartu sebelumnya
                    $.each(response.data, function(index, rumahSewa) {
                        var url = "{{ route('index') }}";
                        var cardHtml = `
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="${rumahSewa.gambar_path ? rumahSewa.gambar_path : (url + '/images/200.png')}" class="card-img-top" alt="Gambar Rumah Sewa">
                                <div class="card-body">
                                    <h5 class="card-title">${rumahSewa.jenis}</h5>
                                    <p class="card-text text-muted">${rumahSewa.kecamatan.kecamatan}, ${rumahSewa.kelurahan.nama_deskel}</p>
                                    <p class="card-text">Luas: ${rumahSewa.luas_hunian} m²</p>
                                    <p class="card-text">Jumlah Hunian: ${rumahSewa.jumlah_hunian}</p>
                                    <p class="card-text">Tarif: <strong>${formatRupiah(rumahSewa.tarif_sewa)}</strong></p>
                                    <a href="/rumah-sewa/${rumahSewa.id}" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    `;
                        $('#rumahSewaCards').append(cardHtml);
                    });

                    // Atur status tombol prev/next
                    updatePaginationButtons();
                },
                error: function(xhr, status, error) {
                    console.log("Terjadi kesalahan: " + error);
                }
            });
        }

        // Fungsi untuk memformat angka ke mata uang Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(angka);
        }

        // Memuat data saat halaman pertama kali dibuka
        loadRumahSewaData();

        // Fungsi untuk memperbarui status tombol pagination
        function updatePaginationButtons() {
            $('#prevBtn').prop('disabled', currentPage === 1);
            $('#nextBtn').prop('disabled', currentPage >= totalPages);
        }

        // Event handler untuk tombol "Next"
        $('#nextBtn').on('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                loadRumahSewaData(currentPage);
            }
        });

        // Event handler untuk tombol "Prev"
        $('#prevBtn').on('click', function() {
            if (currentPage > 1) {
                currentPage--;
                loadRumahSewaData(currentPage);
            }
        });

        // Event listener untuk tombol Filter
        $('#filter').on('click', function() {
            currentPage = 1; // Reset halaman ke 1 saat filter diterapkan
            loadRumahSewaData(currentPage); // Panggil fungsi untuk memuat data dengan filter
        });

        // Fungsi Export
        function exportData(format) {
            var params = {
                id_kecamatan: $('#id_kecamatan').val(),
                id_kelurahan: $('#id_kelurahan').val(),
                jenis: $('#jenis').val(),
                luas_hunian: $('#luas_hunian').val(),
                tarif_sewa: $('#tarif_sewa').val(),
                format: format
            };

            // Membuat query string dari parameter
            var queryString = $.param(params);

            // Mengarahkan ke route export yang sudah kita buat tadi
            window.location.href = "{{ route('rumahsewa.export') }}?" + queryString;

            // Trigger Modal Survey setelah delay singkat (saat proses download dimulai)
            setTimeout(function() {
                $('#modalSurvey').modal('show');
            }, 1500);
        }

        $('#exportExcel').on('click', function() {
            exportData('excel');
        });

        $('#exportCsv').on('click', function() {
            exportData('csv');
        });

    });
</script>
