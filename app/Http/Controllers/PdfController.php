<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function downloadPDF()
    {
        $result = DB::table('rotasikunci as rk')
            ->join('kunci AS k', 'rk.id_kunci', '=', 'k.id_kunci')
            ->leftJoin('karyawan AS kar', 'kar.id_karyawan', '=', 'rk.id_karyawan')
            ->leftJoin('karyawan AS kar2', 'kar2.id_karyawan', '=', 'rk.id_karyawan_pengembali')
            ->select('k.nama_kunci', 'kar.nama_karyawan', 'kar2.nama_karyawan AS nama_karyawan_pengembalian', 'rk.*')
            ->get();
        $pdf = PDF::loadView('laporan.cetakdatasirkulasi',  compact('result'));
        // return $pdf->stream('cetak-pdf.pdf');
        // $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('cetak-pdf.pdf');
    }
}
