<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>Login</h1>
    
    @if ($errors->has('login-error'))
        <div style="color:red;">
            {{ $errors->first('login-error') }}
        </div>
    @endif


    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <span>Username</span>
        <input type="text" name="username" value="{{ old('username') }}" required>
        <br>

        <span>Password</span>
        <input type="password" name="password" required>
    
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>