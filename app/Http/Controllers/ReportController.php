<?php

namespace App\Http\Controllers;

use App;
use App\Questionnaire;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use VerumConsilium\Browsershot\Facades\PDF;
use VerumConsilium\Browsershot\Facades\Screenshot;

class ReportController extends Controller
{
    public function generate($id)
    {
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
            $questionsJson[] = array_merge($question_array, ['labels' => $labels], ['data' => $data]);
        }
        //JSON COM OS DADOS DE RESPOSTAS MONTADO
        $questionsJson = json_encode($questionsJson);

        return PDF::loadView('monitorar', compact('questionnaire', 'questions', 'questionsJson'))
            ->download('relatorio_questionario_'.$id.'.pdf');
    }
}
