@extends('boilerplate::layout.index', [
    'title' => __('RTLH yang sudah tertangani'),
    'subtitle' => __('RTLH yang sudah tertangani'),
    'breadcrumb' => [
        __('RTLH yang sudah tertangani') => 'boilerplate.rtlh.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.rtlh.store', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.rtlh.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data RTLH yang sudah tertangani', 'minimum-results-for-search' => '-1'])
                    @component('boilerplate::input', ['name' => 'nama_kk', 'label' => 'boilerplate::rtlh.nama_kk'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::rtlh.kecamatan', 'id' => 'id_kecamatan'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::rtlh.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'alamat', 'label' => 'boilerplate::rtlh.alamat'])@endcomponent
                    @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_sebelum', 'label' => 'boilerplate::rtlh.foto_sebelum'])@endcomponent
                    @component('boilerplate::input', ['type' => 'file', 'name' => 'foto_sesudah', 'label' => 'boilerplate::rtlh.foto_sesudah'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
