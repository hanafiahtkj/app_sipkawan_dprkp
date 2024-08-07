<div class="card border-light mb-0">
    <h5 class="card-header bg-light py-3">
        Data Sebaran Komplek Perumahan
    </h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover va-middle w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Perumahan</th>
                        <th>Nama Pengembang</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Luas</th>
                        <th>Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $value)
                        <tr>
                            <td>{{ $value->nama_perumahan }}</td>
                            <td>{{ $value->nama_pengembang }}</td>
                            <td>{{ $value->kecamatan->kecamatan }}</td>
                            <td>{{ $value->kelurahan->nama_deskel }}</td>
                            <td class="text-right">
                                {{ number_format($value->luas, 0, ',', '.') }}
                            </td>
                            <td>{{ App\Models\SebaranKomplek::jenis($value->jenis) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
