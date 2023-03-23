<?php

namespace App\Http\Livewire\Masyarakat;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormPengaduan extends Component
{
    use WithFileUploads;
    public $idid;
    public $gambar;
    public $isiLaporan;
    public $nik;
    public $nama;
    public $telp;

    public $pengaturan;
    public $petugas;
    public $nikLama;

    use WithFileUploads;

    public function render()
    {
        $data = Pengaduan::where('id_masyarakat',Auth::guard('web')->user()->id_masyarakat)->get();
        return view('livewire.masyarakat.form-pengaduan',[
            'data'=>$data,
        ]);
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }

    public function Pengaturan()
    {
        $this->close();
        $this->pengaturan = true;
        $data = Masyarakat::where('id_masyarakat',Auth::guard('web')->user()->id_masyarakat)->get()->first();
        $this->nik = $data->nik;
        $this->nama = $data->nama;
        $this->telp = $data->telp;
        $this->idid = $data->id_masyarakat;
        $this->nikLama = $data->nik;
    }

    public function Petugas()
    {
        $this->close();
        $this->petugas = true;
        

    }
    public function close()
    {
        $this->pengaturan = "";
        $this->petugas = "";

    }
    public function SaveAkun()
    {
        $this->validate([
            'nik'=>'required',
        ]);

        $cek = Masyarakat::where('nik',$this->nikLama)->get()->first();

        if ($this->nik !== $this->nikLama && $cek) {
            $this->Pengaturan();
            session()->flash('success','Nik Sudah Digunakan');

        }else{     
            Masyarakat::where('id_masyarakat',$this->idid)->update([
                'nik'=>$this->nik,
                'nama'=>$this->nama,
                'telp'=>$this->telp,
            ]);
            session()->flash('success','Data Berhasil Di Update');
        }
    }

    public function KirimLaporan()
    {
        $this->validate([
            'isiLaporan'=>'required'
        ],[
            'isiLaporan.required'=>'* Silahkan Masukan Laporan Anda Terlebih dahulu'
        ]);

        $namaGambar = null;

        if ($this->gambar) {
            $namaGambar = uniqid().'-'.date('Y-m-d-H-i-s').'.'.$this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('public/image/laporan',$namaGambar,'local');
        }

        Pengaduan::create([
            'tgl_pengaduan'=>date('Y-m-d'),
            'id_masyarakat'=>Auth::guard('web')->user()->id_masyarakat,
            'isi_laporan'=>$this->isiLaporan,
            'foto'=>$namaGambar,
        ]);

        session()->flash('success','Laporan Anda Berhasil Terkirim Dan Sedang Di Proses');
        
    }
}
