<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pengaduan;
use Livewire\Component;

class Dashboard extends Component
{
    public $jumlahPengaduanProses;
    public $jumlahPengaduanReject;
    public $jumlahPengaduanSelesai;
    
    public function render()
    {
        $this->jumlahPengaduanProses = Pengaduan::where('status','proses')->count();
        $this->jumlahPengaduanReject = Pengaduan::where('status','0')->count();
        $this->jumlahPengaduanSelesai = Pengaduan::where('status','selesai')->count();
        
        return view('livewire.admin.dashboard');
    }
}
