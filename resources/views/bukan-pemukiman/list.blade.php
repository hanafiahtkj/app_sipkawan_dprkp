@extends('boilerplate::layout.index', [
    'title' => __('Perumahan di Lahan Bukan Pemukiman'),
    'subtitle' => __('Perumahan di Lahan Bukan Pemukiman'),
    'breadcrumb' => [__('Perumahan di Lahan Bukan Pemukiman')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <button type="button" class="btn btn-default mr-1" data-toggle="modal" data-target="#printModal">
                    <i class="fas fa-file-import"></i> Import Excel
                </button>
                <a href="{{ route("boilerplate.bukan-pemukiman.export") }}" class="btn btn-default mr-1">
                    <i class="fas fa-file-export text-success"></i> Export Excel
                </a>
                <a href="{{ route("boilerplate.bukan-pemukiman.create") }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'bukanpemukiman']) @endcomponent
    @endcomponent

     <!-- Modal -->
     <form id="formWrapperModal" method="POST" action="{{ route("boilerplate.bukan-pemukiman.import") }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="printModalLabel">Import Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="control-label" for="input-name">File</label>
                        <input type="file" class="form-control" name="file_excel">
                        <a href="{{ asset('assets/excel/rawan_bencana.xlsx') }}" target="_blank">Download Format Import.xls</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        @csrf
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-save"></i> Lanjut Import</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
