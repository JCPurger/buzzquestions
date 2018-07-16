<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Questionnaire;
use App\Submitted;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $hasSubmitted = Submitted::where('token', $request->token)->first();
        if ($hasSubmitted)
            $questionnaire = $hasSubmitted->questionnaire;
        else
            abort('403', 'O questionário só pode ser respondido mediante a envio do link. Verifique seu e-mail.');

        return view('answer', ['questionnaire' => $questionnaire, 'token' => $request->token]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($request->option) {
            foreach ($request->option as $option) {
                Answer::create(['content' => '','question_value_id' => $option, 'question_id' => $id]);
            }
        } else {
            Answer::create(['content' => $request->content, 'question_id' => $id]);
        }

        return response()->json('A RESPOSTA FOI SALVA !', 200);
    }

    public function conclude(Request $request, $token)
    {
        //TODO: TERMINAR O CONCLUIR
        Submitted::where('token',$token)->first()->delete();
        return back();
        return view('respondido');
    }
}
