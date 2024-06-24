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
        return view("$this->views"."/index",[
            'data'  => ItemModel::get(),
            
        ]);
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

    public function cekotShow()
    {
        $total  = TransaksiModel::where('idUser',session()->get('id'))->where('status',1)->sum('jumlah_bayar');
        $ongkir = 10000;
        $bTotal = $total+$ongkir;
        return view("$this->views"."/cekot",[
            'data'      => TransaksiModel::where('idUser',session()->get('id'))->where('status',1)->get(),
            'total'     => $total,
            'bTotal'    => $bTotal,
        ]);
    }

    public function cekotStaging()
    {

        $total  = TransaksiModel::where('idUser',session()->get('id'))->where('status',1)->sum('jumlah_bayar');
        $ongkir = 10000;
        $bTotal = $total+$ongkir;
        return view("$this->views"."/cekotStaging",[
            'data'      => TransaksiModel::where('idUser',session()->get('id'))->where('status',1)->get(),
            'total'     => $total,
            'bTotal'    => $bTotal,
        ]);
    }

    public function cekotFinal(Request $request)
    {
        try {
            $request->validate([
                'idItem' => 'required',
            ]);
    
            $userId = session()->get('id');
            $itemId = $request->input('idItem');
    
            // Temukan item berdasarkan $itemId
            $item = ItemModel::find($itemId);
            if (!$item) {
                return redirect()->back()->with('gagal', 'Item tidak ditemukan.');
            }
    
            // Simpan transaksi
            $transaction = new TransaksiModel();
            $transaction->idToko = $item->idToko;
            $transaction->idUser = $userId;
            $transaction->idItem = $itemId;
            $transaction->no_transaksi = 'RUK-Final' . time();
            $transaction->jumlah = 1;
            $transaction->status = 2; // Mengubah status menjadi 2
            $transaction->jumlah_bayar = $item->harga * $transaction->jumlah;
            $transaction->save();
    
            // Update status item menjadi 2 di tabel item
            $item->status = 2;
            $item->save();
    
            return redirect('cekot')->with('sukses', 'Berhasil menambahkan ke cart');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal menambahkan item ke cart. Silakan coba lagi nanti.');
        }
    }
    

    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'idItem' => 'required',
            ]);

            $userId = session()->get('id');
            $itemId = $request->input('idItem');
            $item = ItemModel::find($itemId);
            if (!$item) {
                return redirect()->back()->with('gagal', 'Item not found.');
            }
            // Simpan ke database
            $transaction                = new TransaksiModel();
            $transaction->idToko        = $item['idToko']; 
            $transaction->idUser        = $userId;
            $transaction->idItem        = $itemId;
            $transaction->no_transaksi  = 'RUK' . time(); 
            $transaction->jumlah        = 1; 
            $transaction->status        = 1; // status 1 = barang di cart user
            $transaction->jumlah_bayar  = $item['harga']*$transaction->jumlah;
            $transaction->save();

            return redirect('cekot')->with('sukses', 'berhasil menambahkan ke cart');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Failed to add item to cart. Please try again later.');
        }
    }

    public function deleteItem($id)
    {
        try {
            $transaction = TransaksiModel::findOrFail($id);
        
            $transaction->delete();
        
            return redirect()->back()->with('sukses', 'Item berhasil dihapus dari cart.');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal menghapus item dari cart. Silakan coba lagi nanti.');
        }
    }


    public function tentangkami()
    {
        return view("$this->views"."/kontak");
    }
}
