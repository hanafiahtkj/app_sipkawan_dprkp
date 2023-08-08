@extends('boilerplate::layout.index', [
    'title' => __('Penanganan di Kawasan Kumuh'),
    'subtitle' => __('Penanganan di Kawasan Kumuh'),
    'breadcrumb' => [
        __('Penanganan di Kawasan Kumuh') => 'boilerplate.bantaran-sungai.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.bantaran-sungai.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.bantaran-sungai.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Penanganan di Kawasan Kumuh'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'jenis_penanganan', 'label' => 'boilerplate::bantaransungai.jenis_penanganan'])@endcomponent
                    @component('boilerplate::select2', ['name' => 'jenis', 'label' => 'boilerplate::bantaransungai.jenis', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('jenis') == '1') selected="selected" @endif>Luas</option>
                        <option value="2" @if (old('jenis') == '2') selected="selected" @endif>Panjang</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
