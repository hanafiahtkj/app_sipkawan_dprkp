@extends('boilerplate::layout.index', [
    'title' => __('Sebaran Fasum di Komplek Perumahan'),
    'subtitle' => __('Sebaran Fasum di Komplek Perumahan'),
    'breadcrumb' => [
        __('Sebaran Fasum di Komplek Perumahan') => 'boilerplate.sebaran-fasum.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.sebaran-fasum.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.sebaran-fasum.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Sebaran Fasum di Komplek Perumahan'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::input', ['name' => 'penggunaan', 'label' => 'boilerplate::sebaranfasum.penggunaan', 'autofocus' => true])@endcomponent
                    @component('boilerplate::input', ['name' => 'keterangan', 'label' => 'boilerplate::sebaranfasum.keterangan'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'luas', 'label' => 'boilerplate::sebaranfasum.luas'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_perumahan', 'label' => 'boilerplate::sebaranfasum.nama_perumahan'])@endcomponent
                    @component('boilerplate::input', ['name' => 'status_sertifikat', 'label' => 'boilerplate::sebaranfasum.status_sertifikat'])@endcomponent
                    @component('boilerplate::input', ['name' => 'no_sertifikat', 'label' => 'boilerplate::sebaranfasum.no_sertifikat'])@endcomponent
                    @component('boilerplate::input', ['name' => 'nama_pengembang', 'label' => 'boilerplate::sebaranfasum.nama_pengembang'])@endcomponent
                    @component('boilerplate::input', ['name' => 'koordinat', 'label' => 'boilerplate::sebaranfasum.koordinat'])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun_perolehan', 'label' => 'boilerplate::sebaranfasum.tahun_perolehan'])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
