@extends('boilerplate::layout.index', [
    'title' => __('Status Pengajuan PSU Perumahan'),
    'subtitle' => __('Status Pengajuan PSU Perumahan'),
    'breadcrumb' => [__('Status Pengajuan PSU Perumahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.pengajuan-psu.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Excel
                </a>
                <a href="{{ route("boilerplate.pengajuan-psu.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'pengajuanpsu']) @endcomponent
    @endcomponent
@endsection
