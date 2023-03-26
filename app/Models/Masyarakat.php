<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Masyarakat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'masyarakat';
    protected $guard = 'web';
    protected $primaryKey = 'id_masyarakat';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];
    public function pengaduan()
    {
        return $this->hasMany('App\Models\Pengaduan', 'id_masyarakat');
    }
}
