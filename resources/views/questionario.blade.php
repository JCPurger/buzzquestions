@extends('layouts.main')
@section('title', 'questionário')

@section('content')
    <header class="container-fluid">
        <div class="container form-quest">

            <h2>Seu Questionário</h2>

            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nova Pergunta</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-link="{{ route('question.create') }}" id="add-list">
                    <a class="dropdown-item" href="#" data-value="comment">Caixa de Comentários</a>
                    <a class="dropdown-item" href="#" data-value="multiple">Múltipla Escolha</a>
                    <a class="dropdown-item" href="#" data-value="select">Caixa de Seleção</a>
                </div>
            </div>

            <div class="form_quest">
                <div class="col-xs-10" id="questoes-lista">
                    {!! @$questions_template !!}

                    {{--ENTRA AS DIV DAS PERGUNTAS QUE SERÁ MONTADO VIA AJAX--}}

                    <form method="POST" action="{{ route('questionnaire.store') }}">
                        {{ csrf_field() }}
                        <button id="concluir" class="btn btn-dark btn-xl btn-quest js-scroll-trigger submit" disabled="true">Concluir Questionário</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //ADD NOVO TIPO DE QUESTÃO PEGANDO O TEMPLATE VIA AJAX
        $('body').on('click', '#add-list a', function (e) {
            e.preventDefault();
            var link = $(this).parent('#add-list').data('link');
            var tipo = $(this).data('value');
            $questoes = $("#questoes-lista div.col-md-10");

            $.ajax({
                url: link,
                method: 'GET',
                data: {tipo: tipo},
                dataType: 'json'
            }).done(function (data, textStatus, jqXHR) {
                $('#concluir').parent('form').before(data);
                $('#concluir').prop('disabled', false);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.responseJSON) {
                    console.log('failed with json data');
                }else {
                    console.log('failed with unknown data');
                }
            });
        });

        //ENVIA QUESTÃO PRONTA PARA SALVAR VIA AJAX
        $('body').on('submit', '.question-form', function (e) {
            e.preventDefault();
            $current_form = $(this);

            $current_form.ajaxSubmit({
                success: function (resposta) {
                    $current_form.find('input').prop('disabled', true);
                    $current_form.find('button').remove();
                },
                error: function (jqXHR) {
                    alert(jqXHR.responseJSON.message);
                }
            });
        });

        $('body').on('click', '.add-question', function (e) {       //ADD CAMPO DENTRO DA QUESTAO
            e.preventDefault();
            $last = $(this).siblings('.form-control-q').last();
            $last.after($last.clone());
        })
        .on('click', '.remove-question', function (e) {             //REMOVE CAMPO DENTRO DA QUESTAO
            e.preventDefault();
            $form_control = $(this).siblings('.form-control-q');
            if ($form_control.length > 1) {
                $form_control.last().remove();
            }
        });
    </script>
@endsection