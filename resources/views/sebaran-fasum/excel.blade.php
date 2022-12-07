<table>
  <thead>
    <tr>
      <th colspan="11">DATA SEBARAN FASUM DI KOMPLEK PERUMAHAN DI KOTA BANJARMASIN</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th><b>No</b></th>
      <th><b>Penggunaan</b></th>
      <th><b>Keterangan</b></th>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
      <th><b>Luas</b></th>
      <th><b>Nama Perumahan</b></th>
      <th><b>Status Sertifikat</b></th>
      <th><b>No Sertifikat</b></th>
      <th><b>Nama Pengembang</b></th>
      <th><b>Koordinat</b></th>
      <th><b>Tahun Perolehan</b></th>
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
      <th><b>12</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->penggunaan }}</td>
        <td>{{ $value->keterangan }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->luas }}</td>
        <td>{{ $value->nama_perumahan }}</td>
        <td>{{ $value->status_sertifikat }}</td>
        <td>{{ $value->nama_pengembang }}</td>
        <td>{{ $value->koordinat }}</td>
        <td>{{ $value->tahun_perolehan }}</td>
    </tr>
    @endforeach
</table>
