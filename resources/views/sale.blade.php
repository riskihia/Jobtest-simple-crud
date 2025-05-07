<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale</title>
</head>
<body>
    <h1>Konfirmasi pembelian</h1>

    @if ($errors->has('saldo'))
        <div style="color:red;">
            {{ $errors->first('saldo') }}
        </div>
    @endif

    <p>Anda akan membeli barnag di bawah ini</p>
    <p>Name : {{$product->name}}</p>
    <p>Harga : {{$product->harga}}</p>
    <p>Stok : {{$product->stok}}</p>

    <form action="/buy" method="POST">
    @csrf

        <h4>Tentukan jumlah item:</h4>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="jumlah" placeholder="masukan jumlah..." min="1" max="{{$product->stok}}" required>

        <input type="text" name="keterangan" placeholder="ada catatan?">
        <button type="submit">Beli</button>
    </form>



</body>
</html>