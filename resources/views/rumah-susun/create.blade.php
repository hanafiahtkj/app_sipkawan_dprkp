@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Rumah Susun Kota Banjarmasin'),
    'subtitle' => __('Sebaran Rumah Susun Kota Banjarmasin'),
    'breadcrumb' => [
        __('Sebaran Rumah Susun Kota Banjarmasin') => 'boilerplate.rumah-susun.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.rumah-susun.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.rumah-susun.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Sebaran Rumah Susun Kota Banjarmasin'])
                    @component('boilerplate::input', ['name' => 'nama_rumah_susun', 'label' => 'boilerplate::rumahsusun.nama_rumah_susun', 'autofocus' => true])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'alamat', 'label' => 'boilerplate::rumahsusun.alamat'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas', 'label' => 'boilerplate::rumahsusun.luas'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah', 'label' => 'boilerplate::rumahsusun.jumlah'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
