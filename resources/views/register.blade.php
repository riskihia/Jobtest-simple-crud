<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>Register</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <span>Username</span>
        <input type="text" name="username" value="{{ old('username') }}" required>
        <br>

        <span>Password</span>
        <input type="password" name="password" required>
    
        <br>
        <button type="submit">Register</button>
    </form>
    <br>
    <button><a href="/login">Login</a></button>
</body>
</html>