<table>
  <thead>
    <tr>
      <th colspan="7">DATA KEPEMILIKAN PENGGUNAAN TANAH</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th><b>No</b></th>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
      <th><b>Penggunaan</b></th>
      <th><b>Sertifikat Hak Milik</b></th>
      <th><b>Penggunaan Tanah</b></th>
      <th><b>Pemanfaatan Tanah</b></th>
    </tr>
    <tr>
      <th><b>1</b></th>
      <th><b>2</b></th>
      <th><b>3</b></th>
      <th><b>4</b></th>
      <th><b>5</b></th>
      <th><b>6</b></th>
      <th><b>7</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->penggunaan }}</td>
        <td>{{ $value->sertifikat_milik }}</td>
        <td>{{ $value->penggunaan_tanah }}</td>
        <td>{{ $value->pemanfaatan_tanah }}</td>
    </tr>
    @endforeach
</table>
