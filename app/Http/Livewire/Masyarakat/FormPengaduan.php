<?php

namespace App\Http\Livewire\Masyarakat;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

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
    public $confitmDelete;

    public $btnBuatLaporan;

    public $pengaturan;
    public $petugas;
    public $nikLama;

    public $detail;

    public $dataTanggapan = [];


    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 

    public function render()
    {
        if (Auth::check('web')) {
            # code...
            $data = Pengaduan::where('id_masyarakat', Auth::guard('web')->user()->id_masyarakat)->paginate(10);
        } else {
            $data = [];
        }

        return view('livewire.masyarakat.form-pengaduan', [
            'data' => $data,
        ]);
    }

    public function btnBuatLaporan()
    {
        if (Auth::check('web') == true) {
            # code...
            $this->btnBuatLaporan = true;
        } else {
            return redirect('/login')->with(session()->flash('loginDulu', 'Silahkan Login Terlebih Dahulu'));
        }
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }

    public function Pengaturan()
    {
        if (Auth::check('web') == false) {
            return redirect('/login')->with(session()->flash('loginDulu', 'Silahkan Login Terlebih Dahulu'));
        }
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
        $this->dataTanggapan = [];
        $this->btnBuatLaporan = "";
        $this->CloseConfirm();
    }

    public function CloseConfirm()
    {
        $this->confitmDelete = "";
    }
    public function SaveAkun()
    {
        $this->validate([
            'nik' => Rule::unique('masyarakat')->ignore('id_masyarakat', Auth::guard('web')->user()->id_masyarakat),
        ]);

        Masyarakat::where('id_masyarakat', $this->idid)->update([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'telp' => $this->telp,
        ]);
        session()->flash('success', 'Data Berhasil Di Update');
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

        $data = Pengaduan::where('id_pengaduan', $id)->orderBy('created_at', 'desc')->get()->first();

        $this->isiLaporan = $data->isi_laporan;
        $this->detailGambarLaporan = $data->foto;
        $this->status = $data->status;
        $this->id_pengaduan = $data->id_pengaduan;
        $this->dataTanggapan = Tanggapan::where('id_pengaduan', $id)->get();
    }

    public function DeleteLaporan($id)
    {
        if (!$this->detailGambarLaporan == null) {
            unlink(public_path('storage/image/laporan/' . $this->detailGambarLaporan));
        }
        Pengaduan::where('id_pengaduan', $id)->delete();
        $this->close();
        session()->flash('success', 'Hapus Laporan Berhasil');
    }

    public function ConfirmDelete()
    {
        $this->confitmDelete = true;
    }
}
