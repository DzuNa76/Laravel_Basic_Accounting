<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Layanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Layanan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Layanan</th>
                <th>Deskripsi</th>
                <th>Lama Waktu</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($layanan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->layanan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->lama_waktu }}</td>
                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
