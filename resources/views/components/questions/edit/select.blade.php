<div class="col-xs-10">
    <div class="col-md-10">
        <form class="form-group-q question-form" method="POST" action="{{ route('question.update',$question->id) }}">
            <h3>Resposta multipla</h3>
            <input type="hidden" name="type" value="3">
            <input type="hidden" name="id" value="{{ $question->id }}">

            <div class="form-group">
                <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta" value="{{ old('wording',@$question->wording) }}" required>
            </div>

            @forelse ($question->values as $value)
                <div class="form-control-q">
                    <input type="checkbox" name="checkChoice[]" value="checkbox1" disabled>
                    <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção" value="{{ old('wording',$value->content) }}" required></label>
                </div>
            @empty
                <div class="form-control-q">
                    <input type="checkbox" name="checkChoice[]" value="checkbox1" disabled>
                    <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção" required></label>
                </div>
            @endforelse

            <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
            <button class="btn btn-warning btn-xl js-scroll-trigger add-question" href="#about">Adicionar Opção</button>
            <button class="btn btn-danger btn-xl js-scroll-trigger remove-question" href="#about">Excluir Opção</button>
        </form>
    </div>
</div>