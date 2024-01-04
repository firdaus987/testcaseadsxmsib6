<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\PilihPeriode;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function instruction()
    {
        return view('backend.questionnaire_instructions');
    }

    public function checkQuestionnaire()
    {
        $checkPeriod = PilihPeriode::first();
        if ($checkPeriod->aktif == 0 ||  !$checkPeriod->id_periode) {
            return view('backend.closed_questionnaire');
        }

        $idUser = auth()->user()->id;
        $countResult = Hasil::where('id_user', $idUser)->where('id_periode', $checkPeriod->id_periode)->count();
        if ($countResult > 0) {
            return view('backend.completed_questionnaire');
        }

        return view('backend.not_filled_questionnaire');
    }

    public function closedQuestionnaire()
    {
        return view('backend.closed_questionnaire');
    }
}
