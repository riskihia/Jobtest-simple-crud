<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        table, tr,td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Home</h1>

    <button>Home</button>

    <button>profile</button>
    
    <button>logout</button>

    <div>
        <strong>wellcome</strong> : {{$customer->username}}
    </div>

    <h3>List product</h3>
    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->stok }}</td>
                <td>
                    <button>beli</button>
                </td>
                <td>{{ $product->category; }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>