@extends('boilerplate::layout.index', [
    'title' => __('Jumlah Rumah di Kawasan Kumuh'),
    'subtitle' => __('umlah Rumah di Kawasan Kumuh'),
    'breadcrumb' => [
        __('umlah Rumah di Kawasan Kumuh') => 'boilerplate.kawasan-kumuh.index',
        __('Edit Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.kawasan-kumuh.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.kawasan-kumuh.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Jumlah Rumah di Kawasan Kumuh'])
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::kawasankumuh.jumlah_rumah', 'value' => $dataInput->jumlah_rumah])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_kk', 'label' => 'boilerplate::kawasankumuh.jumlah_kk', 'value' => $dataInput->jumlah_kk])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
