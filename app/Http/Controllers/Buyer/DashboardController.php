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
}
