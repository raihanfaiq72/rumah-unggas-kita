<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TokoModel;

class TokoController extends Controller
{
    private $views = 'Seller/Toko';

    public function create()
    {
        return view("$this->views"."/create",[
            'toko'  => TokoModel::where('idUsers',session()->get('id'))->first() 
        ]);
    }
}
