<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/stylefront.css') }}">
</head>

<body>

    <div class="container-login">
        <form action="{{ route('register.masyarakat') }}" class="login-form" method="POST">
            <h1>Register</h1>
            @if ($errors->any())
            @foreach ($errors->all() as $er)
            <p style="font-size: 12px; color: red">{{ $er }}</p>
            @endforeach
            @endif
            @csrf
            <input type="text" name="nik" placeholder="Nik">
            <input type="text" name="nama" placeholder="Nama">
            <input type="text" name="username" placeholder="Username">
            
            <input type="password" name="password" placeholder="Password">
            <input type="number" name="telp" placeholder="No Telepon">
            <button type="submit">Register</button>
            <center>
                <br>
                <span class="text-danger" style="font-size: 12px; color:rgb(88, 88, 88);">
                    Sudah Punya Akun Silakan <a href="/login" style="color: red">Login Disini</a>
                </span>
            </center>
        </form>
    </div>

    <script src="./asset/js/main.js"></script>
</body>

</html>