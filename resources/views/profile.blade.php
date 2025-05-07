<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
</head>
<body>
    <h1>Profile</h1>

    <p><strong>Username : </strong> {{ $customer->username }}</p>
    <p><strong>Saldo : </strong> {{ $customer->saldo }}</p>
    <p><strong>Kontak : </strong> {{ $customer->kontak }}</p>

    <button><a href={{url('/home')}}>Back</a></button>
    <hr>

    <div>
        <form action="/profile-topup" method="POST">
        @csrf
            <p>Lakuakn top up</p>
            <span>Masukan jumlah : </span>

            <input type="hidden" name="customer_id" value={{ $customer->id }}>
            <input type="number" name="nominal_topup" id="topup">
            <button type="submit">Topup</button>
        </form>
    </div>
</body>
</html>