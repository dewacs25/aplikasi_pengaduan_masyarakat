<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pengaduan;
use Livewire\Component;

class Laporan extends Component
{
    public $detail;

    public $isi_laporan;
    public $foto;
    public $username;
    public $nama;

    public function render()
    {
        $data =  Pengaduan::paginate(10);
       
        return view('livewire.admin.laporan',[
            'data'=>$data
        ]);
    }

    public function detail($id)
    {
        $this->detail = true;
        $data = Pengaduan::where('id_pengaduan',$id)->get()->first();
        $this->isi_laporan = $data->isi_laporan;
        $this->username = $data->masyarakat->username;
        $this->nama = $data->masyarakat->nama;
        if ($data->foto == null) {
            $this->foto = '../../../img/imgNone.png';
        } else {
            $this->foto = $data->foto;
        }
        

    }
}
