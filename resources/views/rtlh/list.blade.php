@extends('boilerplate::layout.index', [
    'title' => __('RTLH yang sudah tertangani'),
    'subtitle' => __('RTLH yang sudah tertangani'),
    'breadcrumb' => [__('RTLH yang sudah tertangani')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.rtlh.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.rtlh.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'rtlh']) @endcomponent
    @endcomponent
@endsection
