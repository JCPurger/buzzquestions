<div class="col-xs-10">
    <div class="col-md-10">
        <form class="form-group-q question-form" method="POST" action="{{ route('question.store') }}">
            {{--<h3> Pergunta Tipo 2</h3>--}}
            <input type="hidden" name="type" value="2">
            <div class="form-group">
                <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta" value="{{ old('wording',@$question->wording) }}" required>
            </div>
            <!--  <textarea class="form-control" id="textarea" rows="3"></textarea>  So aparece isso quando "salvar" a pergunta-->
            <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
        </form>
    </div>
</div>