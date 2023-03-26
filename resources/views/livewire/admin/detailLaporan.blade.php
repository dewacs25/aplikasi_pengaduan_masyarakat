<div>
    <h1>Detail Pengaduan</h1>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <p>Username : {{ $username }}</p>
                <p>Nama : {{ $nama }}</p>
                <hr>
                <h4 class="text-dark">Isi Laporan</h4>
                <p>{{ $isi_laporan }}</p>
            </div>
            <div class="card">
                <h3 class="text-dark">Foto :</h3>
                <img src="{{ asset('storage/image/laporan/' . $foto) }}" width="100%" alt="">
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <h3 class="text-dark">Tanggapan</h3>
                <textarea class="form-control mb-1" rows="6" placeholder="Berikan Tanggapan"></textarea>
                <button class="btn btn-sm btn-secondary ">Kirim</button>
            </div>
            <div class="card">
                <button class="btn btn-sm btn-primary">Verifikasi</button>
                <button class="btn btn-sm btn-danger">Delete</button>

            </div>
        </div>
    </div>
</div>
