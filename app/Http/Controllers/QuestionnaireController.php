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
//        $questionnaire = Questionnaire::find($id);
//        return view('questionario-editar',['questionario' => $questionnaire]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);
        $questions_template = "";
        foreach ($questionnaire->questions as $question) {
//            $view = 'components.questions.edit.'.$question->type;
//            $questions_template .= view($view,$question)->render();
            switch ($question->type) {
                case 1:
                    $questions_template .= view('components.questions.edit.multiple', compact('question'))->render();
                    break;
                case 2:
                    $questions_template .= view('components.questions.edit.comment', compact('question'))->render();
                    break;
                case 3:
                    $questions_template .= view('components.questions.edit.select', compact('question'))->render();
                    break;
                default:
                    $questions_template .= "<p>erro ao gerar as perguntas</p>";
                    break;
            }
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
        $res = Questionnaire::find($id)->delete();
        $msg = $res ? 'Foi excluído com sucesso !' : 'Houve um erro ao excluir !';
        return back()->with('menssagem', $msg);
    }

}
