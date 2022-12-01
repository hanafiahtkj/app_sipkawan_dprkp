@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lokasi Rawan Bahaya'),
    'subtitle' => __('Perumahan di Lokasi Rawan Bahaya'),
    'breadcrumb' => [__('Perumahan di Lokasi Rawan Bahaya')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.rawan-bahaya.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'rawanbahaya']) @endcomponent
    @endcomponent
@endsection
