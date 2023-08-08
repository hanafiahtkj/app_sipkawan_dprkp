@extends('boilerplate::layout.index', [
    'title' => __('Rumah yang Terkena Relokasi'),
    'subtitle' => __('Rumah yang Terkena Relokasi'),
    'breadcrumb' => [
        __('Rumah yang Terkena Relokasi') => 'boilerplate.terdampak-relokasi.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.terdampak-relokasi.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.terdampak-relokasi.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Rumah yang Terkena Relokasi'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::input', ['name' => 'jenis', 'label' => 'boilerplate::terdampakrelokasi.jenis', 'autofocus' => true])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::terdampakrelokasi.jumlah_rumah'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_kk', 'label' => 'boilerplate::terdampakrelokasi.jumlah_kk'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_jiwa', 'label' => 'boilerplate::terdampakrelokasi.jumlah_jiwa'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'kondisi_ekonomi', 'label' => 'boilerplate::terdampakrelokasi.kondisi_ekonomi', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('kondisi_ekonomi') == '1') selected="selected" @endif>MBR</option>
                        <option value="2" @if (old('kondisi_ekonomi') == '2') selected="selected" @endif>Non MBR</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'status_kepemilikan', 'label' => 'boilerplate::terdampakrelokasi.status_kepemilikan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('status_kepemilikan') == '1') selected="selected" @endif>Legal</option>
                        <option value="2" @if (old('status_kepemilikan') == '2') selected="selected" @endif>Ilegal</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
