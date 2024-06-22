<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ItemModel;

class ProdukLive extends Component
{
    public function render()
    {
        return view('livewire.produk-live',[
            'data'  => ItemModel::paginate(6)
        ]);
    }

    public function paginationView()
    {
        return 'custom-pagination-view';
    }
}
