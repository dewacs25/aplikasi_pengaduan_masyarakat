<div>
    @include('layouts.alert')

    @if ($btnTambah == true)
        @include('livewire.admin..tambahRegistrasi')
    @elseif($btnEdit == true)
    @include('livewire.admin..editRegistrasi')
    @else
        <h1>Registrasi</h1>
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
                    @foreach ($data as $key=>$row)
                        <tr>
                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->telp }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" wire:click="btnEdit({{ $row->id_masyarakat }})" >Edit</a>
                                <a  class="btn btn-danger btn-sm" onclick="confirmAction('{{ $row->id_masyarakat }}')">Delete</a>
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
            {{ $data->links() }}
        </div>
    @endif
</div>
