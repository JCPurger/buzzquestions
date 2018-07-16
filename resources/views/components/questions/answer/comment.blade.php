<div class="col-xs-10">
    <div class="col-md-10">
        <form method="POST" class="form-group-q question-form" action="{{ route('answer.store',$question->id) }}">
            <input type="hidden" name="type" value="comment">
            <div class="form-group">
                <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta" value="{{ $question->wording }}" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" id="textarea" rows="3"></textarea>
            </div>
            <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
        </form>
    </div>
</div>