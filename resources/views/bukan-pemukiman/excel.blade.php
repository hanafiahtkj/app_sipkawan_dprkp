<table>
  <thead>
    <tr>
      <th colspan="10">DATA PERUMAHAN DI ATAS LAHAN BUKAN FUNGSI PERMUKIMAN</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th rowspan="2"><b>No</b></th>
      <th colspan="2"><b>Lokasi</b></th>
      <th rowspan="2"><b>Luas Lahan (Ha)</b></th>
      <th rowspan="2"><b>Jumlah Rumah (unit)</b></th>
      <th rowspan="2"><b>Jumlah KK</b></th>
      <th colspan="2"><b>Kondisi Ekonomi (unit rumah)</b></th>
      <th colspan="2"><b>Status Kepemilikan Tanah (unit rumah)</b></th>
    </tr>
    <tr>
      <th><b>Kecamatan</b></th>
      <th><b>Kelurahan/Desa</b></th>
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
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->luas }}</td>
        <td>{{ $value->jumlah_rumah }}</td>
        <td>{{ $value->jumlah_kk }}</td>
        @php
            $option = $value->kondisi_ekonomi;
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
