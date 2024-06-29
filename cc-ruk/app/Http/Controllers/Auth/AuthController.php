<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class AuthController extends Controller
{
    private $views = 'Auth';

    public function login()
    {
        return view("$this->views.login", [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        return view("$this->views.register", [
            'title' => 'Register',
        ]);
    }

    public function registerProses(Request $request)
    {
        $validasi      = $request->validate([
            'username'      => 'required|unique:users',
            'nama_lengkap'  => 'required',
            'password'      => 'required',
        ]);

        $user = UserModel::create([
            'username'      => $validasi['username'],
            'nama_lengkap'  => $validasi['nama_lengkap'],
            'password'      => Hash::make($validasi['password']),
            'katasandi'     => $validasi['password'],
            'role'          => 1, 
        ]);

        return redirect('login')->with('sukses', 'Anda berhasil Register');
    }

    public function loginProses(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $userLogin = UserModel::where('username', $validasi['username'])->first();

        if (!$userLogin) {
            return redirect()->back()->with('gagal', 'User tidak ditemukan');
        }

        if (!Hash::check($validasi['password'], $userLogin->password)) {
            return redirect()->back()->with('gagal', 'Password Anda salah');
        }

        $request->session()->put([
            'id'            => $userLogin->id,
            'nama_lengkap'  => $userLogin->nama_lengkap,
            'username'      => $userLogin->username,
            'role'          => $userLogin->role,
            'isLogin'       => true,
        ]);

        if ($userLogin->role == 1) {
            return redirect('user/dashboard')->with('sukses', 'Selamat Datang Kembali');
        } elseif ($userLogin->role == 2) {
            return redirect('buyer/dashboard')->with('sukses', 'Selamat Datang Kembali');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
