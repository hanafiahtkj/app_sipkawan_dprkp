@extends('boilerplate::layout.index', [
    'title' => __('Profil Kelurahan'),
    'subtitle' => __('Profil Kelurahan'),
    'breadcrumb' => [
        __('Profil Kelurahan') => 'boilerplate.profile-kelurahan.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.profile-kelurahan.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.profile-kelurahan.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'E-Profil Kelurahan'])
                    @role('admin_kelurahan')
                        @component('boilerplate::input', ['type' => 'hidden', 'name' => 'id_kecamatan', 'value' => auth()->user()->id_kecamatan])@endcomponent
                        @component('boilerplate::input', ['type' => 'hidden', 'name' => 'id_kelurahan', 'value' => auth()->user()->id_kelurahan])@endcomponent
                    @else
                        @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                            @foreach($kecamatan as $kec)
                                <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                            @endforeach
                        @endcomponent
                        <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @endrole
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas_wilayah', 'label' => 'boilerplate::profilekelurahan.luas_wilayah'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::profilekelurahan.jumlah_rumah'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rt', 'label' => 'boilerplate::profilekelurahan.jumlah_rt'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_kk', 'label' => 'boilerplate::profilekelurahan.jumlah_kk'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_penduduk', 'label' => 'boilerplate::profilekelurahan.jumlah_penduduk'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rtlh', 'label' => 'boilerplate::profilekelurahan.jumlah_rtlh'])@endcomponent
                    @component('boilerplate::input', ['name' => 'keterangan', 'label' => 'boilerplate::profilekelurahan.keterangan'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
