<table>
    <thead>
        <tr>
            <th colspan="11">DATA RUMAH SEWA MILIK MASYARAKAT</th>
        </tr>
    </thead>
</table>

<table border="1">
    <thead>
        <tr>
            <th rowspan="2"><b>No</b></th>
            <th rowspan="2"><b>Jenis Sarana dan Prasarana</b></th>
            <th colspan="3"><b>Lokasi</b></th>
            <th rowspan="2"><b>Tipe/Luas Hunian (m²)</b></th>
            <th rowspan="2"><b>Jumlah Hunian (unit)</b></th>
            <th rowspan="2"><b>Tarif Sewa (Rp)</b></th>
        </tr>
        <tr>
            <th><b>Kecamatan</b></th>
            <th><b>Kelurahan/Desa</b></th>
            <th><b>Alamat Lengkap</b></th>
        </tr>
        <tr>
            <th><b>1</b></th>
            <th><b>2</b></th>
            <th><b>3</b></th>
            <th><b>4</b></th>
            <th><b>5</b></th>
            <th><b>6</b></th>
            <th><b>7</b></th>
            <th><b>8</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->jenis }}</td>
                <td>{{ $value->kecamatan->kecamatan }}</td>
                <td>{{ $value->kelurahan->nama_deskel }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->luas_hunian }}</td>
                <td>{{ $value->jumlah_hunian }}</td>
                <td>{{ $value->tarif_sewa }}</td>
            </tr>
        @endforeach
</table>
