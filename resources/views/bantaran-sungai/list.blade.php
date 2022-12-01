@extends('boilerplate::layout.index', [
    'title' => __('Penanganan di Kawasan Kumuh'),
    'subtitle' => __('Penanganan di Kawasan Kumuh'),
    'breadcrumb' => [__('Penanganan di Kawasan Kumuh')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.bantaran-sungai.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'bantaransungai']) @endcomponent
    @endcomponent
@endsection
