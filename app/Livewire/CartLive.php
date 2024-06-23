<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ItemModel;
use App\Models\TransaksiModel;

class CartLive extends Component
{
    public $cart;
    public $data;

    protected $listeners = ['addToCart'];

    public function mount()
    {
        $this->cart = [];
    }
    public function addToCart($itemId)
    {
        $item = ItemModel::findOrFail($itemId);
        $this->cart[]=$item;
    }
    public function removeItem($index)
    {
        unset($this->cart[$index]);
        session()->put('cart',$this->cart);
    }
    public function checkout()
    {
        $transaksi = new TransaksiModel();
        $transaksi->idUser = session()->get('id');
        $transaksi->total = $this->hitungTotal();
        $transaksi->save();

        foreach($this->cart as $item){
            $transaksi->item()->attach($item->id,['quantity'=> 1]);
        }

        $this->cart = [];
        session->flash('sukses','cekout berhasil brow');
        redirect('/');
    }

    public function hitungTotal()
    {
        $total = 0;
        foreach($this->cart as $item){
            $total += $this->harga;
        }

        return $total;
    }

    public function render()
    {
        return view('livewire.cart-live');
    }
}
