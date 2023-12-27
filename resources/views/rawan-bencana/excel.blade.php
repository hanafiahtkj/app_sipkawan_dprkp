<table>
  <thead>
    <tr>
      <th colspan="15">DATA PERUMAHAN DI LOKASI RAWAN BENCANA</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th rowspan="2"><b>No</b></th>
      <th rowspan="2"><b>Jenis Bencana</b></th>
      <th rowspan="2"><b>Tingkat Kerawanan Bencana</b></th>
      <th rowspan="2"><b>Kecamatan</b></th>
      <th rowspan="2"><b>Kelurahan/Desa</b></th>
      <th rowspan="2"><b>Rw</b></th>
      <th rowspan="2"><b>Rt</b></th>
      <th rowspan="2"><b>Luas Perumahan (Ha)</b></th>
      <th rowspan="2"><b>Jumlah Rumah (unit)</b></th>
      <th rowspan="2"><b>Jumlah KK</b></th>
      <th rowspan="2"><b>Jumlah Jiwa</b></th>
      <th colspan="2"><b>Kondisi Fisik Rumah (unit)</b></th>
      <th colspan="2"><b>Status Kepemilikan Rumah (unit)</b></th>
    </tr>
    <tr>
      <th><b>RLH</b></th>
      <th><b>RTLH</b></th>
      <th><b>Hak Milik</b></th>
      <th><b>Sewa</b></th>
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
      <th><b>13</b></th>
      <th><b>14</b></th>
      <th><b>15</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->jenis }}</td>
        <td>{{ $value->tingkat_kerawanan }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->rw }}</td>
        <td>{{ $value->rt }}</td>
        <td>{{ $value->luas }}</td>
        <td>{{ $value->jumlah_rumah }}</td>
        <td>{{ $value->jumlah_kk }}</td>
        <td>{{ $value->jumlah_jiwa }}</td>
        {{-- @php
            $option = $value->kondisi_fisik;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        @php
            $option = $value->status_kepemilikan;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td> --}}
        <td>{{ $value->kondisi_rlh }}</td>
        <td>{{ $value->kondisi_rtlh }}</td>
        <td>{{ $value->status_milik }}</td>
        <td>{{ $value->status_sewa }}</td>
    </tr>
    @endforeach
</table>
