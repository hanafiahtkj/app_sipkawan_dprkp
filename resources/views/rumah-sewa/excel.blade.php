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
      <th colspan="2"><b>Lokasi</b></th>
      <th rowspan="2"><b>Tipe/Luas Hunian (m²)</b></th>
      <th rowspan="2"><b>Jumlah Hunian (unit)</b></th>
      <th rowspan="2"><b>Tarif Sewa (Rp)</b></th>
      <th colspan="3"><b>Kondisi Hunian (unit)</b></th>
      <th rowspan="2"><b>Keterangan</b></th>
    </tr>
    <tr>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
      <th><b>Layak</b></th>
      <th><b>Kurang Layak</b></th>
      <th><b>Tidak Layak</b></th>
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
      <th><b>9</b></th>
      <th><b>10</b></th>
      <th><b>11</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->jenis }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->luas_hunian }}</td>
        <td>{{ $value->jumlah_hunian }}</td>
        <td>{{ $value->tarif_sewa }}</td>
        @php
            $option = $value->kondisi_hunian;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        <td>{{ ($option == 3) ? 'V' : '' }}</td>
        <td>{{ $value->keterangan }}</td>
    </tr>
    @endforeach
</table>
