@extends('boilerplate::layout.index', [
    'title' => __('Data Kependudukan'),
    'subtitle' => __('Data Kependudukan'),
    'breadcrumb' => [__('Data Kependudukan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                {{-- <a href="{{ route("boilerplate.kependudukan.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a> --}}
                <a href="{{ route("boilerplate.kependudukan.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'kependudukan']) @endcomponent
    @endcomponent
@endsection
