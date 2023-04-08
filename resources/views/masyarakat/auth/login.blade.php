<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylefront.css') }}">
</head>

<body>

    <div class="container-login">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
          <h1>Login</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $er)
                <p style="font-size: 12px; color: red">{{ $er }}</p>
            @endforeach
        @endif
          <label for="username">Username:</label>
          <input type="text" name="username" placeholder="Username" >

          <label for="password">Password:</label>
          <input type="text" name="password" placeholder="Password" >

          <button type="submit">Submit</button>
        </form>
      </div>

</body>

</html>
