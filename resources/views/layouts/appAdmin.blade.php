    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin</title>
    </head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @livewireStyles

    <body>
        
        @include('layouts.navAdmin')
        <div class="content">
            @yield('content_admin')
        </div>
        @livewireScripts
        <script src="{{ asset('js/main.js') }}"></script>
    </body>

    </html>
