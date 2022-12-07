<table>
  <thead>
    <tr>
      <th colspan="6">DATA STATUS PENGADAAN PSU PERUMAHAN</th>
    </tr>
  </thead>
</table>

<table border="1">
  <thead>
    <tr>
      <th rowspan="2"><b>No</b></th>
      <th rowspan="2"><b>Nama Perumahan</b></th>
      <th colspan="2"><b>Jenis Psu</b></th>
      <th rowspan="2"><b>Luas</b></th>
      <th rowspan="2"><b>Status</b></th>
    </tr>
    <tr>
      <th><b>Taman</b></th>
      <th><b>Jalan</b></th>
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
        @php
            $option = $value->jenis;
        @endphp
        <td>{{ ($option == 1) ? 'V' : '' }}</td>
        <td>{{ ($option == 2) ? 'V' : '' }}</td>
        <td>{{ $value->luas }}</td>
        <td>{{ $value->status }}</td>
    </tr>
    @endforeach
</table>
