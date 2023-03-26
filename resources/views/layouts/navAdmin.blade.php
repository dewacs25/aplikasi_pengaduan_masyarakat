<button id="sidebar-toggle" class="btn btn-sm">=</button>
    <div class="sidebar">
        <div class="logo">
            <img src="logo.png" alt="Pengaduan Masyarakat">
        </div>
        <ul class="menu">
            <?php
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            ?>
            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/dashboard'):?> active <?php endif ?>">
                <a href="/admin">Dashboard</a>
            </li>
            @if (Auth::guard('petugas')->user()->level == 'admin')
            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/registrasi'):?> active <?php endif ?>">
                <a href="/admin/registrasi">Registrasi</a>
            </li>
            @endif
            <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/laporan'):?> active <?php endif ?>">
                <a href="/admin/laporan">Laporan</a>
            </li>
            <li >
                <a href="{{ route('logout.admin') }}">Logout</a>
            </li>
           
        </ul>
</div>