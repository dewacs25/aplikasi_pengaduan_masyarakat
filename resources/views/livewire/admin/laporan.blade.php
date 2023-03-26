<div>
    @include('layouts.alert')

    @if ($detail == true)
        @include('livewire.admin.detailLaporan')
    @else
        <h1>Laporan Masyarakat</h1>
        {{-- <div class="mb-3">
        <a wire:click="btnTambah" class="btn btn-secondary">Tambah</a>
    </div> --}}
        <input type="text" class="mb-3" placeholder="Cari Username" wire:model="cariUsername">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Waktu Pengaduan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $row)
                        <tr>
                            @if ($cariUsername)
                                <td>{{ ++$key }}</td>
                            @else
                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</td>
                            @endif
                            <td>{{ $row->masyarakat->username }}</td>
                            <td>{{ $row->masyarakat->nama }}</td>
                            <td>{{ $row->masyarakat->telp }}</td>
                            <td>{{ $row->created_at->format('d M Y H:i:s') }}</td>
                            <td><span
                                    class="text-light
                                @if ($row->status == 'proses') bg-warning
                                @elseif($row->status == 'selesai')
                                bg-success @endif
                                "
                                    style="padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 10px">{{ $row->status }}</span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary"
                                    wire:click="detail({{ $row->id_pengaduan }})">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($data) < 1)
                <center>
                    <h2>Data Kosong</h2>
                </center>
            @endif
            <br>
            @if (!$cariUsername)
                {{ $data->links() }}
            @endif
        </div>
    @endif

</div>
