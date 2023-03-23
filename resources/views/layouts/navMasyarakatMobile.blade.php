<nav>
    <?php
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <ul>
        <li wire:click='Petugas' class="<?php if ($petugas == true):?> active <?php endif ?>"><a><img src="{{ asset('img/orang.png') }}" style="width: 20px" alt=""></a></li>
        <li wire:click='close' class="<?php if ($pengaturan == null && $petugas == null):?> active <?php endif ?>"><a><img src="{{ asset('img/chat.png') }}" style="width: 20px" alt=""></a></li>
        <li wire:click='Pengaturan'><a class="<?php if ($pengaturan == true):?> active <?php endif ?>"><img src="{{ asset('img/seting.png') }}" style="width: 20px" alt=""></a></li>
    </ul>
</nav>
