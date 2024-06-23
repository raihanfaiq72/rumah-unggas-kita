<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TokoModel;
use App\Models\ItemModel;
use App\Models\TransaksiModel;

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
        $item = ItemModel::where('idToko',$toko->id)->paginate(3);
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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $item = ItemModel::where('nama','like','%'.$keyword.'%')->orWhere('deskripsi','like','%'.$keyword.'%')->paginate(3);
        return view("$this->views"."/hasilCari",compact('item','keyword'));
    }

    public function cekot()
    {
        return view("$this->views"."/cekot");
    }
    public function addToCart(Request $request)
{
    try {
        // Validasi request
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        // Ambil data dari request
        $userId = session()->get('id'); // Menggunakan user yang sedang login
        $itemId = $request->input('item_id');

        // Simpan ke database
        $transaction = new TransaksiModel();
        $transaction->idToko = 1; // Sesuaikan dengan idToko yang sesuai
        $transaction->idUser = $userId;
        $transaction->idItem = $itemId;
        $transaction->no_transaksi = 'TRX' . time(); // Contoh: Menggunakan timestamp sebagai no_transaksi
        $transaction->jumlah = 1; // Contoh: Jumlah bisa disesuaikan sesuai kebutuhan
        $transaction->status = 1; // Status 1 untuk item yang sudah masuk ke keranjang
        $transaction->jumlah_bayar = 0; // Contoh: Jumlah bayar, bisa dihitung berdasarkan item atau disesuaikan
        $transaction->save();

        return redirect()->back()->with('success', 'Item added to cart successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to add item to cart. Please try again later.');
    }
}


    public function tentangkami()
    {
        return view("$this->views"."/kontak");
    }
}
