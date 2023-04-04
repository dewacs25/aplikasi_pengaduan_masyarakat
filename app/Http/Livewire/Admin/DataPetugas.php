<?php

namespace App\Http\Livewire\Admin;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DataPetugas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_petugas;
    public $nama_petugas;
    public $username;
    public $telp;
    public $level;
    public $password;

    public $btnEdit;
    public $btnTambah;
    public function render()
    {
        $data = Petugas::paginate(10);
        return view('livewire.admin.data-petugas', [
            'data' => $data
        ]);
    }

    public function btnEdit($id)
    {
        $this->btnEdit = true;
        $data = Petugas::where('id_petugas', $id)->get()->first();
        $this->id_petugas = $data->id_petugas;
        $this->nama_petugas = $data->nama_petugas;
        $this->username = $data->username;
        $this->telp = $data->telp;
        $this->level = $data->level;
    }
    public function close()
    {
        $this->btnEdit = "";
        $this->btnTambah = "";
        $this->id_petugas = "";
        $this->nama_petugas = "";
        $this->username = "";
        $this->telp = "";
        $this->level = "";
        $this->password = "";
    }
    public function Edit()
    {
        $this->validate([
            'nama_petugas' => 'required',
            'username' => ['required', Rule::unique('petugas')->ignore('id_petugas', $this->id_petugas)],
            'telp' => 'required',
            'level' => 'required'
        ]);

        Petugas::where('id_petugas', $this->id_petugas)->update([
            'nama_petugas' => $this->nama_petugas,
            'username' => $this->username,
            'telp' => $this->telp,
            'level' => $this->level,
        ]);

        $this->close();
        session()->flash('success', 'Edit Berhasil');
    }

    public function btnTambah()
    {
        $this->btnTambah = true;
    }

    public function Tambah()
    {
        $this->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas',
            'telp' => 'required',
            'level' => 'required',
            'password' => 'required'
        ]);

        Petugas::create([
            'nama_petugas' => $this->nama_petugas,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'telp' => $this->telp,
            'level' => $this->level,
        ]);

        $this->close();
        session()->flash('success','Tambah Berhasil');
    }
    public function Delete($id)
    {
        $cek = Petugas::where('id_petugas',$id)->get()->first();
        // if($cek->foto != null){
        //     unlink(public_path('storage/image/laporan/' . $this->foto));

        // }
        $cek->delete();
        $this->close();
        session()->flash('success','Berhasil Delete');
    }
}
