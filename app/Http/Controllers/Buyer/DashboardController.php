<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TokoModel;
use App\Models\ItemModel;

class DashboardController extends Controller
{
    private $views = 'Buyer/Dashboard';
    protected $kategoriId = [
        1 => 'Ayam',
        2 => 'Bebek',
        3 => 'Dara',
        4 => 'Kalkun'
    ];

    public function index()
    {
        return view("$this->views"."/index");
    }

    public function produk()
    {
        return view("$this->views"."/produk",[
            // 'data'  => ItemModel::get()
        ]);
    }

    public function produkShow($id)
    {
        $data = ItemModel::where('id',$id)->first();
        return view("$this->views"."/produkShow",[
            'data'      => $data,
            'prodTok'   => ItemModel::where('idToko',$data->idToko)->get(),
            'random'    => ItemModel::orderBy('id','desc')->get()
        ]);
    }

    public function toko()
    {
        return view("$this->views"."/toko",[
            'data'  => TokoModel::get()
        ]);
    }

    public function tokoShow($id)
    {
        $toko = TokoModel::where('id',$id)->first();
        $item = ItemModel::where('idToko',$toko->id)->get();
        return view("$this->views"."/tokoShow",[
            'data'  => $item
        ]);
    }

    public function kategoriShow($id)
    {
        $Idkategori = $this->kategoriId[$id] ?? 'kategori tidak ditemukan';
        return view("$this->views"."/kategoriShow",[
            'data'          => ItemModel::where('kategori',$id)->paginate(3),
            'kategoriLabel' => $Idkategori
        ]);
    }

    public function tentangkami()
    {
        return view("$this->views"."/kontak");
    }
}
