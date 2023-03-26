<div>
    <h1>Form Register</h1>

    <div class="row">
        <div class="col-6">
            <div class="card text-dark">
                @if ($errors->any())
                    @foreach ($errors->all() as $er)
                        <p style="font-size: 12px; color: red">{{ $er }}</p>
                    @endforeach
                @endif
                <h3 class="text-dark">Masukan Data User</h3>

                <form method="POST" wire:submit.prevent="Edit">
                    <input type="hidden" wire:model='nikLama'>
                    <input type="hidden" wire:model='usernameLama'>
                    <div class="mb-3">
                        <label for="nik"><span class="">Nik :</span></label>
                        <input wire:model='nik' type="number" id="nik" name="nik" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Name"><span class="">Name :</span></label>
                        <input wire:model='nama' type="text" id="name" name="Name" class="form-control">
                    </div>

                    <div class=" mb-3">
                        <label for="username"><span class="">Username :</span></label>
                        <input wire:model='username' type="text" id="username" name="username" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="button" wire:click='CustomUsername'
                            class="btn btn-secondary btn-sm tombolGenerate">Generate
                            Username</button>
                    </div>

                    <div class="mb-3">
                        <label for="telepon"><span class="">No Telp :</span></label>
                        <input wire:model='telp' type="number" id="telepon" name="telepon" class="form-control">
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
