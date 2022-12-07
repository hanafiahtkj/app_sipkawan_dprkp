@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lokasi Rawan Bencana'),
    'subtitle' => __('Perumahan di Lokasi Rawan Bencana'),
    'breadcrumb' => [__('Perumahan di Lokasi Rawan Bencana')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.rawan-bencana.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.rawan-bencana.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'rawanbencana']) @endcomponent
    @endcomponent
@endsection
