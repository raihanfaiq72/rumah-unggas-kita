<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemModel;
use App\Models\TokoModel;

class ItemTokoController extends Controller
{
    private $views  = 'Seller/Item';
    private $url    = 'user/item-toko';

    public function index()
    {
        $toko = TokoModel::where('idUsers', session()->get('id'))->first();
    
        if ($toko) {
            $items = ItemModel::where('idToko', $toko->id)->get();
        } else {
            $items = collect(); 
        }

        return view("$this->views.index", [
            'data' => $items
        ]);
    }


    public function create()
    {
        return view("$this->views"."/create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'harga'     => 'required',
            'deskripsi' => 'required',
            'stok'      => 'required'
        ]);

        $toko = TokoModel::where('idUsers',session()->get('id'))->first();
        $item = ItemModel::where('idToko',$toko->id)->get();
        
        // 'data'  => TokoModel::get()
        // dd(TokoModel::get())
        dd($item);

        ItemModel::create([
            'nama'      => $request->nama,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok'      => $request->stok ,
            'status'    => $request->status
        ]);
    }
}
