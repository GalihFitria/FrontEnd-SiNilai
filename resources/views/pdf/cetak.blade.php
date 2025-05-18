<!DOCTYPE html>
<html>

<head>
    <title>KHS PDF</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center;">Kartu Hasil Studi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Matkul</th>
                <th>Nama Matkul</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khs as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $k['Kode Mata Kuliah'] }}</td>
                <td>{{ $k['Nama Mata Kuliah'] }}</td>
                <td>{{ $k['Jumlah SKS'] }}</td>
                <td>{{ $k['Nilai'] }}</td>
                <td>{{ $k['Status Kelulusan'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>