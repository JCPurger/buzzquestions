<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class MonitorarController extends Controller
{
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);
        return view('monitorar',['questions' => $questionnaire->questions()->get()]);
    }
}
