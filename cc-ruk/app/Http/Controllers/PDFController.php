<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tester PDF'
        ];

        $pdf = PDF::loadview('pdf.index',$data);
        return $pdf->download('tester.pdf');
    }
}
