<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function buatPdf($id)
    {
        $data = Pengaduan::where('id_pengaduan',$id)->get()->first();
        $tanggapan = Tanggapan::where('id_pengaduan',$data->id_pengaduan)->get();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf', ['data'=>$data,'tanggapan'=>$tanggapan])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        
        return $pdf->stream();
    }
}
