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
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7"> PERUMAHAN</h1>
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

        <div class="row mt-4 mb-3">
            <div class="col-md-4">
                <label>Kecamatan</label>
                <select class="form-select py-3" name="id_kecamatan" id="id_kecamatan">
                    <option value="">Pilih...</option>
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Kelurahan</label>
                <select class="form-select py-3" name="id_kelurahan" id="id_kelurahan">
                </select>
            </div>
            <div class="col-md-4">
                <label>Jenis</label>
                <select class="form-select py-3" name="jenis" id="jenis">
                    <option value="">Pilih...</option>
                    <option value="1" @if (old('jenis') == '1') selected="selected" @endif>Umum</option>
                    <option value="2" @if (old('jenis') == '2') selected="selected" @endif>Komersil
                    </option>
                    <option value="3" @if (old('jenis') == '3') selected="selected" @endif>Berimbang
                    </option>
                    <option value="4" @if (old('jenis') == '4') selected="selected" @endif>Khusus</option>
                    <option value="5" @if (old('jenis') == '5') selected="selected" @endif>Umum dan
                        Komersil</option>
                </select>
            </div>

        </div>

        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3"><i class="fa fa-filter"></i>
                    Filter</button>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-12">

                <div class="card border-light mb-0">
                    {{-- <h5 class="card-header bg-light py-3">
                        Data Perumahan
                    </h5> --}}
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

        $('#dt_sebarankomplek').DataTable({
            ajax: {
                url: "{{ route('loadPerumahanDatatables') }}",
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
