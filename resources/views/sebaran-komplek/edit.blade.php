@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Komplek Perumanan'),
    'subtitle' => __('Sebaran Komplek Perumanan'),
    'breadcrumb' => [
        __('Sebaran Komplek Perumanan') => 'boilerplate.sebaran-komplek.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.sebaran-komplek.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.sebaran-komplek.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Sebaran Komplek Perumanan'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun', 'value' => $dataInput->tahun])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_perumahan', 'label' => 'boilerplate::sebarankomplek.nama_perumahan', 'value' => $dataInput->nama_perumahan, 'autofocus' => true])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_pengembang', 'label' => 'boilerplate::sebarankomplek.nama_pengembang', 'value' => $dataInput->nama_pengembang])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                        <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                    </x-boilerplate::select2>
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas', 'label' => 'boilerplate::sebarankomplek.luas', 'value' => $dataInput->luas])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::sebarankomplek.jumlah_rumah',  'value' => $dataInput->jumlah_rumah])@endcomponent
                    @component('boilerplate::select2', ['name' => 'jenis', 'label' => 'boilerplate::sebarankomplek.jenis', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('jenis', $dataInput->jenis) == '1') selected="selected" @endif>Umum</option>
                        <option value="2" @if (old('jenis', $dataInput->jenis) == '2') selected="selected" @endif>Komersil</option>
                        <option value="3" @if (old('jenis', $dataInput->jenis) == '3') selected="selected" @endif>Berimbang</option>
                        <option value="4" @if (old('jenis', $dataInput->jenis) == '4') selected="selected" @endif>Khusus</option>
                        <option value="5" @if (old('jenis', $dataInput->jenis) == '5') selected="selected" @endif>Umum dan Komersil</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
