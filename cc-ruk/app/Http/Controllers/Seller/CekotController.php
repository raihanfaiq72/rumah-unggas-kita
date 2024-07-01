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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
