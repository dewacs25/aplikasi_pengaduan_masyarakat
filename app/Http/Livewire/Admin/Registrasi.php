<?php

namespace App\Http\Livewire\Admin;

use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Registrasi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $btnTambah;
    public $btnEdit;

    public $idM;
    public $nik;
    public $nama;
    public $username;
    public $telp;
    public $password;
    public $nikLama;
    public $usernameLama;

    protected $listeners = [
        'DeleteSession' => 'DeleteSession'
    ];

    public function render()
    {
        $data = Masyarakat::orderBy('created_at', 'desc')->paginate(1);
        return view('livewire.admin.registrasi', [
            'data' => $data
        ]);
    }

    public function btnTambah()
    {
        $this->btnTambah = true;
    }

    public function btnEdit($id)
    {
        $this->btnEdit = true;
        $cek = Masyarakat::where('id_masyarakat', $id)->get()->first();
        $this->idM = $cek->id_masyarakat;
        $this->nik = $cek->nik;
        $this->nama = $cek->nama;
        $this->username = $cek->username;
        $this->telp = $cek->telp;
        $this->nikLama = $cek->nama;
        $this->usernameLama = $cek->username;
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }
    public function CustomUsername()
    {
        $name = "User";
        if ($this->nama) {
            $name = $this->nama;
        }
        $random_number = rand(1000, 9999);
        $this->username = $name . $random_number;
    }

    public function close()
    {
        $this->btnTambah = "";
        $this->btnEdit = "";
        $this->idM = "";
        $this->nik = "";
        $this->nama = "";
        $this->username = "";
        $this->telp = "";
        $this->password = "";
        $this->nikLama = "";
        $this->usernameLama = "";
    }

    public function Tambah()
    {
        $this->validate([
            'nik' => 'required|unique:masyarakat',
            'nama' => 'required',
            'username' => 'required|unique:masyarakat',
            'telp' => 'required',
            'password' => 'required',
        ]);

        Masyarakat::create([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'telp' => $this->telp,
        ]);
        $this->close();
        session()->flash('success', 'User Berhasil Ditambahkan');
    }

    public function Edit()
    {
        $this->validate([
            'nik' => Rule::unique('masyarakat')->ignore('id_masyarakat', $this->idM),
            'username'=>Rule::unique('masyarakat')->ignore('id_masyarakat', $this->idM)
        ]);

        Masyarakat::where('id_masyarakat', $this->idM)->update([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'username'=>$this->username,
            'telp' => $this->telp,
        ]);
        session()->flash('success', 'Data Berhasil Di Update');
    }
    public function Delete($id)
    {
        $cek = Masyarakat::where('id_masyarakat',$id)->delete();
        session()->flash('success','Delete Berhasil');
    }
}
