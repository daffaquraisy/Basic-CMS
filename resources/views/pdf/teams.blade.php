<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            height: 20px;
        }
    </style>
    <h1>Daftar Tim</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Career</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->jobs->career }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</head>

</html>