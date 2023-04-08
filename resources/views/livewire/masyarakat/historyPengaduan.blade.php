<div class="mb-5">

    @if (count($data) < 1)
    <div class="mt-5">
        <center>
            <img src="{{ asset('img/datakosong.png') }}" width="200px" alt="">
        </center>
    </div>

    @else 
    <h1 class="text-dark">History Pengaduan :</h1>
    @foreach ($data as $row)
        <div class="card2">
            <div class="row">
                <div class="col-mobile-6">
                    <span class="text-dark" wire:click="DetailLaporan({{ $row->id_pengaduan }})"
                        style="font-size: 15px; cursor: pointer;">
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

    @endif
</div>
