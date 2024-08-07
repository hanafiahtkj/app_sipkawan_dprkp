<div class="card border-light mb-0">
    <h5 class="card-header bg-light py-3">
        Data Rumah Sewa Milik Masyarakat
    </h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover va-middle w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Jenis Sarana</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Tipe/Luas Hunian</th>
                        <th>Jumlah Hunian</th>
                        <th>Tarif Sewa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $value)
                        <tr>
                            <td>{{ $value->jenis }}</td>
                            <td>{{ $value->kecamatan->kecamatan }}</td>
                            <td>{{ $value->kelurahan->nama_deskel }}</td>
                            <td>{{ $value->luas_hunian }}</td>
                            <td>{{ number_format($value->jumlah_hunian, 0, ',', '.') }}
                            </td>
                            <td>{{ number_format($value->tarif_sewa, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
