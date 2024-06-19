<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $views = 'Buyer/Dashboard';
    public function index()
    {
        return view("$this->views"."/index");
    }

    public function produk()
    {
        return view("$this->views"."/produk");
    }

    public function toko()
    {
        return view("$this->views"."/toko");
    }

    public function tentangkami()
    {
        return view("$this->views"."/kontak");
    }
}
