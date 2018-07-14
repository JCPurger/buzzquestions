<?php

namespace App\Http\Controllers;

use App\Submitted;
use App\Questionnaire;
use App\Mail\testeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class SubmitController extends Controller
{
    public function create($id)
    {
        return view('temp.enviar')->with('id', $id);
    }

    public function store(Request $request, $id)
    {
        //FIXME: VER O ERRO DE COM TRANSACTION AQUI
        $token = Password::getRepository()->createNewToken();
        $questionnaire = Questionnaire::find($id);
        $questionnaire->submits()->create(['token' => $token]);

        Mail::to($request->email)
            ->send(new testeMail($request, $token));

        return back()->with('message', 'Enviado com sucesso');
    }
}
