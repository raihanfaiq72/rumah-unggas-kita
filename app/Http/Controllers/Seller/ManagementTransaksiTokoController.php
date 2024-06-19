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
            'data'  => TransaksiModel::where('idToko',$toko->id)->get()
        ]);
    }

    public function edit($id)
    {
        return view("$this->views"."/edit",[
            'data'  => TransaksiModel::where('id',$id)->first()
        ]);
    }
}
