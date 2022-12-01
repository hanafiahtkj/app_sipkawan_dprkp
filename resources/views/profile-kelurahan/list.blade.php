@extends('boilerplate::layout.index', [
    'title' => __('Profil Kelurahan'),
    'subtitle' => __('Profil Kelurahan'),
    'breadcrumb' => [__('Profil Kelurahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.profile-kelurahan.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'profilekelurahan']) @endcomponent
    @endcomponent
@endsection
