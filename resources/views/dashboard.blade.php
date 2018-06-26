@extends('layouts.main')
@section('title', 'dashboard')

@section('content')

    <header class="container-fluid">
        <a class="btn btn-warning" href="{{ route('questionnaire.create') }}">Criar novo</a>
        <div class="card">
            <table class="table table-hover shopping-cart-wrap">
                <tbody>
                {{--TODO: TERMINAR NOME QUESTIONARIO E CAMPOS NECESSARIOS--}}
                @forelse($questionnaires as $questionnaire)
                    <tr>
                        <td>
                            <figure class="media">
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">Nome questionario</h6>
                                    <dl class="param param-inline small">
                                        <dt>Criado em: {{ $questionnaire->created_at }}</dt>
                                    </dl>
                                </figcaption>
                            </figure>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('questionnaire.edit',$questionnaire->id) }}" class="btn btn-outline-primary"> Editar</a>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('questionnaire.show',$questionnaire->id) }}" class="btn btn-outline-success"> Compartilhar</a>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('questionnaire.show',$questionnaire->id) }}" class="btn btn-outline-primary"> Enviar</a>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('questionnaire.destroy',$questionnaire->id) }}" class="btn btn-outline-danger"> Remover</a>
                        </td>
                    </tr>
                @empty
                    <tr>Você não contêm nenhum questionário cadastrado !</tr>
                @endforelse
                </tr>
                </tbody>
            </table>
        </div>
    </header>

@endsection