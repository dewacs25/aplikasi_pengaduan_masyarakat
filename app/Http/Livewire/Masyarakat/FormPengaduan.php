<?php

namespace App\Http\Livewire\Masyarakat;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
    public $detailGambarLaporan;
    public $status;
    public $id_pengaduan;

    public $pengaturan;
    public $petugas;
    public $nikLama;

    public $detail;

    use WithFileUploads;

    public function render()
    {
        $data = Pengaduan::where('id_masyarakat', Auth::guard('web')->user()->id_masyarakat)->get();
        return view('livewire.masyarakat.form-pengaduan', [
            'data' => $data,
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
        $data = Masyarakat::where('id_masyarakat', Auth::guard('web')->user()->id_masyarakat)->get()->first();
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
        $this->idid = "";
        $this->gambar = "";
        $this->isiLaporan = "";
        $this->nik = "";
        $this->nama = "";
        $this->telp = "";
        $this->id_pengaduan = "";
        $this->detailGambarLaporan = "";
        $this->status = "";
        $this->nikLama = "";

        $this->pengaturan = "";
        $this->petugas = "";
        $this->detail = "";
    }
    public function SaveAkun()
    {
        $this->validate([
            'nik' => 'required',
        ]);

        $cek = Masyarakat::where('nik', $this->nikLama)->get()->first();

        if ($this->nik !== $this->nikLama && $cek) {
            $this->Pengaturan();
            session()->flash('success', 'Nik Sudah Digunakan');
        } else {
            Masyarakat::where('id_masyarakat', $this->idid)->update([
                'nik' => $this->nik,
                'nama' => $this->nama,
                'telp' => $this->telp,
            ]);
            session()->flash('success', 'Data Berhasil Di Update');
        }
    }

    public function KirimLaporan()
    {
        $this->validate([
            'isiLaporan' => 'required'
        ], [
            'isiLaporan.required' => '* Silahkan Masukan Laporan Anda Terlebih dahulu'
        ]);

        $namaGambar = null;

        if ($this->gambar) {
            $namaGambar = uniqid() . '-' . date('Y-m-d-H-i-s') . '.' . $this->gambar->getClientOriginalExtension();
            $this->gambar->storeAs('public/image/laporan', $namaGambar, 'local');
        }

        Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d'),
            'id_masyarakat' => Auth::guard('web')->user()->id_masyarakat,
            'isi_laporan' => $this->isiLaporan,
            'foto' => $namaGambar,
        ]);

        $this->close();

        session()->flash('success', 'Laporan Anda Berhasil Terkirim Dan Sedang Di Proses');
    }

    public function DetailLaporan($id)
    {
        $this->close();
        $this->detail = true;

        $data = Pengaduan::where('id_pengaduan',$id)->orderBy('created_at','desc')->get()->first();

        $this->isiLaporan = $data->isi_laporan;
        $this->detailGambarLaporan = $data->foto;
        $this->status = $data->status;
        $this->id_pengaduan = $data->id_pengaduan;
    }

    public function DeleteLaporan($id)
    {
        if (!$this->detailGambarLaporan == null) {
           unlink(public_path('storage/image/laporan/'.$this->detailGambarLaporan));
        }
        Pengaduan::where('id_pengaduan',$id)->delete();
        $this->close();
        session()->flash('success','Hapus Laporan Berhasil');
    }
}
