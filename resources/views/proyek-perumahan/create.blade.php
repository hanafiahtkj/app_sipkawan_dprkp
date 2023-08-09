@extends('boilerplate::layout.index', [
    'title' => __('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi'),
    'subtitle' => __('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi'),
    'breadcrumb' => [
        __('Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi') => 'boilerplate.proyek-perumahan.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.proyek-perumahan.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.proyek-perumahan.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Data Jumlah Rumah Yang Dibangun/ Di Berikan Peningkatan Kualitas / Di Renovasi'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'jenis_penanganan', 'label' => 'Jenis Penanganan'])@endcomponent
                    @component('boilerplate::input', ['name' => 'jenis_program', 'label' => 'Jenis Program'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'Jumlah Rumah'])@endcomponent
                    @component('boilerplate::input', ['name' => 'sumber_data', 'label' => 'Sumber Data'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
