@extends('boilerplate::layout.index', [
    'title' => __('Status Pengadaan PSU Perumahan'),
    'subtitle' => __('Status Pengadaan PSU Perumahan'),
    'breadcrumb' => [
        __('Status Pengadaan PSU Perumahan') => 'boilerplate.pengadaan-psu.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.pengadaan-psu.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.pengadaan-psu.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
                    <span class="far fa-arrow-alt-circle-left text-muted"></span>
                </a>
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <!-- @lang('boilerplate::users.save') -->
                        <i class="fas fa-save"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Status Pengadaan PSU Perumahan'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_perumahan', 'label' => 'boilerplate::pengadaanpsu.nama_perumahan', 'autofocus' => true])@endcomponent
                    @component('boilerplate::select2', ['name' => 'jenis', 'label' => 'boilerplate::pengadaanpsu.jenis', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('jenis') == '1') selected="selected" @endif>Taman</option>
                        <option value="2" @if (old('jenis') == '2') selected="selected" @endif>Jalan</option>
                    @endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas', 'label' => 'boilerplate::pengadaanpsu.luas'])@endcomponent
                    @component('boilerplate::input', ['name' => 'status', 'label' => 'boilerplate::pengadaanpsu.status'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
