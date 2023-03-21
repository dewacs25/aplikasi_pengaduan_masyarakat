<nav>
    <?php
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <ul>
        <li class="<?php if ($url == 'http://127.0.0.1:8000/petugas'):?> active <?php endif ?>"><a href="/petugas"><img src="{{ asset('img/orang.png') }}" style="width: 20px" alt=""></a></li>
        <li class="<?php if ($url == 'http://127.0.0.1:8000/'):?> active <?php endif ?>"><a href="/"><img src="{{ asset('img/chat.png') }}" style="width: 20px" alt=""></a></li>
        <li><a href="#" class="<?php if ($url == 'http://127.0.0.1:8000/pengaturan'):?> active <?php endif ?>"><img src="{{ asset('img/seting.png') }}" style="width: 20px" alt=""></a></li>
    </ul>
</nav>
