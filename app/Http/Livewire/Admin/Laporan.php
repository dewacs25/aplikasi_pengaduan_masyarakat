<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Laporan extends Component
{
    public $detail;

    public $isi_laporan;
    public $foto;
    public $username;
    public $nama;
    public $status;
    public $idPengaduan;

    public function render()
    {
        $data =  Pengaduan::paginate(10);
       
        return view('livewire.admin.laporan',[
            'data'=>$data
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
        $data = Pengaduan::where('id_pengaduan',$id)->get()->first();
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
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }

    public function Verified()
    {
        Pengaduan::where('id_pengaduan',$this->idPengaduan)->update([
            'status'=>'selesai'
        ]);
        session()->flash('success','Success Verified');
        $this->detail($this->idPengaduan);
    }
    public function Unverified()
    {
        Pengaduan::where('id_pengaduan',$this->idPengaduan)->update([
            'status'=>'proses'
        ]);
        session()->flash('success','Success Proses');
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
}
