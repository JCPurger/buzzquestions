<?php

namespace App\Http\Controllers;

use App\Submitted;
use App\Questionnaire;
use App\Mail\answerMail;
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
        try {
            $token = Password::getRepository()->createNewToken();
            $questionnaire = Questionnaire::find($id);
            $questionnaire->submits()->create(['token' => $token]);

            Mail::to($request->email)
                ->send(new answerMail($request, $token));

        } catch (\Exception $e) {
            return back()->with(['message' => 'A email não pode ser enviado. Tente novamente mais tarde.','msg-type' => 'danger']);
        }

        return back()->with(['message' => 'Enviado com sucesso','msg-type' => 'success']);
    }
}
