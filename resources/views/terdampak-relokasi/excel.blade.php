<table>
  <thead>
    <tr>
      <th colspan="11">DATA RUMAH YANG TERKENA RELOKASI PROGRAM PEMERINTAH KABUPATEN/KOTA</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th rowspan="2"><b>No</b></th>
      <th rowspan="2"><b>Jenis Program Relokasi</b></th>
      <th rowspan="2"><b>Kecamatan</b></th>
      <th rowspan="2"><b>Kelurahan/Desa</b></th>
      <th rowspan="2"><b>Jumlah Rumah</b></th>
      <th rowspan="2"><b>Jumlah KK</b></th>
      <th rowspan="2"><b>Jumlah Jiwa</b></th>
      <th colspan="2"><b>Kondisi Ekonomi Keluarga</b></th>
      <th colspan="2"><b>Status Kepemilikan Tanah</b></th>
    </tr>
    <tr>
      <th><b>MBR</b></th>
      <th><b>Non MBR</b></th>
      <th><b>Legal</b></th>
      <th><b>Ilegal</b></th>
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
        <td>{{ $value->jumlah_rumah }}</td>
        <td>{{ $value->jumlah_kk }}</td>
        <td>{{ $value->jumlah_jiwa }}</td>
        @php
            $option = $value->kondisi_fisik;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        @php
            $option = $value->status_kepemilikan;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
    </tr>
    @endforeach
</table>
