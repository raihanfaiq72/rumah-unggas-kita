<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $respon = Http::post('http://localhost:3000/users',[
            'nama_lengkap'  => $request->nama_lengkap,
            'username'      => $request->username,
            'katasandi'     => $request->password,
            'password'      => Hash::make($request->password),
            'email'         => $request->email ,
            'role'          => 2
        ]);

        if($respon->successful()){
            return redirect('login')->with('sukses','Anda berhasil mendaftar');
        }else{
            return back()->withErrors('gagal','anda gagal mendaftar');
        }
    }

    public function loginProses(Request $request)
{
    $response = Http::get('http://localhost:3000/users');

    $userData = $response->json();

    // Pengecekan apakah data pengguna ditemukan
    if (empty($userData['users'])) {
        return redirect()->back()->with('gagal', 'Pengguna tidak ditemukan');
    }

    // Pengecekan apakah username dan password cocok
    $matchedUser = null;
    foreach ($userData['users'] as $user) {
        if ($user['username'] === $request->username && Hash::check($request->password, $user['password'])) {
            $matchedUser = $user;
            break;
        }
    }

    if (!$matchedUser) {
        return redirect()->back()->with('gagal', 'Username atau password salah');
    }

    $role = $matchedUser['role'];

    $dashboard = '';
    if ($role == 1) {
        $dashboard = 'seller/dashboard';
    } elseif ($role == 2) {
        $dashboard = 'buyer/dashboard';
    } else {
        // Logika lain untuk peran lainnya jika diperlukan
    }

    $session = [
        'id'            => $matchedUser['id'],
        'nama_lengkap'  => $matchedUser['nama_lengkap'],
        'role'          => $role,
        'isLogin'       => true
    ];

    session($session);
    return redirect($dashboard)->with('sukses', 'Selamat datang kembali');
}

}
