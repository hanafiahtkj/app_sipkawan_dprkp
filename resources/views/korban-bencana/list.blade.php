@extends('boilerplate::layout.index', [
    'title' => __('Korban Bencana Yang Belum Tertangani'),
    'subtitle' => __('Korban Bencana Yang Belum Tertangani'),
    'breadcrumb' => [__('Korban Bencana Yang Belum Tertangani')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.korban-bencana.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.korban-bencana.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'korbanbencana']) @endcomponent
    @endcomponent
@endsection
