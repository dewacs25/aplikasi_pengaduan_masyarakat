<div>

    <h1>Detail Pengaduan</h1>
    <button wire:click='close' class="btn btn-sm btn-transparent"><span><img src="{{ asset('img/back.svg') }}"
                width="30px" alt=""></span></button>

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
                <h3 class="text-dark">Status :</h3>
                @php
                    if ($status == '0') {
                        $status = 'reject';
                    }
                @endphp
                <span
                    class="text-light 
                                @if ($status == 'proses') bg-warning
                                @elseif($status == 'selesai')
                                bg-success
                                @elseif($status == 'reject')
                                bg-danger
                                @endif
                                "
                    style="margin-right: 10px; padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 10px">
                    {{ $status }}
                </span>
            </div>
            <div class="card">
                <h3 class="text-dark">Tanggapan</h3>
                @foreach ($dataTanggapan as $isi)
                    <p>{{ $isi->tanggapan }}</p>
                @endforeach
                
            </div>

        </div>

        <div class="col-6">
            <div class="card">
                
                @if ($errors->any())
                    @foreach ($errors->all() as $er)
                        <p style="font-size: 12px; color: red">{{ $er }}</p>
                    @endforeach
                @endif
                <form method="POST" wire:submit.prevent="KirimTanggapan">
                    <textarea wire:model="tanggapan" class="form-control mb-1" rows="6" placeholder="Berikan Tanggapan"></textarea>
                    <button type="submit" class="btn btn-sm btn-secondary ">Kirim</button>
                </form>
            </div>
            <div class="card">
                @if ($status == 'selesai')
                    <button class="btn btn-secondary btn-sm" wire:click="Unverified">Unverified</button>
                @elseif($status == 'reject')
                    <button class="btn btn-sm btn-warning" wire:click="Accept">Accept</button>
                @else
                    <button class="btn btn-sm btn-primary" wire:click="Verified">Verified</button>
                @endif
                @if ($status == 'proses')
                    <button class="btn btn-danger btn-sm" wire:click="Reject">Reject</button>
                @endif
                @if (Auth::guard('petugas')->user()->level == 'admin')
                    
                <button class="btn btn-sm btn-danger" wire:click="DeleteLaporan">Delete</button>
                @endif
                <a href="/admin/pdf/{{ $idPengaduan }}" class="btn btn-sm btn-secondary">PDF</a>

            </div>
        </div>
    </div>
</div>
