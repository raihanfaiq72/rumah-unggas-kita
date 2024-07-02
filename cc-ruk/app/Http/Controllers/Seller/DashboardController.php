<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class DashboardController extends Controller
{
    private $views = 'Seller';
    private $session ;

    public function __construct()
    {
        $this->session = session()->get('id');
    }

    public function index()
    {
        $data = [
            'title' => 'dashboard',
            'pesan' => TransaksiModel::where('idUser',$this->session)->get()
        ];
        $title = "Dashboard";
        return view("$this->views"."/Dashboard/index")->with($data);
    }
}
