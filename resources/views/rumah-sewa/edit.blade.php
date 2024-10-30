@extends('boilerplate::layout.index', [
    'title' => __('Rumah Sewa Milik Masyarakat'),
    'subtitle' => __('Rumah Sewa Milik Masyarakat'),
    'breadcrumb' => [
        __('Rumah Sewa Milik Masyarakat') => 'boilerplate.rumah-sewa.index',
        __('Tambah Data'),
    ],
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.rumah-sewa.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) }}
    <div class="row">
        <div class="col-12 pb-3">
            <a href="{{ route('boilerplate.rumah-sewa.index') }}" class="btn btn-default" data-toggle="tooltip"
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
            @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Rumah Sewa Milik Masyarakat'])
                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'tahun',
                    'label' => 'Tahun',
                    'value' => $dataInput->tahun,
                ])
                @endcomponent
                @component('boilerplate::input', [
                    'name' => 'jenis',
                    'label' => 'boilerplate::rumahsewa.jenis',
                    'value' => $dataInput->jenis,
                    'autofocus' => true,
                ])
                @endcomponent
                @component('boilerplate::input', [
                    'name' => 'alamat',
                    'label' => 'boilerplate::rumahsewa.alamat',
                    'value' => $dataInput->alamat,
                ])
                @endcomponent
                @component('boilerplate::select2', [
                    'name' => 'id_kecamatan',
                    'label' => 'boilerplate::korbanbencana.kecamatan',
                    'id' => 'id_kecamatan',
                    'minimum-results-for-search' => '-1',
                ])
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>
                            {{ $kec->kecamatan }}</option>
                    @endforeach
                @endcomponent
                <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')"
                    :minimum-results-for-search='-1'>
                    <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>
                        {{ $keldes->nama_deskel }}</option>
                </x-boilerplate::select2>
                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'luas_hunian',
                    'label' => 'boilerplate::rumahsewa.luas_hunian',
                    'value' => $dataInput->luas_hunian,
                ])
                @endcomponent
                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'jumlah_hunian',
                    'label' => 'boilerplate::rumahsewa.jumlah_hunian',
                    'value' => $dataInput->jumlah_hunian,
                ])
                @endcomponent
                @component('boilerplate::input', [
                    'type' => 'number',
                    'name' => 'tarif_sewa',
                    'label' => 'boilerplate::rumahsewa.tarif_sewa',
                    'value' => $dataInput->tarif_sewa,
                ])
                @endcomponent
                @component('boilerplate::select2', [
                    'name' => 'kondisi_hunian',
                    'label' => 'boilerplate::rumahsewa.kondisi_hunian',
                    'minimum-results-for-search' => '-1',
                ])
                    <option value="1" @if (old('kondisi_hunian', $dataInput->kondisi_hunian) == '1') selected="selected" @endif>Layak</option>
                    <option value="2" @if (old('kondisi_hunian', $dataInput->kondisi_hunian) == '2') selected="selected" @endif>Kurang Layak</option>
                    <option value="3" @if (old('kondisi_hunian', $dataInput->kondisi_hunian) == '3') selected="selected" @endif>Tidak Layak</option>
                @endcomponent
                @component('boilerplate::input', [
                    'name' => 'keterangan',
                    'label' => 'boilerplate::rumahsewa.keterangan',
                    'value' => $dataInput->keterangan,
                ])
                @endcomponent

                <!-- Input gambar -->
                @component('boilerplate::input', ['type' => 'file', 'name' => 'gambar', 'label' => 'Upload Gambar'])
                @endcomponent

                <!-- Cek apakah gambar ada, jika ada tampilkan tautan -->
                @if ($dataInput->gambar_path)
                    <div class="form-group">
                        <label>Gambar Sebelumnya:</label>
                        <br>
                        <img src="{{ Storage::url($dataInput->gambar_path) }}" alt="Gambar Rumah Sewa" class="img-fluid"
                            style="max-width: 200px;">
                        <br>
                        <a href="{{ Storage::url($dataInput->gambar_path) }}" target="_blank">Lihat Gambar</a>
                    </div>
                @endif
            @endcomponent
        </div>
    </div>
    {{ Form::close() }}
@endsection
