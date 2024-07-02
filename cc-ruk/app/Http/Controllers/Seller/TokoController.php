<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TokoModel;

class TokoController extends Controller
{
    private $views  = 'Seller/Toko';
    private $url    = 'user/toko';
    private $session ;

    public function __construct()
    {
        $this->session = session()->get('id');
    }

    public function create()
    {
        return view("$this->views"."/create",[
            'toko'  => TokoModel::where('idUsers',session()->get('id'))->first(),
            'title' => 'Toko Anda' 
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'alamat'    => 'required',
            'nomor_telp'=> 'required'
        ]);
        // dd([
        //     'nama_toko' => $request->nama_toko,
        //     'deskripsi' => $request->deskripsi,
        //     'alamat'    => $request->alamat,
        //     'nomor_telp'=> $request->nomor_telp
        // ]);
        $session = session()->get('id');

        TokoModel::create([
            'idUsers'   => session()->get('id'),
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'alamat'    => $request->alamat,
            'nomor_telp'=> $request->nomor_telp
        ]);

        return redirect("user/dashboard")->with('sukses','toko berhasil di buat');
    }

    public function edit($id)
    {
        return view("$this->views"."/create",[
            'toko'  => TokoModel::where('idUsers',session()->get('id'))->first(),
            'title' => 'Toko Anda' 
        ]);
    }

    public function update(Request $request )
    {
        $validator = $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'alamat'    => 'required',
            'nomor_telp'=> 'required'
        ]);

        TokoModel::where('id',$request->id)->update([
            'idUsers'   => session()->get('id'),
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'alamat'    => $request->alamat,
            'nomor_telp'=> $request->nomor_telp
        ]);

        return redirect("$this->url/".$request->id."/edit")->with('sukses','toko berhasil di Edit');
    }
}
