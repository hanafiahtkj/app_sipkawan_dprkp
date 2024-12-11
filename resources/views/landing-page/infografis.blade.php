@include('landing-page.partials.header')

<section class="pb-4 mb-4" id="home"
    style="background-image:url('{{ asset('images/aset-bg.webp') }}');background-position:top;background-size:cover;background-repeat: no-repeat;">
    <div class="container-fluid"> <!-- Ganti container dengan container-fluid -->
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


    </div>
    <!-- end of .container-->
</section>

@include('landing-page.partials.footer')
