<?php

namespace App\Http\Livewire\Masyarakat;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormPengaduan extends Component
{
    use WithFileUploads;
    public $gambar;
    public function render()
    {
        return view('livewire.masyarakat.form-pengaduan');
    }
}
