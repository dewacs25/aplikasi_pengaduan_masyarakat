<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'id_masyarakat',
        'isi_laporan',
        'foto',
        'status',
    ];
    public function masyarakat()
    {
        return $this->belongsTo('App\Models\Masyarakat', 'id_masyarakat');
    }
}
