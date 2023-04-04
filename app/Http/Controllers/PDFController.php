<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function buatPdf($id)
    {
        $data = Pengaduan::where('id_pengaduan',$id)->get()->first();
    
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf', compact('data'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        
        return $pdf->stream();
    }
}
