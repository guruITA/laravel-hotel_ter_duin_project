<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <h1>Forgot Password</h1>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('forgot-password/submit') }}" method="post">
        @csrf

        <div>
            <label for="email">Username:</label>
            <input type="text" id="username_medewerker" name="username_medewerker" required>
        </div>

        <div>
            <label for="password">New Password:</label>
            <input type="password" id="password_medewerker" name="password_medewerker" required>
        </div>

        <button type="submit">Reset Password</button>
    </form>
</body>

</html>