@extends('boilerplate::layout.index', [
    'title' => __('Korban Bencana Yang Belum Tertangani'),
    'subtitle' => __('Korban Bencana Yang Belum Tertangani'),
    'breadcrumb' => [
        __('Korban Bencana Yang Belum Tertangani') => 'boilerplate.korban-bencana.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.korban-bencana.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.korban-bencana.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Korban Bencana Yang Belum Tertangani'])
                    @component('boilerplate::input', ['name' => 'jenis', 'label' => 'boilerplate::korbanbencana.jenis', 'autofocus' => true])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'boilerplate::korbanbencana.tahun'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'rw', 'label' => 'boilerplate::korbanbencana.rw'])@endcomponent
                    @component('boilerplate::input', ['name' => 'rt', 'label' => 'boilerplate::korbanbencana.rt'])@endcomponent
                    @component('boilerplate::input', ['name' => 'jalan', 'label' => 'boilerplate::korbanbencana.jalan'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_kk', 'label' => 'boilerplate::korbanbencana.nama_kk'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nik', 'label' => 'boilerplate::korbanbencana.nik'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jml_anggota_keluarga', 'label' => 'boilerplate::korbanbencana.jml_anggota_keluarga'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'kondisi_ekonomi', 'label' => 'boilerplate::korbanbencana.kondisi_ekonomi', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('kondisi_ekonomi') == '1') selected="selected" @endif>MBR</option>
                        <option value="2" @if (old('kondisi_ekonomi') == '2') selected="selected" @endif>Non MBR</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'tingkat_kerusakan', 'label' => 'boilerplate::korbanbencana.tingkat_kerusakan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('tingkat_kerusakan') == '1') selected="selected" @endif>Rusak Ringan</option>
                        <option value="2" @if (old('tingkat_kerusakan') == '2') selected="selected" @endif>Rusak Sedang</option>
                        <option value="3" @if (old('tingkat_kerusakan') == '3') selected="selected" @endif>Rusak Berat</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'status_kepemilikan', 'label' => 'boilerplate::korbanbencana.status_kepemilikan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('status_kepemilikan') == '1') selected="selected" @endif>Milik Sendiri</option>
                        <option value="2" @if (old('status_kepemilikan') == '2') selected="selected" @endif>Sewa</option>
                        <option value="3" @if (old('status_kepemilikan') == '3') selected="selected" @endif>Lainnya</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'status', 'label' => 'boilerplate::korbanbencana.status', 'minimum-results-for-search' => '-1'])
                        <option value="0" @if (old('status', 0) == '0') selected="selected" @endif>Belum Tertangani</option>
                        <option value="1" @if (old('status') == '1') selected="selected" @endif>Sudah Tertangani</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
