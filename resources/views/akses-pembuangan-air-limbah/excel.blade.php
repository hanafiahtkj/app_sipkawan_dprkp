<table>
  <thead>
    <tr>
      <th colspan="19">DATA KORBAN BENCANA YANG BELUM TERTANGANI</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th rowspan="2"><b>No</b></th>
      <th rowspan="2"><b>Jenis Bencana</b></th>
      <th rowspan="2"><b>Tahun Terjadinya Bencana</b></th>
      <th rowspan="2"><b>Kecamatan</b></th>
      <th rowspan="2"><b>Kelurahan/Desa</b></th>
      <th rowspan="2"><b>Rw</b></th>
      <th rowspan="2"><b>Rt</b></th>
      <th rowspan="2"><b>Jalan dan Nomor Rumah</b></th>
      <th rowspan="2"><b>Nama Kepala Keluarga</b></th>
      <th rowspan="2"><b>NIK</b></th>
      <th rowspan="2"><b>Jumlah Anggota Keluarga</b></th>
      <th colspan="2"><b>Kondisi Ekonomi Keluarga</b></th>
      <th colspan="3"><b>Tingkat Kerusakan Rumah</b></th>
      <th colspan="3"><b>Status Kepemilikan Rumah</b></th>
    </tr>
    <tr>
      <th><b>MBR</b></th>
      <th><b>Non MBR</b></th>
      <th><b>Rusak Ringan</b></th>
      <th><b>Rusak Sedang</b></th>
      <th><b>Rusak Berat</b></th>
      <th><b>Milik Sendiri</b></th>
      <th><b>Sewa</b></th>
      <th><b>Lainnya</b></th>
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
      <th><b>16</b></th>
      <th><b>17</b></th>
      <th><b>18</b></th>
      <th><b>19</b></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $value)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $value->jenis }}</td>
        <td>{{ $value->tahun }}</td>
        <td>{{ $value->kecamatan->kecamatan }}</td>
        <td>{{ $value->kelurahan->nama_deskel }}</td>
        <td>{{ $value->rw }}</td>
        <td>{{ $value->rt }}</td>
        <td>{{ $value->jalan }}</td>
        <td>{{ $value->nama_kk }}</td>
        <td>{{ $value->nik }}</td>
        <td>{{ $value->jml_anggota_keluarga }}</td>
        @php
            $option = $value->kondisi_ekonomi;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        @php
            $option = $value->tingkat_kerusakan;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        <td>{{ ($option == 3) ? 'V' : '' }}</td>
        @php
            $option = $value->status_kepemilikan;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        <td>{{ ($option == 3) ? 'V' : '' }}</td>
    </tr>
    @endforeach
</table>
