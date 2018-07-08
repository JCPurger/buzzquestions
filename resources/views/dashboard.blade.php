@extends('layouts.main')
@section('title', 'dashboard')

@section('content')

    <header class="container-fluid">

        @if (session('menssagem'))
            <div class="alert alert-warning" role="alert">
                {{ session('menssagem') }}
            </div>
        @endif

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
                            <a href="{{ route('monitor',$questionnaire->id) }}" class="btn btn-outline-success"> Monitorar</a>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('submit.create',$questionnaire->id) }}" class="btn btn-outline-primary"> Enviar</a>
                        </td>
                        <td class="text-right">
                            <button class="btn btn-outline-danger quest-delete" type="submit" data-toggle="modal" data-target="#remove-modal"> Remover</button>
                        </td>
                    </tr>
                @empty
                    <tr>Você não contêm nenhum questionário cadastrado !</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </header>

    <!-- Modal de remoção -->
    <div class="modal fade" id="remove-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comfirme a exclusão!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Você tem certeza ABSOLUTA de que quer excluir este item ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('questionnaire.destroy',$questionnaire->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Comfirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection