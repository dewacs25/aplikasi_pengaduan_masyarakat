
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" style="width: 100px;" alt="Pengaduan Masyarakat">
        </div>
        <ul class="menu">
            <?php
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            ?>
            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/dashboard'):?> active <?php endif ?>">
                <a href="/admin">Dashboard</a>
            </li>
            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/registrasi'):?> active <?php endif ?>">
                <a href="/admin/registrasi">Registrasi</a>
            </li>

            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/registrasi'):?> active <?php endif ?>">
                <a href="{{ route('logout') }}">Logout</a>
            </li>
           
        </ul>

</div>