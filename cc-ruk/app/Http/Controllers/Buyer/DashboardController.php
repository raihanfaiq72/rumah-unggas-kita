<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use App\Models\TokoModel;
use App\Models\ItemModel;
use App\Models\TransaksiModel;
use App\Models\ReviewModel;

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
            'toko'  => TokoModel::get()
            
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
        if ($thistoko) {
            $toko = TokoModel::where('idUsers', '!=', session()->get('id'))->get();
        } else {
            $toko = TokoModel::all();
        }       
        
        return view("$this->views"."/toko",[
            'data'  => $toko
        ]);
    }

    public function tokoShow($id)
    {
        $toko = TokoModel::where('id',$id)->first();
        $item = ItemModel::where('idToko',$toko->id)->paginate(3);
        return view("$this->views"."/tokoShow",[
            'data'  => $item,
            'toko'  => $toko
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

    public function cekotStaging($id)
    {

        $total  = TransaksiModel::where('id',$id)->where('idUser',session()->get('id'))->where('status',1)->sum('jumlah_bayar');
        $ongkir = 10000;
        $bTotal = $total+$ongkir;
        return view("$this->views"."/cekotStaging",[
            'data'      => TransaksiModel::where('id',$id)->where('idUser',session()->get('id'))->where('status',1)->first(),
            'total'     => $total,
            'bTotal'    => $bTotal,
        ]);
    }

    public function cekotsblmStaging($id)
    {
        $total  = TransaksiModel::where('id',$id)->where('idUser',session()->get('id'))->where('status',1)->sum('jumlah_bayar');
        $ongkir = 10000;
        
        if($total >0){
            $bTotal = $total+$ongkir;
        }else{
            $bTotal = 0;
        }
        return view("$this->views"."/cekotsblmStaging",[
            // dd(TransaksiModel::where('id',$id)->where('idUser',session()->get('id'))->where('status',1)->first())
            'data'      => TransaksiModel::where('id',$id)->where('idUser',session()->get('id'))->where('status',1)->first(),
            'total'     => $total,
            'bTotal'    => $bTotal,
        ]);
    }

    public function cekotFinal(Request $request)
    {
        try {
            $request->validate([
                'id'            => 'required',
                'idUser'        => 'required',
                'idToko'        => 'required',
                'idItem'        => 'required',
                'note'          => 'required',
                'no_transaksi'  => 'required',
                'jumlah'        => 'required|integer|min:1',
                'jumlah_bayar'  => 'required|numeric|min:0',
            ],[
                'note.required' => 'note harus diisi'
            ]);
    
            TransaksiModel::where('id', $request->id)->update([
                'idUser'        => $request->idUser,
                'idToko'        => $request->idToko,
                'idItem'        => $request->idItem,
                'note'          => $request->note,
                'no_transaksi'  => $request->no_transaksi,
                'jumlah'        => $request->jumlah,
                'jumlah_bayar'  => $request->jumlah_bayar,
                'status'        => 2 
            ]);
    
            return redirect('cekot')->with('sukses', 'Anda berhasil cekot.');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal cekot. Silakan coba lagi nanti.');
        }
    }
    

    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'idItem' => 'required',
                'jumlah' => 'required|integer|min:1', 
            ]);
    
            $userId = session()->get('id');
            $itemId = $request->input('idItem');
            $jumlah = $request->input('jumlah'); 

            $item = ItemModel::find($itemId);
            if (!$item) {
                return redirect()->back()->with('gagal', 'Item not found.');
            }

            if($item->stok < $jumlah){
                return redirect()->back()->with('gagal','Stok tidak mencukupi');
            }
            // Simpan ke database
            $transaction                = new TransaksiModel();
            $transaction->idToko        = $item->idToko; 
            $transaction->idUser        = $userId;
            $transaction->idItem        = $itemId;
            $transaction->no_transaksi  = 'RUK' . time(); 
            $transaction->jumlah        = $jumlah; 
            $transaction->status        = 1; 
            $transaction->jumlah_bayar  = $item->harga * $jumlah;
            $transaction->save();

            // logika untuk mengurangi stok tersedia disini ya ges
            $item->stok -=$jumlah;
            $item->save();
    
            return redirect('cekot')->with('sukses', 'berhasil menambahkan ke cart');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Failed to add item to cart. Please try again later.');
        }
    }
    

    public function deleteItem($id)
    {
        try {
            $transaction = TransaksiModel::findOrFail($id);
            $jumlah = $transaction->jumlah;
            $transaction->delete();


            $item = ItemModel::find($transaction->idItem);
            if (!$item) {
                return redirect()->back()->with('gagal', 'Item tidak ditemukan.');
            }
            $item->stok += $jumlah;
            $item->save();

            return redirect()->back()->with('sukses', 'Item berhasil dihapus dari cart.');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Gagal menghapus item dari cart. Silakan coba lagi nanti.');
        }
    }

    public function invoice($id)
    {
        $file = TransaksiModel::where('id',$id)->first();
        $invoice = PDF::loadview('pdf.universalInvoice',[
            'data'  => TransaksiModel::where('id',$id)->first(),
            'title' => 'Cetak Invoice'
        ]);
        return $invoice->download($file->no_transaksi.'.pdf');
    }

    public function reviewCreate($id)
    {
        $data = TransaksiModel::where('id',$id)->first();

        return view("Seller/Review/"."/index",[
            'data'  => $data,
            'title' => 'Review'
        ]);
    }

    public function reviewStore(Request $request)
    {
        $request->validate([
            'isi'           => 'required',
            'idTransaksi'   => 'required'
        ]);

        ReviewModel::create([
            'isi'           => $request->isi,
            'idTransaksi'   => $request->idTransaksi
        ]);

        return redirect()->back()->with('sukses','terimakasih sudah memberikan review');
    }


    public function tentangkami()
    {
        return view("$this->views"."/kontak");
    }
}
