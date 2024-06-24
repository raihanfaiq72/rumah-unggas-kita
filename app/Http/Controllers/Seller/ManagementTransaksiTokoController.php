<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\TokoModel;
use App\Models\ItemModel;

class ManagementTransaksiTokoController extends Controller
{
    private $views = 'Seller/TransaksiToko';
    private $url = 'user/management-transaksi-toko';

    public function index()
    {
        $toko = TokoModel::where('idUsers',session()->get('id'))->first();
        return view("$this->views"."/index",[
            'data'  => TransaksiModel::where('idToko',$toko->id)->get(),
            'title' => 'Transaksi'
        ]);
    }

    public function show($id)
    {
        return view("$this->views"."/show",[
            'data'  => TransaksiModel::where('id',$id)->first(),
            'title' => 'cekot brow'
        ]);
    }

    public function edit($id)
    {
        return view("$this->views"."/edit",[
            'data'  => TransaksiModel::where('id',$id)->first(),
            'title' => 'cekot'
        ]);
    }

    public function update(Request $request)
    {
        TransaksiModel::where('id', $request->id)->update([
            'idToko'    => $request->idToko,
            'idUser'    => $request->idUser,
            'idItem'    => $request->idItem,
            'no_transaksi'  => $request->no_transaksi,
            'jumlah'    => 1,
            'status'    => $request->status,
            'jumlah_bayar'  => $request->jumlah_bayar
        ]);

        return redirect("$this->url")->with('sukses','berhasil di update');
    }
}
