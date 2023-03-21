<?php

namespace App\Http\Livewire\Masyarakat;

use Livewire\Component;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Pengaturan extends Component
{
    public $nik;
    public $nama;
    public $telp;

    public function render()
    {
        $data = Masyarakat::where('id_masyarakat',Auth::guard('web')->user()->id_masyarakat)->get()->first();
        return view('livewire.masyarakat.pengaturan',['data'=>$data]);
    }
    
}
