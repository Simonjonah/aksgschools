<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Endpoints</title>

    <style>
        body{
            font-family: Arial;
            padding:20px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid #ddd;
        }

        th, td{
            padding:10px;
            text-align:left;
        }

        th{
            background:#f2f2f2;
        }

        tr:nth-child(even){
            background:#fafafa;
        }

        a{
            color:blue;
            text-decoration:none;
        }
    </style>
</head>
<body>

<h1>API Endpoints</h1>

<table>

    <thead>
        <tr>
            <th>Method</th>
            <th>URI</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

   @foreach($routes as $route)

<tr>
    <td>{{ $route['method'] }}</td>

    <td>
        <a href="{{ url($route['uri']) }}" target="_blank">
            {{ $route['uri'] }}
        </a>
    </td>

    <td>{{ $route['name'] ?? 'N/A' }}</td>

    <td>{{ $route['action'] }}</td>
</tr>

@endforeach

    </tbody>

</table>

</body>
</html>