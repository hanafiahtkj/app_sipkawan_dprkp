@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Fasum di Komplek Perumahan'),
    'subtitle' => __('Sebaran Fasum di Komplek Perumahan'),
    'breadcrumb' => [__('Sebaran Fasum di Komplek Perumahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="{{ route("boilerplate.sebaran-fasum.create") }}" class="btn btn-primary">
                    <!-- {{ __('boilerplate::role.create.title') }} -->
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'sebaranfasum']) @endcomponent
    @endcomponent
@endsection
