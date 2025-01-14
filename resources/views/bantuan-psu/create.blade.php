@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Komplek Perumanan'),
    'subtitle' => __('Sebaran Komplek Perumanan'),
    'breadcrumb' => [
        __('Sebaran Komplek Perumanan') => 'boilerplate.bantuan-psu.index',
        __('Tambah Data'),
    ],
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.bantuan-psu.store', 'autocomplete' => 'off', 'files' => true]) }}
    <div class="row">
        <div class="col-12 pb-3">
            <a href="{{ route('boilerplate.bantuan-psu.index') }}" class="btn btn-default" data-toggle="tooltip"
                title="@lang('boilerplate::users.returntolist')">
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
            @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Bantuan PSU Perumanan'])
                @component('boilerplate::select2', [
                    'name' => 'status_aset',
                    'label' => 'Status Aset',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('status_aset') == '1') selected="selected" @endif>Sudah Diserahkan</option>
                    <option value="2" @if (old('status_aset') == '2') selected="selected" @endif>Belum Diserahkan</option>
                @endcomponent

                @component('boilerplate::input', [
                    'name' => 'nama_perumahan',
                    'label' => 'Nama Perumahan',
                    'autofocus' => true,
                ])
                @endcomponent

                @component('boilerplate::select2', [
                    'name' => 'id_kecamatan',
                    'label' => 'Kecamatan',
                    'id' => 'id_kecamatan',
                    'minimum-results-for-search' => '-1',
                ])
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>
                            {{ $kec->kecamatan }}</option>
                    @endforeach
                @endcomponent

                <x-boilerplate::select2 name="id_kelurahan" label="Kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')"
                    :minimum-results-for-search='-1'></x-boilerplate::select2>

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'jumlah_sertifikat',
                    'label' => 'Jumlah Sertifikat',
                ])
                @endcomponent

                @component('boilerplate::select2', [
                    'name' => 'jenis_psu',
                    'label' => 'Jenis PSU',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('jenis_psu') == '1') selected="selected" @endif>Jalan Aspal</option>
                    <option value="2" @if (old('jenis_psu') == '2') selected="selected" @endif>Jalan Beton</option>
                    <option value="3" @if (old('jenis_psu') == '3') selected="selected" @endif>Fasum</option>
                @endcomponent

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'panjang',
                    'label' => 'Panjang Jalan',
                ])
                @endcomponent

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'lebar',
                    'label' => 'Lebar Jalan',
                ])
                @endcomponent

                @component('boilerplate::select2', [
                    'name' => 'jenis_sarana',
                    'label' => 'Jenis Sarana',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('jenis_sarana') == '1') selected="selected" @endif>Jalan Aspal</option>
                    <option value="2" @if (old('jenis_sarana') == '2') selected="selected" @endif>Jalan Beton</option>
                    <option value="3" @if (old('jenis_sarana') == '3') selected="selected" @endif>Fasum</option>
                @endcomponent

                @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_rumah', 'label' => 'Upload Foto Perumahan'])
                @endcomponent

                @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_psu', 'label' => 'Upload Foto PSU'])
                @endcomponent
            @endcomponent
        </div>
    </div>
    {{ Form::close() }}
@endsection
