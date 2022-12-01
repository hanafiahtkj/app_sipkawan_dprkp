@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lokasi Rawan Bencana'),
    'subtitle' => __('Perumahan di Lokasi Rawan Bencana'),
    'breadcrumb' => [
        __('Perumahan di Lokasi Rawan Bencana') => 'boilerplate.rawan-bencana.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.rawan-bencana.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.rawan-bencana.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Perumahan di Lokasi Rawan Bencana'])
                    @component('boilerplate::input', ['name' => 'jenis', 'label' => 'boilerplate::rawanbencana.jenis', 'autofocus' => true])@endcomponent
                    @component('boilerplate::select2', ['name' => 'tingkat_kerawanan', 'label' => 'boilerplate::rawanbencana.tingkat_kerawanan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('tingkat_kerawanan') == '1') selected="selected" @endif>Rendah</option>
                        <option value="2" @if (old('tingkat_kerawanan') == '2') selected="selected" @endif>Sedang</option>
                        <option value="2" @if (old('tingkat_kerawanan') == '3') selected="selected" @endif>Tinggi</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'rw', 'label' => 'boilerplate::rawanbencana.rw'])@endcomponent
                    @component('boilerplate::input', ['name' => 'rt', 'label' => 'boilerplate::rawanbencana.rt'])@endcomponent
                    @component('boilerplate::input', ['name' => 'luas', 'label' => 'boilerplate::rawanbencana.luas'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::rawanbencana.jumlah_rumah'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_kk', 'label' => 'boilerplate::rawanbencana.jumlah_kk'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_jiwa', 'label' => 'boilerplate::rawanbencana.jumlah_jiwa'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'kondisi_fisik', 'label' => 'boilerplate::rawanbencana.kondisi_fisik', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('kondisi_fisik') == '1') selected="selected" @endif>RLH</option>
                        <option value="2" @if (old('kondisi_fisik') == '2') selected="selected" @endif>RTLH</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'status_kepemilikan', 'label' => 'boilerplate::rawanbencana.status_kepemilikan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('status_kepemilikan') == '1') selected="selected" @endif>Hak Milik</option>
                        <option value="2" @if (old('status_kepemilikan') == '2') selected="selected" @endif>Sewa</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
