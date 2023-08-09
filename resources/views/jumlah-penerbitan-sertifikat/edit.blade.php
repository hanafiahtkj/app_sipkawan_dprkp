@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Penerbitan Sertifikat'),
    'subtitle' => __('Data Jumlah Penerbitan Sertifikat'),
    'breadcrumb' => [
        __('Data Jumlah Penerbitan Sertifikat') => 'boilerplate.jumlah-penerbitan-sertifikat.index',
        __('Edit Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.jumlah-penerbitan-sertifikat.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.jumlah-penerbitan-sertifikat.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Data Jumlah Penerbitan Sertifikat'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun', 'value' => $dataInput->tahun])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                        <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                    </x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'shgb', 'label' => 'SHGB', 'value' => $dataInput->shgb])@endcomponent
                    @component('boilerplate::input', ['name' => 'shm', 'label' => 'SHM', 'value' => $dataInput->shm])@endcomponent
                    @component('boilerplate::input', ['name' => 'sumber_data', 'label' => 'Sumber Data', 'value' => $dataInput->sumber_data])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
