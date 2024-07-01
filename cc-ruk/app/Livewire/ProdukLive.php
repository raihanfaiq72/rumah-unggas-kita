<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ItemModel;
use App\Models\TokoModel;
use Livewire\WithPagination;

class ProdukLive extends Component
{
    use WithPagination;

    public function render()
    {
        $user = session()->get('id');
        $toko = TokoModel::where('idUsers', $user)->first();

        if ($user && $toko) {
            $data = ItemModel::where('idToko', '!=', $toko->id)->paginate(6);
        } else {
            $data = ItemModel::paginate(6);
        }

        return view('livewire.produk-live', [
            'data' => $data
        ]);
    }

    public function paginationView()
    {
        return 'custom-pagination-view';
    }
}
