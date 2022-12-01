@extends('boilerplate::layout.index', [
    'title' => __('Dasbor'),
    'subtitle' => 'Dasbor',
    'breadcrumb' => ['Dasbor']]
)

@section('content')
    <div class="card mb-4 ">
        <div class="card-body">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2>Sistem Informasi Perumahan dan Kawasan Permukiman</h2>
                    <div>
                        {{ date_today() }}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('vendor/Ninestars/assets/img/about-img.svg') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- <hr> -->
@endsection
