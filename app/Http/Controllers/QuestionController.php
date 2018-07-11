<?php

namespace App\Http\Controllers;

use DB;
use App\Question;
use App\Questionnaire;
use App\Question_value;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $template = view('components.questions.create.' . $request->tipo)->render();
        return response()->json($template, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $questionnaire = Questionnaire::find(session('form_id'));
            $question = new Question(['type' => $request->type, 'wording' => $request->wording]);
            $questionnaire->questions()->save($question);
            if ($request->choice) {
                foreach ($request->choice as $choice) {
                    $question->values()->save(new Question_value(['content' => $choice]));
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Erro ao salvar a questão, verifique antes de salvar.'], 422);
        }

        return response()->json($request, 200);
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
        dd($id);
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
        $question = Question::find($id);
        $question->update($request->all());
        $question->values()->delete();
        if ($request->choice) {
            foreach ($request->choice as $choice) {
                $question->values()->save(new Question_value(['content' => $choice]));
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Question::find($id)->delete();
        return back();
    }
}
