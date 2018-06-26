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
        $questionnaires = Auth::user()->questionnaires->where('complete',true);
        return view('dashboard',['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('form_id') == null) {
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
        $questionnaire = Questionnaire::find($id);
        return view('questionario-editar',['questionario' => $questionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::find($id)->delete();
        dd($questionnaire);
    }
}
