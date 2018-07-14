<?php

namespace App\Http\Controllers;

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
        if ($hasSubmitted) {
            $questionnaire = $hasSubmitted->questionnaire;
        } else {
            abort('403','O questionário só pode ser respondido mediante a envio do link. Verifique seu e-mail.');
        }

        //TODO: MONTAR FORMULARIO DE RESPOSTA
        dd($questionnaire);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: SALVAR RESPOSTA E REMOVER TOKEN PARA ACESSO
        dd('OPA, RESPONDIDO !');
    }
}
