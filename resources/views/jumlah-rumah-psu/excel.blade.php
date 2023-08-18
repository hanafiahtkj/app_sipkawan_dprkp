<table>
    <thead>
      <tr>
        <th colspan="7">DATA JUMLAH RUMAH YANG TERFASILITASI PSU PERUMAHAN</th>
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
        <th><b>JUMLAH RUMAH YANG TERFASILITASI PSU PERUMAHAN</b></th>
        <th><b>JUMLAH PERUMAHAN YANG TERFASILITASI PSU</b></th>
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
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $value)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $value->tahun }}</td>
          <td>{{ $value->kecamatan->kecamatan }}</td>
          <td>{{ $value->kelurahan->nama_deskel }}</td>
          <td>{{ $value->jumlah_rumah_psu }}</td>
          <td>{{ $value->jumlah_perumahan_psu }}</td>
          <td>{{ $value->sumber_data }}</td>
      </tr>
      @endforeach
  </table>
