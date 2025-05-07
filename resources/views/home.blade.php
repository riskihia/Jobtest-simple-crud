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
    <h1>Home</h1>

    <button>
        <a href="{{ url('/home') }}">Home</a>
    </button>
    <button>
        <a href="{{ url('/profile') }}">Profile</a>
    </button>
    <button>
        <a href="{{ url('/report') }}">Report</a>
    </button>
    <button>
        <a href="{{ url('/logout') }}">Logout</a>
    </button>

    <div>
        <strong>wellcome</strong> : {{$customer->username}} <br>
        <strong>saldo</strong> : {{$customer->saldo}} <br>
        <strong>kontak</strong> : {{$customer->kontak}}
    </div>

    <h3>List product</h3>
    <div>
        <h2>Filter Produk Berdasarkan Kategori</h2>

        <form action="{{ url('/product-filter') }}" method="GET">
            @csrf

            <label>
                <input type="checkbox" name="categories[]" value="rumah"
                    {{ in_array('rumah', request()->get('categories', [])) ? 'checked' : '' }}>
                Rumah
            </label>
            <br>
            <label>
                <input type="checkbox" name="categories[]" value="school"
                    {{ in_array('school', request()->get('categories', [])) ? 'checked' : '' }}>
                School
            </label>
            <br>
            <label>
                <input type="checkbox" name="categories[]" value="transportation"
                    {{ in_array('transportation', request()->get('categories', [])) ? 'checked' : '' }}>
                Transportation
            </label>
            <br>
            <label>
                <input type="checkbox" name="categories[]" value="all"
                    {{ in_array('all', request()->get('categories', [])) ? 'checked' : '' }}>
                Tampilkan Semua
            </label>
            <br><br>

            <button type="submit">Filter</button>
        </form>

        <hr>
    </div>
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
                        <form action="/buy" method="GET">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit">Beli</button>
                        </form>
                    </td>
                    <td>
                        @if ($product->categories)
                            @foreach ($product->categories as $item)
                                <span class="tag">{{ $item->name }}</span>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>