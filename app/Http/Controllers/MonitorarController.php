<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class MonitorarController extends Controller
{
    public function show($id)
    {
        $btnGerar = true;
        $questionnaire = Questionnaire::find($id);
        $questions = $questionnaire->questions->where('type', '<>', 'comment');

        //MONTA UM ARRAY COM OS DADOS DAS RESPOSTAS
        //CONCATENANDO COM A QUESTAO , ENVIANDO COMO JSON
        //PARA MONTAR O GRAFICO DAS RESPOSTAS
        foreach ($questions as $question) {
            $labels = $data = array();
            $question_array = $question->toArray();
            foreach ($question->values as $value) {
                 $labels[] = $value->content;
                 $data[] = $value->answers->count();
            }
            $questionsJson[] = array_merge($question_array,['labels' => $labels],['data' => $data]);
        }
        //JSON COM OS DADOS DE RESPOSTAS MONTADO
        $questionsJson = json_encode($questionsJson);

        return view('monitorar', compact('questionnaire', 'questions', 'questionsJson','btnGerar'));
    }
}
