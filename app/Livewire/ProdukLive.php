<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ItemModel;
use App\Models\TokoModel;
class ProdukLive extends Component
{
    public function render()
    {
        $toko = TokoModel::where('idUsers',session()->get('id'))->first();
        return view('livewire.produk-live',[
            'data'  => ItemModel::where('idToko', '!=', $toko->id)->paginate(6)

        ]);
    }

    public function paginationView()
    {
        return 'custom-pagination-view';
    }
}
