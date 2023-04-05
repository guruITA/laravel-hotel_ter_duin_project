<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
</head>

<body>

  @if (!session('username'))
  <form action="{{ url('/login/admin/submit') }}" method="post">
    @csrf
    <label for="username_medewerker">Username:</label>
    <input type="text" name="username_medewerker" required>

    <label for="password_medewerker">Password:</label>
    <input type="password" name="password_medewerker" required>

    <button type="submit">Login</button>
    @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if(isset($error))
    <div>
      {{ $error }}
    </div>
    @endif  
    <a href="{{ url('register/') }}">Register</a>
  </form>
  @else
  <h1>Welcome, {{ session('username') }}</h1>
  @endif

</body>

</html>