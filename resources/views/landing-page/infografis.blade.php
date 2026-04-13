@include('landing-page.partials.header')

<section class="pb-4 mb-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:top;background-size:cover;background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="fw-bold fs-4 fs-lg-6 fs-xxl-7 text-secondary"> INFOGRAFIS</h1>
            </div>
        </div>
    </div>
</section>

<section id="infografis" class="py-4 mt-2"
    style="background-image:url('{{ asset('images/bg.png') }}');background-position: center;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center my-2">
                <h6 class="fw-bold fs-4 display-3 lh-sm mb-2">Data Infografis</h6>
                <hr>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS DATA PERUMAHAN.webp') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS DATA PERUMAHAN.webp') }}" class="card-img-top"
                        alt="Card image 1">
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS DATA RUMAH SEWA 2023.webp') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS DATA RUMAH SEWA 2023.webp') }}"
                        class="card-img-top" alt="Card image 2">
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/DATA PERTANAHAN/DATA PERTANAHAN (1)-1.webp') }}">
                    <img src="{{ asset('assets/infografis/DATA PERTANAHAN/DATA PERTANAHAN (1)-1.webp') }}"
                        class="card-img-top" alt="Card image 3">
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal"
                    data-bs-image="{{ asset('assets/infografis/INFOGRAFIS_RUSUNAWA_2024.jpg') }}">
                    <img src="{{ asset('assets/infografis/INFOGRAFIS_RUSUNAWA_2024.jpg') }}" class="card-img-top"
                        alt="Card image 5">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-0">
                <img src="" id="modalImage" class="img-fluid w-100">
            </div>
            <div class="modal-footer">
                <a href="#" id="downloadLink" class="btn btn-primary" download>Download Infografis</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSurveyInfografis" tabindex="-1" aria-labelledby="modalSurveyLabel" aria-hidden="true">
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

@include('landing-page.partials.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const downloadLink = document.getElementById('downloadLink');

        // Logic untuk mengisi modal gambar
        imageModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const imageUrl = button.getAttribute('data-bs-image');
            modalImage.src = imageUrl;
            downloadLink.href = imageUrl;
        });

        // Trigger Modal Survey saat tombol download diklik
        downloadLink.addEventListener('click', function() {
            // Tutup modal gambar dulu agar tidak tumpang tindih
            const bootstrapImageModal = bootstrap.Modal.getInstance(imageModal);
            bootstrapImageModal.hide();

            // Munculkan modal survey setelah delay singkat
            setTimeout(function() {
                const surveyModal = new bootstrap.Modal(document.getElementById(
                    'modalSurveyInfografis'));
                surveyModal.show();
            }, 1000);
        });
    });
</script>
