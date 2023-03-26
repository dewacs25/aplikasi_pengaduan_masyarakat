<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Laporan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $detail;

    public $isi_laporan;
    public $foto;
    public $username;
    public $nama;
    public $status;
    public $idPengaduan;

    public $tanggapan;

    public $dataTanggapan = [];

    public $cariUsername;


    public function __construct()
    {
        if ($this->tanggapan) {
            $this->dataTanggapan = [];
        }
    }

    public function render()
    {
        $data =  Pengaduan::paginate(10);

        if ($this->cariUsername) {
            $data = Pengaduan::whereHas('masyarakat', function ($query) {
                $query->where('username', 'like', '%' . $this->cariUsername . '%');
            })->get();
        }

        return view('livewire.admin.laporan', [
            'data' => $data
        ]);
    }

    public function close()
    {
        $this->detail = "";

        $this->isi_laporan = "";
        $this->foto = "";
        $this->username = "";
        $this->nama = "";
        $this->status = "";
        $this->idPengaduan = "";
    }


    public function detail($id)
    {
        $this->detail = true;
        $data = Pengaduan::where('id_pengaduan', $id)->get()->first();
        $this->isi_laporan = $data->isi_laporan;
        $this->username = $data->masyarakat->username;
        $this->nama = $data->masyarakat->nama;
        $this->status = $data->status;
        $this->idPengaduan = $data->id_pengaduan;
        if ($data->foto == null) {
            $this->foto = '../../../img/imgNone.png';
        } else {
            $this->foto = $data->foto;
        }
        $this->dataTanggapan = Tanggapan::where('id_pengaduan', $id)->get();
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }

    public function Verified()
    {
        Pengaduan::where('id_pengaduan', $this->idPengaduan)->update([
            'status' => 'selesai'
        ]);
        session()->flash('success', 'Success Verified');
        $this->detail($this->idPengaduan);
    }
    public function Unverified()
    {
        Pengaduan::where('id_pengaduan', $this->idPengaduan)->update([
            'status' => 'proses'
        ]);
        session()->flash('success', 'Success Proses');
        $this->detail($this->idPengaduan);
    }
    public function DeleteLaporan()
    {
        if ($this->foto != '../../../img/imgNone.png') {
            unlink(public_path('storage/image/laporan/' . $this->foto));
        }
        Pengaduan::where('id_pengaduan', $this->idPengaduan)->delete();
        $this->close();
        session()->flash('success', 'Hapus Laporan Berhasil');
    }

    public function KirimTanggapan()
    {
        $this->validate([
            'tanggapan' => 'required'
        ]);

        Tanggapan::create([
            'id_pengaduan' => $this->idPengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->tanggapan,
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas,
        ]);
        $this->tanggapan = "";
        $this->detail($this->idPengaduan);
        session()->flash('success', 'Tanggapan Berhasil Terkirim');
    }
}
