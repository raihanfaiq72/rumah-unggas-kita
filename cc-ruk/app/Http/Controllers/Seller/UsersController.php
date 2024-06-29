<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\UserModel;
class UsersController extends Controller
{
    private $url    = 'user/profile';
    private $views  = 'Seller/Profile';

    public function edit($id)
    {
        return view("$this->views"."/edit",[
            'profile' => UserModel::where('id',$id)->first(),
            'title' => 'Profile'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username'      => 'required',
            'nama_lengkap'  => 'required',
            'password'      => 'required'
        ]);
        $data = [
            'username'      => $request->username,
            'nama_lengkap'  => $request->nama_lengkap,
            'password'      => Hash::make($request->password),
            'katasandi'     => $request->password,
            'role'          => 1
        ];

        userModel::where('id', $request->id)->update($data);
        return redirect('user/profile/'.$request->id."/edit")->with('sukses', 'Profil berhasil diperbarui');
    }
}
