<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Registrasi extends Component
{
    public $btnTambah;

    protected $listeners = [
        'DeleteSession'=>'DeleteSession'
    ];

    public function render()
    {
        return view('livewire.admin.registrasi');

    }
   
    public function btnTambah()
    {
        $this->btnTambah = true;
    }

    public function close()
    {
        $this->btnTambah = "";
    }

    public function DeleteSession()
    {
        Session::forget('success');
    }
}
