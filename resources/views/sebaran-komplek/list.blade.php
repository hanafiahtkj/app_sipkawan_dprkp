@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Komplek Perumanan'),
    'subtitle' => __('Sebaran Komplek Perumanan'),
    'breadcrumb' => [__('Sebaran Komplek Perumanan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.sebaran-komplek.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'sebarankomplek']) @endcomponent
    @endcomponent
@endsection
