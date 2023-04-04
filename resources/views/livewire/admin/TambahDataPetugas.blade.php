<div>
    <h1>Tambah Petugas</h1>
    <div class="row">
        <div class="col-6">
            <div class="card text-dark">
                @if ($errors->any())
                    @foreach ($errors->all() as $er)
                        <p style="font-size: 12px; color: red">{{ $er }}</p>
                    @endforeach
                @endif
                <h3 class="text-dark">Masukan Data Petugas</h3>

                <form method="POST" wire:submit.prevent="Tambah">
                    <input type="hidden" wire:model='usernameLama'>

                    <div class="mb-3">
                        <label for="Name"><span class="">Nama Petugas :</span></label>
                        <input wire:model='nama_petugas' type="text" class="form-control">
                    </div>

                    <div class=" mb-3">
                        <label for="username"><span class="">Username :</span></label>
                        <input wire:model='username' type="text" id="username" name="username" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="telepon"><span class="">No Telp :</span></label>
                        <input wire:model='telp' type="number" id="telepon" name="telepon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Level :</label>
                        <select wire:model="level" class="form-control">
                            <option selected>Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Password :</label>
                        <input type="text" class="form-control" wire:model='password'>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <a wire:click="close" class="btn btn-danger btn-sm mb-3">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>