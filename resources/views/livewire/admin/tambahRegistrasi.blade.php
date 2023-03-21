<div>
    <h1>Form Register</h1>
    
    <div class="row">
        <div class="col-6">
            <div class="card text-dark">
                <h3 class="text-dark">Masukan Data User</h3>

                <div class="mb-3">
                    <label for="nik"><span class="">Nik :</span></label>
                    <input type="number" id="nik" name="nik" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="Name"><span class="">Name :</span></label>
                    <input type="text" id="name" name="Name" class="form-control">
                </div>

                <div class=" mb-3">
                    <label for="username"><span class="">Username :</span></label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>

                <div class="mb-3">
                    <button class="btn btn-secondary btn-sm tombolGenerate">Generate Username</button>
                </div>

                <div class=" mb-3">
                    <label for="telepon"><span class="">No Telp :</span></label>
                    <input type="number" id="telepon" name="telepon" class="form-control">
                </div>
                <div>
                    <a wire:click="close" class="btn btn-danger mb-1">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>