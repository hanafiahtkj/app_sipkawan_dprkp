<table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Column A</th>
            <th>Column B</th>
            <th>Column C</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->columnA }}</td>
                <td>{{ $row->columnB }}</td>
                <td>{{ $row->columnC }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
