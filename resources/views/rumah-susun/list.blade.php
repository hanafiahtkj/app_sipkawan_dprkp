@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Rumah Susun Kota Banjarmasin'),
    'subtitle' => __('Sebaran Rumah Susun Kota Banjarmasin'),
    'breadcrumb' => [__('Sebaran Rumah Susun Kota Banjarmasin')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.rumah-susun.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'rumahsusun']) @endcomponent
    @endcomponent
@endsection
