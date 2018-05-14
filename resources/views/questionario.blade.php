@extends('layouts.main')
@section('title', 'questionário')

@section('content')
    <header class="container-fluid">
        <div class="container form-quest">

            <h2>Seu Questionário</h2>

            <div class="dropdown" id="add-button">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nova Pergunta
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" data-type="">Múltipla Escolha</a>
                    <a class="dropdown-item" href="#" data-type="">Caixa de Comentários</a>
                    <a class="dropdown-item" href="#" data-type="">Caixa de Seleção</a>
                </div>
            </div>

            <div class="form_quest">
                <div class="col-xs-10">
                    <div class="col-md-10">
                        <form class="form-group-q question-form" method="POST" action="{{ route('store.question') }}">
                            {{--<h3> Pergunta Tipo 1</h3>--}}
                            <input type="hidden" name="tipo" value="1">

                            <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta">

                            <div class="radio">
                                {{--<input type="radio" name="optradio" value="1"> So aparece isso quando "salvar" a pergunta--}}
                                <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção"></label>
                            </div>

                            {{--<div class="radio">--}}
                                {{--<input type="radio" name="optradio" value="teste 2"><label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção"></label>--}}
                            {{--</div>--}}

                            {{--<div class="radio">--}}
                                {{--<input type="radio" name="optradio" value="teste 3"><label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção"></label>--}}
                            {{--</div>--}}

                            <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
                            <button class="btn btn-warning btn-xl js-scroll-trigger add-question">Adicionar Opção</button>
                            <button class="btn btn-danger btn-xl js-scroll-trigger remove-question">Excluir Opção</button>
                        </form>
                    </div>

                    <div class="col-xs-10">
                        <div class="col-md-10">
                            <form class="form-group-q question-form" method="POST" action="{{ route('store.question') }}">
                                {{--<h3> Pergunta Tipo 2</h3>--}}
                                <input type="hidden" name="tipo" value="2">
                                <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta">
                                <!--  <textarea class="form-control" id="textarea" rows="3"></textarea>  So aparece isso quando "salvar" a pergunta-->
                                <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-xs-10">
                        <div class="col-md-10">
                            <form class="form-group-q question-form" method="POST" action="{{ route('store.question') }}">
                                {{--<h3> Pergunta Tipo 3</h3>--}}
                                <input type="hidden" name="tipo" value="3">
                                <input class="form-control" type="text" name="wording" placeholder="Digite sua pergunta">

                                <div class="form-control-q">
                                    <input type="checkbox" name="checkChoice[]" value="checkbox1" id="defaultCheck1">
                                    <label><input class="form-control" type="text" name="choice[]" placeholder="Primeira opção"></label>
                                </div>

                                <div class="form-control-q">
                                    <input type="checkbox" name="checkChoice[]" value="checkbox2" id="defaultCheck2">
                                    <label><input class="form-control" type="text" name="choice[]" placeholder="Segunda opção"></label>
                                </div>

                                <div class="form-control-q">
                                    <input type="checkbox" name="checkChoice[]" value="checkbox3" id="defaultCheck2">
                                    <label><input class="form-control" type="text" name="choice[]" placeholder="Terceira opção"></label>
                                </div>

                                <button class="btn btn-dark btn-xl js-scroll-trigger save-question" type="submit">Salvar Pergunta</button>
                                <button class="btn btn-warning btn-xl js-scroll-trigger" href="#about">Adicionar Opção</button>
                                <button class="btn btn-danger btn-xl js-scroll-trigger" href="#about">Excluir Opção</button>
                            </form>
                        </div>
                    </div>

                    <a class="btn btn-dark btn-xl btn-quest js-scroll-trigger" href="#about">Concluir Questionário</a>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('scripts')
    <script>
        //ADD NOVO TIPO DE QUESTÃO
        $('#add-button').on('click', 'a', function () {
            console.log($(this));
        });

        //ADD CAMPO DENTRO DA QUESTAO
        $('body').on('click','.add-question',function (e) {
            e.preventDefault();
            $last = $(this).siblings('.radio').last();
            $last.after($last.clone());
            console.log($last);
        });

        //REMOVE CAMPO DENTRO DA QUESTAO
        $('body').on('click','.remove-question',function (e) {
            e.preventDefault();
            if($(this).siblings('.radio').length > 1){
                $last = $(this).siblings('.radio').last().remove();
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.question-form').ajaxForm({
            // Se enviado com sucesso
            success: function (resposta) {
                // Exibindo resposta do servidor
                console.log(resposta);

            },
            // Se acontecer algum erro
            error: function () {
                console.log("DEU RUIM !");
            }
        });
    </script>
@endsection