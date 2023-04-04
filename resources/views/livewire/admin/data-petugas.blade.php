<div>

    @if ($btnEdit == true)
        @include('livewire.admin.EditDataPetugas')
    @elseif($btnTambah == true)
        @include('livewire.admin.TambahDataPetugas')
    @else
        <div>
            <h1>Data Petugas</h1>
            <div class="mb-3">
                <a wire:click="btnTambah" class="btn btn-secondary">Tambah</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $row)
                            <tr>
                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</td>
                                <td>{{ $row->nama_petugas }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                        wire:click="btnEdit({{ $row->id_petugas }})">Edit</a>
                                    <a class="btn btn-danger btn-sm"
                                        onclick="confirmAction('{{ $row->id_petugas }}')">Delete</a>
                                    <script>
                                        function confirmAction(parameter) {
                                            if (confirm('Are you sure you want to proceed?')) {
                                                @this.call('Delete', parameter)
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <br>
            </div>
            {{ $data->links() }}
        </div>

    @endif

</div>
