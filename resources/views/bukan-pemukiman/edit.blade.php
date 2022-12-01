@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lahan Bukan Pemukiman'),
    'subtitle' => __('Perumahan di Lahan Bukan Pemukiman'),
    'breadcrumb' => [
        __('Perumahan di Lahan Bukan Pemukiman') => 'boilerplate.bukan-pemukiman.index',
        __('Tambah Data')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.bukan-pemukiman.update', $dataInput->id], 'method' => 'put', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.bukan-pemukiman.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
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
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Data Perumahan di Lahan Bukan Pemukiman'])
                    @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                        @foreach($kecamatan as $kec)
                            <option value="{{ $kec->id }}" @if (old('id_kecamatan', $dataInput->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                        @endforeach
                    @endcomponent
                    <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                        <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $dataInput->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                    </x-boilerplate::select2>
                    @component('boilerplate::input', ['name' => 'luas', 'label' => 'boilerplate::bukanpemukiman.luas', 'value' => $dataInput->luas])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_rumah', 'label' => 'boilerplate::bukanpemukiman.jumlah_rumah', 'value' => $dataInput->jumlah_rumah])@endcomponent
                    @component('boilerplate::input', ['type' => 'number', 'name' => 'jumlah_kk', 'label' => 'boilerplate::bukanpemukiman.jumlah_kk', 'value' => $dataInput->jumlah_kk])@endcomponent
                    @component('boilerplate::select2', ['name' => 'kondisi_ekonomi', 'label' => 'boilerplate::bukanpemukiman.kondisi_ekonomi', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('kondisi_ekonomi', $dataInput->kondisi_ekonomi) == '1') selected="selected" @endif>MBR</option>
                        <option value="2" @if (old('kondisi_ekonomi', $dataInput->kondisi_ekonomi) == '2') selected="selected" @endif>Non MBR</option>
                    @endcomponent
                    @component('boilerplate::select2', ['name' => 'status_kepemilikan', 'label' => 'boilerplate::bukanpemukiman.status_kepemilikan', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('status_kepemilikan', $dataInput->status_kepemilikan) == '1') selected="selected" @endif>Legal</option>
                        <option value="2" @if (old('status_kepemilikan', $dataInput->status_kepemilikan) == '2') selected="selected" @endif>Ilegal</option>
                    @endcomponent
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection
