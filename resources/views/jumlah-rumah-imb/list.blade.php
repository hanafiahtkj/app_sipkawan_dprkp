@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Rumah Rumah Yang Memiliki IMB/PBG'),
    'subtitle' => __('Data Jumlah Rumah Rumah Yang Memiliki IMB/PBG'),
    'breadcrumb' => [__('Data Jumlah Rumah Rumah Yang Memiliki IMB/PBG')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                {{-- <a href="{{ route("boilerplate.jumlah-rumah-imb.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a> --}}
                <a href="{{ route("boilerplate.jumlah-rumah-imb.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'JumlahRumahImb']) @endcomponent
    @endcomponent
@endsection
