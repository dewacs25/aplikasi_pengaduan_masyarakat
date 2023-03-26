<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailLaporanController extends Controller
{
    public function index($id)
    {
        $dataPengaduan = Pengaduan::where('id_pengaduan',$id)->get()->first();
        $dataTanggapan = Tanggapan::where('id_pengaduan',$id)->get();
        
        return view('admin.detailLaporan',[
            'dataPengaduan'=>$dataPengaduan,
            'dataTanggapan'=>$dataTanggapan,
        ]);
    }

    public function Unverified($id)
    {
        Pengaduan::where('id_pengaduan',$id)->update([
            'status'=>'proses'
        ]);
        return redirect()->back()->with(session()->flash('success','Berhasil'));
    }
    public function Verified($id)
    {
        Pengaduan::where('id_pengaduan',$id)->update([
            'status'=>'selesai'
        ]);
        return redirect()->back()->with(session()->flash('success','Berhasil'));
    }

    public function Tanggapan(Request $req,$id)
    {
        $req->validate([
            'tanggapan'=>'required'
        ]);

        Tanggapan::create([
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $req->tanggapan,
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas,
        ]);
        return redirect()->back()->with(session()->flash('success','Berhasil'));

    }
    public function Delete($id)
    {
        $cek = Pengaduan::where('id_pengaduan',$id)->get()->first();
        if ($cek->foto != null) {
            unlink(public_path('storage/image/laporan/' . $cek->foto));
        }
        $cek->delete();
        return redirect('/admin/laporan')->with(session()->flash('success','Berhasil'));

    }
}
