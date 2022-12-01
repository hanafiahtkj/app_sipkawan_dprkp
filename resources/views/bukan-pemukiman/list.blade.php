@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lahan Bukan Pemukiman'),
    'subtitle' => __('Perumahan di Lahan Bukan Pemukiman'),
    'breadcrumb' => [__('Perumahan di Lahan Bukan Pemukiman')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.bukan-pemukiman.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'bukanpemukiman']) @endcomponent
    @endcomponent
@endsection
