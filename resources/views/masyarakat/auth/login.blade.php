<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylefront.css') }}">
</head>

<body>
    @if (session()->has('loginDulu'))
        <div class="alert">
            <button class="closeAlert" wire:click='DeleteSession'>&times;</button>
            <p>{{ session('loginDulu') }}</p>
        </div>
    @endif
    <a href="/" class="btn btn-sm btn-transparent"><span><img src="{{ asset('img/back.svg') }}" width="30px"
                alt=""></span></a>
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
            <input type="text" name="username" placeholder="Username">

            <label for="password">Password:</label>
            <input type="text" name="password" placeholder="Password">

            <button type="submit">Login</button>
            <p style="font-size: 12px">Belum Punya Akun ? <a href="/register">Daftar Sekarang</a></p>
        </form>

    </div>
    <script>
        const iniAlert = document.querySelector('.alert');
        const closeAlert = document.querySelector('.closeAlert');
        closeAlert.addEventListener('click', function() {
            iniAlert.remove();
        });
    </script>

</body>

</html>
