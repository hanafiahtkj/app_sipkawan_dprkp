@extends('boilerplate::layout.index', [
    'title' => __('Jumlah Rumah di Kawasan Kumuh'),
    'subtitle' => __('Jumlah Rumah di Kawasan Kumuh'),
    'breadcrumb' => [__('Jumlah Rumah di Kawasan Kumuh')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.kawasan-kumuh.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.kawasan-kumuh.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'kawasankumuh']) @endcomponent
    @endcomponent
@endsection
