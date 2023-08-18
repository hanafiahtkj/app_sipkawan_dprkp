@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi'),
    'subtitle' => __('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi'),
    'breadcrumb' => [__('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.proyek-perumahan.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.proyek-perumahan.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'ProyekPerumahan']) @endcomponent
    @endcomponent
@endsection
