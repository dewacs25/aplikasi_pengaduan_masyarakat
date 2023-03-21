<div>
    <div class="card-login">
        <h3 class="text-center text-primary">Form Pengaduan</h3>

        <input type="file" wire:model='gambar' placeholder="Gambar" class="form-control mb-3">
        @if ($gambar)
            <img src="{{ $gambar->temporaryUrl() }}" style="width: 100%" alt="">
        @endif
        <textarea name="isiLaporan" id="" rows="5" class="form-control mb-3" placeholder="Masukan Laporan Anda"></textarea>
        <center>
            <button class="btn btn-primary mb-3">Kirim</button>
        </center>
    </div>
</div>
