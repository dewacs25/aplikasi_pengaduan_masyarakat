<div>
    <button wire:click='close' class="btn btn-sm btn-transparent"><span><img src="{{ asset('img/back.svg') }}" width="30px" alt=""></span></button>
            <div class="row">
                <div class="col-6 card">
                    
                    <h3>Isi Laporan Anda :</h3>
                    <p>{{ $isiLaporan }}</p>
                    <h3>Foto : </h3>
                    @if (!$detailGambarLaporan == null)
                        <img src="{{ asset('storage/image/laporan/' . $detailGambarLaporan) }}" width="100%"
                            alt="">
                    @else
                        <img src="{{ asset('img/imgNone.png') }}" width="100%" alt="">
                    @endif
                    <h3>Status : </h3>
                    <span
                        class="text-light 
                                @if ($status == 'proses') bg-warning
                                @elseif($status == 'selesai')
                                bg-success @endif
                                "
                        style="margin-right: 10px; padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 10px">
                        {{ $status }}
                    </span>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    @if ($status != 'selesai')
                        
                    <button class="btn btn-sm btn-danger" wire:click='DeleteLaporan({{ $id_pengaduan }})'>Delete</button>
                    @endif
                </div>
            </div>
</div>
