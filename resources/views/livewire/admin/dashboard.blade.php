<div>
    <h1>Dashboard {{ Auth::guard('petugas')->user()->level }}</h1>
    <div class="row">
        <div class="col-4">
            <div class="card bg-danger border-0 text-light">
                Pengaduan Reject : {{ $jumlahPengaduanReject }}
            </div>
        </div>
        <div class="col-4 ms-1 ">
            <div class="card bg-warning border-0 text-light">
                Pengaduan Proses : {{ $jumlahPengaduanProses }}
            </div>
        </div>
        <div class="col-4 ms-1 ">
            <div class="card bg-success border-0 text-light">
                Pengaduan Selesai : {{ $jumlahPengaduanSelesai }}
            </div>
        </div>

    </div>
</div>
