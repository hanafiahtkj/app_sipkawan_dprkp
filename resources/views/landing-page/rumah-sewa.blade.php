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

    <div class="container">
        <div class="row mt-4 mb-3">
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
        </div>
    </div>
</section>

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
        }

        $('#exportExcel').on('click', function() {
            exportData('excel');
        });

        $('#exportCsv').on('click', function() {
            exportData('csv');
        });

    });
</script>
