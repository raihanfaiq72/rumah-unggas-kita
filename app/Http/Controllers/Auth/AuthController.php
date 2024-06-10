<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $views = 'Auth';

    public function login()
    {
        return view("$this->views"."/login",[
            'title' => 'login',
        ]);
    }

    public function register()
    {
        return view("$this->views"."/register",[
            'title' => 'Register',
        ]);
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|unique:users',
            'username'      => 'required|unique:users',
            'password'      => 'required',
            'email'         => 'required|unique:users'
        ]);

        $respon = Http::post('http://localhost:3000/users',[
            'nama_lengkap'  => $request->nama_lengkap,
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'katasandi'     => $request->password,
            'email'         => $request->email ,
            'role'          => 2
        ]);

        if($respon->successful()){
            return redirect('login')->with('sukses','Anda berhasil mendaftar');
        }else{
            return back()->withErrors('gagal','anda gagal mendaftar');
        }
    }
}
