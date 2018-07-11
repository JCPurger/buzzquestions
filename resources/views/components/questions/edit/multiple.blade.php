<div class="col-md-10">
    <form class="form-group-q question-form" method="POST" action="{{ route('question.update',$question->id) }}">
        <h3>Resposta única</h3>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="type" value="1">

        <div class="form-group">
            <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta" value="{{ old('wording',@$question->wording) }}" required>
        </div>

        @forelse ($question->values as $value)
            <div class="form-control-q">
                <input type="radio" name="optradio" value="1" disabled>
                <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção" value="{{ old('wording',$value->content) }}" required></label>
            </div>
        @empty
            <div class="form-control-q">
                <input type="radio" name="optradio" value="1" disabled>
                <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção" required></label>
            </div>
        @endforelse


        <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
        <button class="btn btn-warning btn-xl js-scroll-trigger add-question">Adicionar Opção</button>
        <button class="btn btn-danger btn-xl js-scroll-trigger remove-question">Excluir Opção</button>
    </form>
</div>