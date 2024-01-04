<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kuesioner;
use App\Models\Periode;
use App\Models\PilihPeriode;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $idUser = auth()->user()->id;
        $checkPeriod = PilihPeriode::first();
        $checkKuesioner = Hasil::where('id_user', $idUser)->where('id_periode', $checkPeriod->id_periode)->count();
        if ($checkKuesioner > 0) {
            return redirect()->route('user.questionnaire.check');
        }
        $kuesioners = Kuesioner::get();
        return view('backend.users_questionnaire', compact('kuesioners'));
    }


    public function store(Request $request)
    {
        $idUser = auth()->user()->id;
        $checkPeriod = PilihPeriode::first();
        $periode = Hasil::where('id_user', $idUser)->where('id_periode', $checkPeriod->id_periode)->count();
        if ($periode > 0) {
            return redirect()->route('user.questionnaire.check')->with('error', 'Gagal, anda sudah pernah mengisikan kuesioner');
        }
        $answer = []; // Array yang berisi data jawaban

        foreach ($request->id as $index => $id) {
            $value = $request->input('optionsGroup' . $id);
            $kategori = $request->input('kategori')[$index];

            // Membuat array asosiatif dengan kategori
            $answerItem = [
                'id' => $id,
                'answer' => $value,
                'kategori' => $kategori,
            ];

            // Menambahkan array asosiatif ke dalam array $answer
            $answer[] = $answerItem;
        }

        // Menginisialisasi array untuk menyimpan total jawaban per kategori
        $totalsPerGroup = array_fill(1, 8, 0);

        // Menghitung total jawaban untuk setiap kategori
        foreach ($answer as $item) {
            $kategori = $item['kategori'];
            $totalsPerGroup[$kategori] += $item['answer'];
        }

        $kmTotal =  $totalsPerGroup[1] +  $totalsPerGroup[2] + $totalsPerGroup[3];
        $kmClass = null;
        if ($kmTotal >= 63) {
            $kmClass = 'High';
        } else if ($kmTotal >= 42) {
            $kmClass = 'Medium';
        } else {
            $kmClass = 'Low';
        }

        $rmTotal =  $totalsPerGroup[4] +  $totalsPerGroup[5] + $totalsPerGroup[6] + $totalsPerGroup[7] + $totalsPerGroup[8];
        $rmClass = null;
        if ($rmTotal >= 132) {
            $rmClass = 'High';
        } else if ($rmTotal >= 88) {
            $rmClass = 'Medium';
        } else {
            $rmClass = 'Low';
        }

        Hasil::create([
            'id_user' => $idUser,
            'id_periode' => $checkPeriod->id_periode,
            'declarative_knowledge' => $totalsPerGroup[1],
            'procedural_knowledge' => $totalsPerGroup[2],
            'conditional_knowledge' => $totalsPerGroup[3],
            'km_total' => $kmTotal,
            'km_class' => $kmClass,
            'planning' => $totalsPerGroup[4],
            'information_management' => $totalsPerGroup[5],
            'monitoring' => $totalsPerGroup[6],
            'debugging' => $totalsPerGroup[7],
            'evaluation' => $totalsPerGroup[8],
            'rm_total' => $rmTotal,
            'rm_class' => $rmClass,
        ]);

        return redirect()->route('user.questionnaire.check');
    }

    // public function check()
    // {
    //     $idUser = auth()->user()->id;
    //     $historiPengisian = Hasil::where('id_user', $idUser)->get();

    //     return view('backend.dashboard', compact('historiPengisian'));
    // }
}
