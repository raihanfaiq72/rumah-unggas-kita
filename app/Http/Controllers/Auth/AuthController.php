<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserModel;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

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
        $kredensial         = $request->validate([
            'username'       => 'required',
            'nama_lengkap'  => 'required',
            'password'      => 'required'
        ]);

        // dd($kredensial);

        UserModel::create([
            'username'      => $request->username,
            'nama_lengkap'  => $request->nama_lengkap,
            'password'      => Hash::make($request->password),
            'katasandi'     => $request->katasandi,
            'role'          => 2
        ]);

        return redirect('login')->with('sukses','anda berhasil login');
    }

    public function loginProses(Request $request)
    {
        $kredensial     = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $userLogin = UserModel::where('username',$request->username)->first();

        if($userLogin == NULL){
            return redirect()->back()->with('gagal','user tidak ditemukan');
        }

        if(Hash::check($request->password,$userLogin->password)==FALSE){
            return redirect()->back()->with('gagal','password anda salah');
        }


        if($userLogin->role == 1){
            $session = [
                'id'            => $userLogin->id,
                'nama_lengkap'  => $userLogin->nama_lengkap,
                'username'      => $userLogin->username,
                'role'          => $userLogin->role,
                'isLogin'       => TRUE
            ];

            session($session);

            return redirect('seller/dashboard')->with('sukses','Selamat Datang Kembali');
        }elseif($userLogin->role == 2){
            $session = [
                'id'            => $userLogin->id,
                'nama_lengkap'  => $userLogin->nama_lengkap,
                'username'      => $userLogin->username,
                'role'          => $userLogin->role,
                'isLogin'       => TRUE
            ];

            session($session);
            return redirect('buyer/dashboard')->with('sukses','Selamat Datang Kembali');

        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
