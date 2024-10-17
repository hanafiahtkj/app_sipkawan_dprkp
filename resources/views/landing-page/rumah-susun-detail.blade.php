@php

    if ($id == 1) {
        $data['nama_rusun'] = 'Rusunawa Ganda Maghfirah';
        $data['kecamatan'] = 'Banjarmasin Selatan';
        $data['kelurahan'] = 'Kelayan Selatan';
        $data['alamat'] = 'Jalan Tembus Mantuil, RT.22, Kelurahan Kelayan Selatan, Kecamatan Banjarmasin Selatan';
        $data['blok'] = 'A';
        $data['lantai'] = '1, 2, 4';
        $data['jumlah_unit'] = '96';
        $data['jumlah_unit_tersedia'] = '29';
    } elseif ($id == 2) {
        $data['nama_rusun'] = 'Rusunawa Ganda Maghfirah';
        $data['kecamatan'] = 'Banjarmasin Selatan';
        $data['kelurahan'] = 'Kelayan Selatan';
        $data['alamat'] = 'Jalan Tembus Mantuil, RT.22, Kelurahan Kelayan Selatan, Kecamatan Banjarmasin Selatan';
        $data['blok'] = 'B';
        $data['lantai'] = '1, 4';
        $data['jumlah_unit'] = '96';
        $data['jumlah_unit_tersedia'] = '18';
    } elseif ($id == 3) {
        $data['nama_rusun'] = 'Rusunawa Ganda Maghfirah';
        $data['kecamatan'] = 'Banjarmasin Selatan';
        $data['kelurahan'] = 'Kelayan Selatan';
        $data['alamat'] = 'Jalan Tembus Mantuil, RT.22, Kelurahan Kelayan Selatan, Kecamatan Banjarmasin Selatan';
        $data['blok'] = 'C';
        $data['lantai'] = 'Dasar, 1, 2, 4';
        $data['jumlah_unit'] = '99';
        $data['jumlah_unit_tersedia'] = '5';
    } elseif ($id == 4) {
        $data['nama_rusun'] = 'Rusunawa Teluk Kelayan';
        $data['kecamatan'] = 'Banjarmasin Selatan';
        $data['kelurahan'] = 'Kelayan Barat';
        $data['alamat'] = 'Jalan Teluk Kelayan, RT.01, Kelurahan Kelayan Barat, Kecamatan Banjarmasin Selatan';
        $data['blok'] = '-';
        $data['lantai'] = '1, 2, 3, 4';
        $data['jumlah_unit'] = '58';
        $data['jumlah_unit_tersedia'] = '11';
    } else {
        $data['nama_rusun'] = '-';
        $data['kecamatan'] = '-';
        $data['kelurahan'] = '-';
        $data['alamat'] = '-';
        $data['blok'] = '-';
        $data['lantai'] = '-';
        $data['jumlah_unit'] = '-';
        $data['jumlah_unit_tersedia'] = '-';
    }

@endphp

@include('landing-page.partials.header')

<section class="pb-4 mt-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:center;background-size:cover;background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-5 col-lg-3 order-0 order-md-1 text-end d-none d-md-block"><img class="pt-7 pt-md-0"
                    src="{{ asset('images/logo-r.webp') }}" alt="hero-header" style="max-height: 300px;" />
            </div> --}}
            <div class="col-lg-12 text-md-start text-center">
                {{-- <h6 class="fs-0 text-uppercase fw-bold text-600">Selamat Datang</h6> --}}
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7">DETAIL RUMAH SUSUN</h1>
                <!-- <a class="btn hover-top btn-collab-outline text-gradient ms-2" href="#!"> <i class="fas fa-play text-danger me-md-2 me-0"></i> CHECK DEMO</a> -->
            </div>
        </div>
    </div>
</section>


<!-- ============================================-->
<!-- <section> begin ============================-->
<section id="statistik" class="py-4"
    style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">

    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/962/575/small_2x/corner-of-empty-room-with-white-walls-floor-free-vector.jpg"
                    class="rounded img-fluid" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5>Profil Umum</h5>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Nama Rumah Susun</label>
                                        <input type="text" class="form-control py-4"
                                            value="{{ $data['nama_rusun'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control py-4"
                                            value="{{ $data['kecamatan'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control py-4"
                                            value="{{ $data['kelurahan'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control py-4" value="{{ $data['alamat'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-white">.</h5>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label>Blok </label>
                                        <input type="text" class="form-control py-4" value="{{ $data['blok'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Lantai </label>
                                        <input type="text" class="form-control py-4" value="{{ $data['lantai'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Jumlah Unit </label>
                                        <input type="text" class="form-control py-4"
                                            value="{{ $data['jumlah_unit'] }}">
                                    </div>
                                    <div class="col-12">
                                        <label>Jumlah Unit Tersedia </label>
                                        <input type="text" class="form-control py-4"
                                            value="{{ $data['jumlah_unit_tersedia'] }}">
                                    </div>
                                </div>
                            </div>
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
<section class="py-0" id="contact">

    <div class="container">

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

<div class="modal fade" id="moreInfoModal" tabindex="-1" aria-labelledby="moreInfoModalLabel" aria-hidden="true">
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

<!-- Modal untuk Menampilkan Gambar Full -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Full size image">
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
        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('click', function() {
                const imageUrl = this.getAttribute(
                    'data-bs-image'); // Dapatkan URL gambar dari atribut data-bs-image
                const modalImage = document.getElementById(
                    'modalImage'); // Ambil elemen gambar dalam modal
                modalImage.src =
                    imageUrl; // Setel sumber gambar modal menjadi gambar yang diklik
            });
        });
    });
</script>


<script type="text/javascript">
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
                                    .id + '">' + value.text +
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

        let datatable = $('#dt_sebarankomplek').DataTable({
            ajax: {
                url: "{{ route('loadPerumahanDatatables') }}",
                data: function(d) {
                    d.id_kecamatan = $('#id_kecamatan').val();
                    d.id_kelurahan = $('#id_kelurahan').val();
                    d.jenis = $('#jenis').val();
                },
            },
            columns: [{
                    data: "nama_perumahan"
                },
                {
                    data: "nama_pengembang"
                },
                {
                    data: "kecamatan.kecamatan"
                },
                {
                    data: "kelurahan.nama_deskel"
                },
                {
                    data: "luas"
                },
                {
                    data: "jenis"
                },
            ],
        });

        $('#filter').on('click', function() {
            if (datatable) {
                datatable.ajax.reload(null, false);
            }
        });

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

</body>

</html>
