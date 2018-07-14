<?php

namespace App\Http\Controllers;

use Auth;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Auth::user()->questionnaires->where('complete', true);
        return view('dashboard', ['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //INSERE CHAVE EM SESSION PARA EVITAR INSERÇÃO EXCESSIVA NO BD
        if (session('form_id') == null || Questionnaire::findOrFail(session('form_id'))->complete == 1) {
            $questionnaire = new Questionnaire();
            $questionnaire->category = 1;
            $questionnaire->complete = false;
            $questionnaire->user_id = Auth::user()->id;
            $questionnaire->save();
            session(['form_id' => $questionnaire->id]);
        }

        return view('questionario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //SALVA NO BD ALTERANDO O STATUS PARA COMPLETO E REMOVE CHAVE DA SESSION
        Questionnaire::find(session('form_id'))->update(['complete' => true]);
        $request->session()->forget('form_id');

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        session(['form_id' => $questionnaire->id]); //CHAVE DE SESSION PARA EDITAR
        $questions_template = "";
        foreach ($questionnaire->questions as $question) {
            $view = 'components.questions.edit.'.$question->type;
            $questions_template .= view($view,compact('question'))->render();
        }

        return view('questionario', ['questions_template' => $questions_template]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->session()->forget('form_id');

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Questionnaire::find($id)->delete();
        $msg = $res ? 'Foi excluído com sucesso !' : 'Houve um erro ao excluir !';
        return back()->with('menssagem', $msg);
    }

}
