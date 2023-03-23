<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-admin">

    <div class="card-login">
        <h3 class="text-center text-primary">Login</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $er)
                <p style="font-size: 12px; color: red">{{ $er }}</p>
            @endforeach
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" class="form-control mb-3">
            <input type="text" name="password" placeholder="Password" class="form-control mb-3">
            <center>
                <button class="btn btn-primary mb-3">Login</button>
                <br>
                <span class="text-danger" style="font-size: 12px; color:rgb(88, 88, 88);">
                    Tidak Punya Akun Silahkan <a href="/register" style="color: red">Daftar Disini</a>
                </span>
            </center>
        </form>
    </div>

    <script src="./asset/js/main.js"></script>
</body>

</html>
