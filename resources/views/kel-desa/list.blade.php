@extends('boilerplate::layout.index', [
    'title' => __('Kelurahan'),
    'subtitle' => __('Kelurahan'),
    'breadcrumb' => [__('Kelurahan')]
])

@section('content')
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <button class="btn btn-primary" onClick="refresh(this);">
                    <i class="fas fa-refresh"></i> Refresh Data
                </button>
            </span>
        </div>
    </div>
    @component('boilerplate::card')
        @component('boilerplate::datatable', ['name' => 'keldesa']) @endcomponent
    @endcomponent
@endsection

@push('js')
    <script type="text/javascript">
        function refresh(obj) {
            var btn = $(obj).html();
            $(obj).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
            $.ajax({
                type: "POST",
                url: "{{ route('boilerplate.kel-desa.refresh') }}",
                dataType: "json",
                success: function(data, textStatus, jqXHR) {
                    $(".is-invalid").removeClass("is-invalid");
                    if (data['status'] == true) {
                        growl("Data berhasil direfresh", "info");
                    }
                    $(obj).html(btn);
                },
                error: function(data, textStatus, jqXHR) {
                    // alert(jqXHR + ' , Proses Dibatalkan!');
                    growl(jqXHR + ' , Proses Dibatalkan!', "info");
                },
            });
        }
    </script>
@endpush
