@extends('layouts.main')
@section('title', 'questionário')

@section('content')
    <header class="container-fluid">
        <div class="container form-quest">

            <h2>Nome do Questionário</h2>

            <div class="form_quest">
                <div class="col-xs-10" id="questoes-lista">
                    @foreach($questionnaire->questions as $question)
                        @include('components.questions.answer.'.$question->type)
                    @endforeach

                    <form method="POST" action="{{ route('answer.conclude',$token) }}">
                        @csrf
                        @method('PUT')
                        <button id="concluir" class="btn btn-dark btn-xl btn-quest js-scroll-trigger submit">Concluir Questionário</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('scripts')
    <script>
        $('input[type="text"]').prop('disabled', true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //ENVIA QUESTÃO PRONTA PARA SALVAR VIA AJAX
        $('body').on('submit', '.question-form', function (e) {
            console.log($(this));
            e.preventDefault();
            $current_form = $(this);

            $current_form.ajaxSubmit({
                success: function (resposta) {
                    console.log(resposta);
                    $current_form.find('textarea').prop('disabled', true);
                    $current_form.find('input').prop('disabled', true);
                    $current_form.find('button').remove();
                },
                error: function (jqXHR) {
                    alert(jqXHR.responseJSON.message);
                }
            });
        });

    </script>
@endsection