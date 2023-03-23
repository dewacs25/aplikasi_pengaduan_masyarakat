<div>
    @include('layouts.navMasyarakatMobile')

    <div class="content">
        @if ($pengaturan == true)
            @include('livewire.masyarakat.pengaturan')
        @elseif($petugas == true)
            @include('livewire.masyarakat.petugas')
        @elseif($detail == true)
            @include('livewire.masyarakat.detailLaporan')
        @else
            <div class="card-login mb-3">
                <h3 class="text-center text-primary">Form Pengaduan</h3>
                @if ($errors->any())
                    @foreach ($errors->all() as $er)
                        <p style="font-size: 12px; color: red">{{ $er }}</p>
                    @endforeach
                @endif

                @if (session()->has('success'))
                    <div class="alert">
                        <button class="closeAlert" wire:click='DeleteSession'>&times;</button>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif


                <input type="file" wire:model='gambar' placeholder="Gambar" class="form-control mb-3">
                @if ($gambar)
                    <img src="{{ $gambar->temporaryUrl() }}" style="width: 100%" alt="">
                @endif
                <textarea wire:model='isiLaporan' name="isiLaporan" id="" rows="5" class="form-control mb-3"
                    placeholder="Masukan Laporan Anda"></textarea>
                <center>
                    <button wire:click="KirimLaporan" class="btn btn-primary mb-3">Kirim</button>
                </center>
            </div>
            <div class="mt-5 mb-5">
                <h4 class="text-dark">History Pengaduan :</h4>
                @foreach ($data as $row)
                    <div class="card2">
                        <div class="row">
                            <div class="col-mobile-6">
                                <span class="text-dark" wire:click="DetailLaporan({{ $row->id_pengaduan }})" style="font-size: 15px; cursor: pointer;">
                                    {{ $row->created_at->format('d M Y H:i:s') }}
                                </span>
                            </div>
                            <div class="col-mobile-6">
                                <span
                                    class="text-light float-end 
                                @if ($row->status == 'proses') bg-warning
                                @elseif($row->status == 'selesai')
                                bg-success @endif
                                "
                                    style="margin-right: 10px; padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 10px">
                                    {{ $row->status }}
                                </span>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        @endif

    </div>
</div>
