<?php

namespace App\Http\Controllers\AdminBackend;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminResultController extends Controller
{
    public function index()
    {
        $results = Hasil::with('user')->with('periode')->get();
        $results = $results->map(function ($result) {
            $result->formatted_created_at = Carbon::parse($result->created_at)->format('d M Y');
            if ($result->periode->semester == 1) {
                $result->periode->semester = 'Ganjil';
            } else {
                $result->periode->semester = 'Genap';
            }
            return $result;
        });



        return view('admin_backend.admin_result', compact('results'));
    }

    public function show($id)
    {
        $result = Hasil::with('user')->findOrFail($id);
        $result->formatted_created_at = Carbon::parse($result->created_at)->format('d M Y');
        return view('admin_backend.admin_pdf_result', compact('result'));
    }
    public function cetak_pdf($id)
    {
    }
}
