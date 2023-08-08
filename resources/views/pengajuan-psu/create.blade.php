@extends('boilerplate::layout.index', [
    'title' => __('Status Pengajuan PSU Perumahan'),
    'subtitle' => __('Status Pengajuan PSU Perumahan'),
    'breadcrumb' => [
        __('Status Pengajuan PSU Perumahan') => 'boilerplate.pengajuan-psu.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.pengajuan-psu.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.pengajuan-psu.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Status Pengajuan PSU Perumahan'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_perumahan', 'label' => 'boilerplate::pengajuanpsu.nama_perumahan', 'autofocus' => true])@endcomponent
                    @component('boilerplate::select2', ['name' => 'jenis', 'label' => 'boilerplate::pengajuanpsu.jenis', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('jenis') == '1') selected="selected" @endif>Taman</option>
                        <option value="2" @if (old('jenis') == '2') selected="selected" @endif>Jalan</option>
                    @endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas', 'label' => 'boilerplate::pengajuanpsu.luas'])@endcomponent
                    @component('boilerplate::components.datetimepicker', ['name' => 'tanggal', 'label' => 'boilerplate::pengajuanpsu.tanggal', 'appendText' => 'far fa-calendar-alt', 'format' => 'YYYY-MM-DD', 'value' => now()])@endcomponent()
                    @component('boilerplate::input', ['name' => 'status', 'label' => 'boilerplate::pengajuanpsu.status'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
