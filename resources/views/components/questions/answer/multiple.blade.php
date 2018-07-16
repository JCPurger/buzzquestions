<div class="col-md-10">
    <form method="POST" class="form-group-q question-form"  action="{{ route('answer.store',$question->id) }}">
        {{--<h3> Pergunta Tipo 1</h3>--}}
        <input type="hidden" name="type" value="multiple">
        <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta" value="{{ $question->wording }}" required>

        @foreach($question->values as $value)
            <div class="form-control-q">
                <input type="radio" name="option[]" value="{{ $value->id }}">
                <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção" value="{{ $value->content }}" required></label>
            </div>
        @endforeach

        <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
    </form>
</div>