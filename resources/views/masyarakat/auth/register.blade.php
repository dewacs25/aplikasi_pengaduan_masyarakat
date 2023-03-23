<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <form action="{{ route('register.masyarakat') }}" method="POST">
            @csrf
            <input type="text" name="nik" placeholder="Nik" class="form-control mb-3">
            <input type="text" name="nama" placeholder="Nama" class="form-control mb-3">
            <input type="text" name="username" placeholder="Username" class="form-control mb-3">
            
            <input type="password" name="password" placeholder="Password" class="form-control mb-3">
            <input type="number" name="telp" placeholder="No Telepon" class="form-control mb-3">
            <center>
                <button class="btn btn-primary mb-3">Register</button>
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