@extends('boilerplate::layout.index', [
    'title' => __('Kepemilikan Penggunaan Tanah'),
    'subtitle' => __('Kepemilikan Penggunaan Tanah'),
    'breadcrumb' => [
        __('Kepemilikan Penggunaan Tanah') => 'boilerplate.penggunaan-tanah.index',
        __('Edit Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.penggunaan-tanah.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.penggunaan-tanah.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Kepemilikan Penggunaan Tanah'])
                    @role('admin_kelurahan')
                        @component('boilerplate::input', ['type' => 'hidden', 'name' => 'id_kecamatan', 'value' => auth()->user()->id_kecamatan])@endcomponent
                        @component('boilerplate::input', ['type' => 'hidden', 'name' => 'id_kelurahan', 'value' => auth()->user()->id_kelurahan])@endcomponent
                    @else
                        @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                            @foreach($kecamatan as $kec)
                                <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                            @endforeach
                        @endcomponent
                        <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                            <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                        </x-boilerplate::select2>
                    @endrole
                    @component('boilerplate::input', ['name' => 'penggunaan', 'label' => 'boilerplate::penggunaantanah.penggunaan', 'value' => $dataInput->penggunaan])@endcomponent
                    @component('boilerplate::input', ['name' => 'sertifikat_milik', 'label' => 'boilerplate::penggunaantanah.sertifikat_milik', 'value' => $dataInput->sertifikat_milik])@endcomponent
                    @component('boilerplate::input', ['name' => 'penggunaan_tanah', 'label' => 'boilerplate::penggunaantanah.penggunaan_tanah', 'value' => $dataInput->penggunaan_tanah])@endcomponent
                    @component('boilerplate::input', ['name' => 'pemanfaatan_tanah', 'label' => 'boilerplate::penggunaantanah.pemanfaatan_tanah', 'value' => $dataInput->pemanfaatan_tanah])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
