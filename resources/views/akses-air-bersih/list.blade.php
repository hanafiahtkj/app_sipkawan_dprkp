@extends('boilerplate::layout.index', [
    'title' => __('Jumlah Rumah Yang Memiliki Akses Air Bersih (PDAM)'),
    'subtitle' => __('Jumlah Rumah Yang Memiliki Akses Air Bersih (PDAM)'),
    'breadcrumb' => [__('Jumlah Rumah Yang Memiliki Akses Air Bersih (PDAM)')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.akses-air-bersih.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.akses-air-bersih.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'AksesAirBersih']) @endcomponent
    @endcomponent
@endsection
