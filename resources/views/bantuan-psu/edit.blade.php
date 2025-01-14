@extends('boilerplate::layout.index', [
    'title' => __('Bantuan PSU Perumanan'),
    'subtitle' => __('Bantuan PSU Perumanan'),
    'breadcrumb' => [
        __('Bantuan PSU Perumanan') => 'boilerplate.bantuan-psu.index',
        __('Tambah Data'),
    ],
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.bantuan-psu.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) }}
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
                    <option value="1" @if (old('status_aset', $dataInput->status_aset) == '1') selected="selected" @endif>Sudah Diserahkan</option>
                    <option value="2" @if (old('status_aset', $dataInput->status_aset) == '2') selected="selected" @endif>Belum Diserahkan</option>
                @endcomponent

                @component('boilerplate::input', [
                    'name' => 'nama_perumahan',
                    'label' => 'Nama Perumahan',
                    'value' => $dataInput->nama_perumahan,
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
                        <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>
                            {{ $kec->kecamatan }}</option>
                    @endforeach
                @endcomponent

                <x-boilerplate::select2 name="id_kelurahan" label="Kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                    <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>
                        {{ $keldes->nama_deskel }}</option>
                </x-boilerplate::select2>

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'jumlah_sertifikat',
                    'label' => 'Jumlah Sertifikat',
                    'value' => $dataInput->jumlah_sertifikat,
                ])
                @endcomponent

                @component('boilerplate::select2', [
                    'name' => 'jenis_psu',
                    'label' => 'Jenis PSU',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('jenis_psu', $dataInput->jenis_psu) == '1') selected="selected" @endif>Jalan Aspal</option>
                    <option value="2" @if (old('jenis_psu', $dataInput->jenis_psu) == '2') selected="selected" @endif>Jalan Beton</option>
                    <option value="3" @if (old('jenis_psu', $dataInput->jenis_psu) == '3') selected="selected" @endif>Fasum</option>
                @endcomponent

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'panjang',
                    'label' => 'Panjang Jalan',
                    'value' => $dataInput->panjang,
                ])
                @endcomponent

                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'lebar',
                    'label' => 'Lebar Jalan',
                    'value' => $dataInput->lebar,
                ])
                @endcomponent

                @component('boilerplate::select2', [
                    'name' => 'jenis_sarana',
                    'label' => 'Jenis Sarana',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('jenis_sarana', $dataInput->jenis_sarana) == '1') selected="selected" @endif>Jalan Aspal</option>
                    <option value="2" @if (old('jenis_sarana', $dataInput->jenis_sarana) == '2') selected="selected" @endif>Jalan Beton</option>
                    <option value="3" @if (old('jenis_sarana', $dataInput->jenis_sarana) == '3') selected="selected" @endif>Fasum</option>
                @endcomponent

                @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_rumah', 'label' => 'Upload Foto Perumahan'])
                @endcomponent

                @if ($dataInput->foto_rumah_path)
                    <div class="form-group">
                        <label>Gambar Sebelumnya:</label>
                        <br>
                        <img src="{{ Storage::url($dataInput->foto_rumah_path) }}" alt="Gambar Rumah Sewa" class="img-fluid"
                            style="max-width: 200px;">
                        <br>
                        <a href="{{ Storage::url($dataInput->foto_rumah_path) }}" target="_blank">Lihat Gambar</a>
                    </div>
                @endif

                @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_psu', 'label' => 'Upload Foto PSU'])
                @endcomponent

                @if ($dataInput->foto_psu_path)
                    <div class="form-group">
                        <label>Gambar Sebelumnya:</label>
                        <br>
                        <img src="{{ Storage::url($dataInput->foto_psu_path) }}" alt="Gambar Rumah Sewa" class="img-fluid"
                            style="max-width: 200px;">
                        <br>
                        <a href="{{ Storage::url($dataInput->foto_psu_path) }}" target="_blank">Lihat Gambar</a>
                    </div>
                @endif
            @endcomponent

        </div>
    </div>
    {{ Form::close() }}
@endsection
