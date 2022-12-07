<table>
  <thead>
    <tr>
      <th colspan="5">DATA RTLH YANG SUDAH TERTANGANI</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th><b>No</b></th>
      <th><b>Nama KK</b></th>
      <th><b>Alamat</b></th>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
    </tr>
    <tr>
      <th><b>1</b></th>
      <th><b>2</b></th>
      <th><b>3</b></th>
      <th><b>4</b></th>
      <th><b>5</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->nama_kk }}</td>
        <td>{{ $value->alamat }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
    </tr>
    @endforeach
</table>
