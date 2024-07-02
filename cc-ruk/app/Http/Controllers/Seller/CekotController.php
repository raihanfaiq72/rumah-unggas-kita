<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransaksiModel;

class CekotController extends Controller
{
    private $url    = 'user/cekot';
    private $views  = 'Seller/Cekot';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $session = session()->get('id');
        return view("$this->views"."/index",[
            'data'  => TransaksiModel::where('idUser',$session)->get(),
            'title' => 'Pesanan Anda'
        ]);
    }

}
