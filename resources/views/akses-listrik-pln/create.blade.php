@extends('boilerplate::layout.index', [
    'title' => __('Jumlah Rumah Yang Memiliki Akses Listrik (PLN)'),
    'subtitle' => __('Jumlah Rumah Yang Memiliki Akses Listrik (PLN)'),
    'breadcrumb' => [
        __('Jumlah Rumah Yang Memiliki Akses Listrik (PLN)') => 'boilerplate.akses-listrik-pln.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.akses-listrik-pln.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.akses-listrik-pln.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Jumlah Rumah Yang Memiliki Akses Listrik (PLN)'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::input', ['name' => 'jenis_klasifikasi', 'label' => 'Jenis Klasifikasi'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'Jumlah Rumah'])@endcomponent
                    @component('boilerplate::input', ['name' => 'sumber_data', 'label' => 'Sumber Data'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
