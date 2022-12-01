@extends('boilerplate::layout.index', [
    'title' => __('Status Pengadaan PSU Perumahan'),
    'subtitle' => __('Status Pengadaan PSU Perumahan'),
    'breadcrumb' => [__('Status Pengadaan PSU Perumahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.pengadaan-psu.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'pengadaanpsu']) @endcomponent
    @endcomponent
@endsection
