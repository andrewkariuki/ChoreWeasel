<?php

namespace ChoreWeasel\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfGenerator extends Controller
{
    //
    public function savePDF(){

        $pdf = PDF::loadView('yes');
        $publicpath = public_path(). '/invoices/';
        return $pdf->save($publicpath . 'welcome.pdf');
    }
}



