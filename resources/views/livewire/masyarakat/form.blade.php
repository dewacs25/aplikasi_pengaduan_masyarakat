<div class="card-form">
    <button wire:click='close' class="float-end btn" style="font-size: 25px">&times;</button>
    <h3 class="">Form Pengaduan</h3>
    @if ($errors->any())
        @foreach ($errors->all() as $er)
            <p style="font-size: 12px; color: red">{{ $er }}</p>
        @endforeach
    @endif



    <label style="font-size: 15px;" for="gambar"><span class="btn btn-secondary">Upload Gambar</span></label>
    <br>
    <input type="file" wire:model='gambar' id="gambar" placeholder="Gambar" class="form-control mb-3"
        style="display: none">
    @if ($gambar)
        <img src="{{ $gambar->temporaryUrl() }}" style="width: 100%" alt="">
    @endif
    <br>
    <textarea wire:model='isiLaporan' name="isiLaporan" id="" rows="5" class="form-control mb-3"
        placeholder="Masukan Laporan Anda"></textarea>
    <center>
        <button wire:click="KirimLaporan" class="btn btn-primary mb-3">Kirim</button>
    </center>
</div>
