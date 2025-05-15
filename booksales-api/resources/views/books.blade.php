<!-- resources/views/genres/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Daftar Buku</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($books as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['title'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['stock'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
