<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

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
            'data' => $items,
            'title' => 'Item Toko'
        ]);
    }

    public function create()
    {
        return view("$this->views.create", [
            'title' => 'Item Toko'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'harga'     => 'required',
            'deskripsi' => 'required',
            'stok'      => 'required',
            'kategori'  => 'required',
            'photo'     => 'required|file|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $toko = TokoModel::where('idUsers', session()->get('id'))->first();
        $item = ItemModel::where('idToko', $toko->id)->get();
        $tunjuk = $toko->id;
        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
            $file->move("admin/upload/", $fileName);
        }

        ItemModel::create([
            'idToko'    => $tunjuk,
            'nama'      => $request->nama,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok'      => $request->stok ,
            'status'    => $request->status,
            'kategori'  => $request->kategori,
            'gambar'    => $fileName
        ]);

        return redirect('user/item-toko')->with('sukses','berhasil menambahkan item');
    }

    public function edit($id)
    {
        return view("$this->views.edit", [
            'data'  => ItemModel::where('id', $id)->first(),
            'title' => 'Rumah Unggas Kita'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            // 'nama'      => 'required',
            // 'harga'     => 'required',
            // 'deskripsi' => 'required',
            // 'stok'      => 'required',
            // 'photo'     => 'required|file|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $toko = TokoModel::where('idUsers', session()->get('id'))->first();
        $item = ItemModel::where('idToko', $toko->id)->get();
        $tunjuk = $toko->id;

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $fileName   = Str::uuid() . "-" . time() . "." . $file->extension();
            $file->move("admin/upload/", $fileName);

            ItemModel::where('id', $request->id)->update([
                'idToko'    => $tunjuk,
                'nama'      => $request->nama,
                'harga'     => $request->harga,
                'deskripsi' => $request->deskripsi,
                'stok'      => $request->stok,
                'status'    => $request->status,
                'kategori'  => $request->kategori,
                'gambar'    => $fileName
            ]);

            return redirect("user/item-toko")->with('sukses', 'Data berhasil di edit dengan gambar');
        } else {
            ItemModel::where('id', $request->id)->update([
                'idToko'    => $tunjuk,
                'nama'      => $request->nama,
                'harga'     => $request->harga,
                'deskripsi' => $request->deskripsi,
                'stok'      => $request->stok,
                'status'    => $request->status,
                'kategori'  => $request->kategori,
            ]);

            return redirect("user/item-toko")->with('sukses', 'Data berhasil di edit');
        }
    }
}
