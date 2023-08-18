@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Rumah Yang Terfasilitasi PSU Perumahan'),
    'subtitle' => __('Data Jumlah Rumah Yang Terfasilitasi PSU Perumahan'),
    'breadcrumb' => [__('Data Jumlah Rumah Yang Terfasilitasi PSU Perumahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.jumlah-rumah-psu.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.jumlah-rumah-psu.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'JumlahRumahPsu']) @endcomponent
    @endcomponent
@endsection
