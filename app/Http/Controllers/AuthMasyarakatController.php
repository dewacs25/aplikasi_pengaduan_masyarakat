<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthMasyarakatController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'nik'=>'unique:masyarakat,nik',
            'nama'=>'required',
            'username'=>'required|unique:masyarakat',
            'password'=>'required',
            'telp'=>'required',
        ]);

        Masyarakat::create([
            'nik'=>$req->nik,
            'nama'=>$req->nama,
            'username'=>$req->username,
            'password'=>Hash::make($req->password),
            'telp'=>$req->telp,
        ]);

        return redirect('/login');
    }

    public function login(Request $req)
    {
        $req->validate([ 
            'username'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('web')->attempt(['username' => $req->username, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return back()->withErrors([
                'password' => 'Username atau password salah'
            ]);
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
