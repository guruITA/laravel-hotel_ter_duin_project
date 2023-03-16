<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>


    <form action="admin/login/submit" method="post">

        @csrf

        <div>
            <input type="text" name="username_medewerker" placeholder="username" required>
        </div>
        <br>
        <div>
            <input type="password" name="password_medewerker" placeholder="password" required>
        </div>
        <br>
        <button type="submit">Inloggen</button>
        @if(isset($error))
        <div>
            {{ $error }}
        </div>
        @endif
        <a href="{{ url('register/') }}">Register</a>
    </form>
</body>

</html>