{{-- <div class="sidebar">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" style="width: 100px;" alt="Pengaduan Masyarakat">
    </div>
    <ul class="menu">
        <?php
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ?>
        <li wire:click='Petugas' class="<?php if ($petugas == true):?> active <?php endif ?>">Petugas</li>
        <li wire:click='close' class="<?php if ($pengaturan == null && $petugas == null):?> active <?php endif ?>">Pengaduan</li>
        <li wire:click='Pengaturan'>Pengaturan</li>

        <li class="<?php if ($url == 'http://127.0.0.1:8000/admin/registrasi'):?> active <?php endif ?>">
            <a href="{{ route('logout') }}">Logout</a>
        </li>

    </ul>

</div> --}}
<header class="header">
    <div class="logo">Pengaduan Masyarakat</div>
    <div class="nav-toggle">
        =
    </div>
    <nav class="nav">
        <a wire:click='close'>Beranda</a>
        <a wire:click='Pengaturan'>Pengaturan</a>
        @guest
            
        <a href="/login">Login</a>
        @endguest
    </nav>
</header>

<script>
    const navToggle = document.querySelector(".nav-toggle");
    const navLinks = document.querySelectorAll(".nav a");

    navToggle.addEventListener("click", () => {
        document.body.classList.toggle("active");

    });
    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            document.body.classList.remove("active");
        });
    });
</script>
