
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Author</title>
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

<h1>Daftar Author</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
            <th>Photo</th>
            <th>bio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author['id'] }}</td>
                <td>{{ $author['name'] }}</td>
                <td>{{ $author['photo'] }}</td>
                <td>{{ $author['bio'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>