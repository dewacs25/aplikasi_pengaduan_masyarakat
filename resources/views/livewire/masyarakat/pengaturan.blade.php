<div>
    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                @if ($errors->any())
                    @foreach ($errors->all() as $er)
                        <p style="font-size: 12px; color: red">{{ $er }}</p>
                    @endforeach
                @endif
                @if (session()->has('success'))
                    <p>{{ session('success') }}</p>
                @endif
                <form method="POST" wire:submit.prevent='SaveAkun'>
                    <input type="hidden" wire:model='nikLama'>
                    <div class="mb-3">
                        <label for="">Nik :</label>
                        <input wire:model='nik' type="text" class="form-control">
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
                        <button type="submit" class="btn btn-warning btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <a href="{{ route('logout') }}" class="btn btn-danger mt-3 float-end">Logout</a>
        </div>
    </div>
</div>
