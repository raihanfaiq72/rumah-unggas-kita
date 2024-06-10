<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $views = 'Seller';

    public function index()
    {
        return view("$this->views"."/Dashboard/index");
    }
}
