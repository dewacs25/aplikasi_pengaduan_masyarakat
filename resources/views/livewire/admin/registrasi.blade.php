<div>
    @include('layouts.alert')

    @if ($btnTambah == true)
        @include('livewire.admin..tambahRegistrasi')
    @else
        <h1>Registrasi</h1>
        <div>
            <a wire:click="btnTambah" class="btn btn-secondary mb-1 float-end">Tambah</a>
        </div>
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
                <tr>
                    <td>1.</td>
                    <td>Jamal Ludin</td>
                    <td>jamal123</td>
                    <td>082125247917</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="">Edit</a>
                        <a class="btn btn-sm btn-danger" href="">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
