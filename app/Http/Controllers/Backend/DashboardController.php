<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hasil;
use App\Models\User;
use App\Models\PilihPeriode;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
      $kmCounts = Hasil::select('km_class', DB::raw('count(*) as total'))
        ->groupBy('km_class')
        ->orderByRaw("FIELD(km_class, 'High', 'Medium', 'Low')")
        ->get();
      $rmCounts = Hasil::select('rm_class', DB::raw('count(*) as total'))
        ->groupBy('rm_class')
        ->orderByRaw("FIELD(rm_class, 'High', 'Medium', 'Low')")
        ->get();

        $checkPeriod = PilihPeriode::first();
        $idUser = auth()->user()->id;
        $historiPengisian = Hasil::where('id_user', $idUser)->where('id_periode', $checkPeriod->id_periode)->get();
        
        $results = Hasil::with('user')->with('periode')->where('id_user', $idUser)->get();
        $results = $results->map(function ($result) {
            $result->formatted_created_at = Carbon::parse($result->created_at)->format('d M Y');
            if ($result->periode->semester == 1) {
                $result->periode->semester = 'Ganjil';
            } else {
                $result->periode->semester = 'Genap';
            }
            return $result;
        });
      return view('backend.dashboard', compact('kmCounts', 'rmCounts', 'historiPengisian', 'results'));
    }

    public function show($id)
    {
        $result = Hasil::with('user')->findOrFail($id);
        $result->formatted_created_at = Carbon::parse($result->created_at)->format('d M Y');
        return view('backend.user_pdf_result', compact('result'));
    }
    public function cetak_pdf($id)
    {
    }
}
