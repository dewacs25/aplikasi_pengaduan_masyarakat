<div>
    <div class="row">
        <div class="col-6">
           <div class="card mb-3">
            <form action="">
                <div class="mb-3">
                    <label for="">Nik :</label>
                    <input wire:model='nik' name="nik" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Nama :</label>
                    <input wire:model='nama' name="nama" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">No Telepon :</label>
                    <input wire:model='telp' name="telp" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-warning btn-sm">Save</button>
                </div>
            </form>
           </div>
        </div>
        <div class="col-6">
            <a href="{{ route('logout') }}" class="btn btn-danger mt-3 float-end">Logout</a>
        </div>
    </div>
</div>
