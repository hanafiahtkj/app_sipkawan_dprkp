<table>
  <thead>
    <tr>
      <th colspan="6">DATA SEBARAN KOMPLEK PERUMAHAN DI KOTA BANJARMASIN</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th><b>No</b></th>
      <th><b>Nama Perumahan</b></th>
      <th><b>Nama Pengembang</b></th>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
      <th><b>Luas</b></th>
      <th><b>Jenis</b></th>
    </tr>
    <tr>
      <th><b>1</b></th>
      <th><b>2</b></th>
      <th><b>3</b></th>
      <th><b>4</b></th>
      <th><b>5</b></th>
      <th><b>6</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->nama_perumahan }}</td>
        <td>{{ $value->nama_pengembang }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->luas }}</td>
        <td>{{ $value->jenis }}</td>
    </tr>
    @endforeach
</table>
