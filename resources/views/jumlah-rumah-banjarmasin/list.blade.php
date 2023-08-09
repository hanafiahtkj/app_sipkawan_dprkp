@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Rumah Di Kota Banjarmasin'),
    'subtitle' => __('Data Jumlah Rumah Di Kota Banjarmasin'),
    'breadcrumb' => [__('Data Jumlah Rumah Di Kota Banjarmasin')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                {{-- <a href="{{ route("boilerplate.jumlah-rumah-banjarmasin.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a> --}}
                <a href="{{ route("boilerplate.jumlah-rumah-banjarmasin.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'JumlahRumahBanjarmasin']) @endcomponent
    @endcomponent
@endsection
