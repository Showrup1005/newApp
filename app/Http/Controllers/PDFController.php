<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'welcome to our page',
            'date' => date('m/d/Y'),
            'description' => 'lorem ajajsdlkk jdslkjl ajljslkdjlkjsd kjdfl kjkasjlk lkfjlkfdjkd'
        ];
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
