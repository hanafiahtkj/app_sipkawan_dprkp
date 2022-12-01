@extends('boilerplate::layout.index', [
    'title' => __('Rumah Sewa Milik Masyarakat'),
    'subtitle' => __('Rumah Sewa Milik Masyarakat'),
    'breadcrumb' => [__('Rumah Sewa Milik Masyarakat')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.rumah-sewa.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'rumahsewa']) @endcomponent
    @endcomponent
@endsection
