<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>report</title>

    <style>
        table, tr,td, th{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        .tag{
            border: 1px solid black;
            padding: 4px;
            background-color: rgb(59, 121, 255);
            color: white;
        }
    </style>
</head>
<body>
    <h1>Report</h1>
    <span><a href={{ url('home') }}>Back</a></span>
    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Product name</th>
                <th>Price per item</th>
                <th>Count</th>
                <th>Saldo awal</th>
                <th>Saldo akhir</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->product->name }}</td>
                    <td>{{ $report->product->harga }}</td>
                    <td>{{ $report->count }}</td>
                    <td>{{ $report->saldo_awal }}</td>
                    <td>{{ $report->saldo_akhir }}</td>
                    <td>{{ $report->keterangan }}</td>
                    <td>{{ $report->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>