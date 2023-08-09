@extends('boilerplate::layout.index', [
    'title' => __('Jumlah IPAL'),
    'subtitle' => __('Jumlah IPAL'),
    'breadcrumb' => [
        __('Jumlah IPAL') => 'boilerplate.ipal.index',
        __('Edit Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.ipal.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.ipal.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Jumlah IPAL'])
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'tahun', 'label' => 'Tahun', 'value' => $dataInput->tahun])@endcomponent
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                        <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                    </x-boilerplate::select2>
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_ipal', 'label' => 'Jumlah IPAL', 'value' => $dataInput->jumlah_ipal])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'kapasitas_ipal', 'label' => 'Kapasitas IPAL', 'value' => $dataInput->kapasitas_ipal])@endcomponent
                    @component('boilerplate::input', ['name' => 'sumber_data', 'label' => 'Sumber Data', 'value' => $dataInput->sumber_data])@endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
