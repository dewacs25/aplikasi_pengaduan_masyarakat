<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;


class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            'nama_petugas'=>'admin',
            'username'=>'admin',
            'password'=>Hash::make('1234'),
            'telp'=>'082125246091',
            'level'=>'admin',
        ]);
        Petugas::create([
            'nama_petugas'=>'petugas',
            'username'=>'petugas',
            'password'=>Hash::make('1234'),
            'telp'=>'082125246091',
            'level'=>'petugas',
        ]);
    }
}
