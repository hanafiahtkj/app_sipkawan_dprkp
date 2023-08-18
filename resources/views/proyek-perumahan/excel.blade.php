<table>
    <thead>
      <tr>
        <th colspan="8">DATA JUMLAH RUMAH YANG DIBANGUN/ DI BERIKAN PENINGKATAN KUALITAS / DI RENOVASI</th>
      </tr>
    </thead>
  </table>

  <table border="1">
    <thead>
      <tr>
        <th><b>No</b></th>
        <th><b>Tahun</b></th>
        <th><b>Kecamatan</b></th>
        <th><b>Kelurahan/Desa</b></th>
        <th><b>Jenis Penanganan</b></th>
        <th><b>Jenis Program</b></th>
        <th><b>Jumlah Rumah</b></th>
        <th><b>Sumber Data</b></th>
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
          <td>{{ $value->tahun }}</td>
          <td>{{ $value->kecamatan->kecamatan }}</td>
          <td>{{ $value->kelurahan->nama_deskel }}</td>
          <td>{{ $value->jenis_penanganan }}</td>
          <td>{{ $value->jenis_program }}</td>
          <td>{{ $value->jumlah_rumah }}</td>
          <td>{{ $value->sumber_data }}</td>
      </tr>
      @endforeach
  </table>
