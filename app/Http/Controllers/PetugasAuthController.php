<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class PetugasAuthController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([ 
            'username'=>'required',
            'password'=>'required',
        ]);

        if (Auth::guard('petugas')->attempt(['username' => $req->username, 'password' => $req->password, 'level' => 'admin'])) {
            $req->session()->regenerate();
            return redirect()->intended('/admin');
        } elseif (Auth::guard('petugas')->attempt(['username' => $req->username, 'password' => $req->password, 'level' => 'petugas'])) {
            $req->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'password' => 'username atau password salah'
        ]);
    }

    public function logout()
    {
        Auth::guard('petugas')->logout();
        return redirect('/admin/login');
    }
}
