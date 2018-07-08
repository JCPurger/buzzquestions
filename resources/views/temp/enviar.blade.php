@extends('layouts.main')
@section('title', 'enviar')

@section('content')

<header class="container-fluid">
  <div class="card">

    <form action="/" method="post">
      <div class="col-sm-10">
        <div class="row send">
          <h3>Compartilhe seu questionário!</h3>
          <div class="form-group">
            <label>Enviar para:</label>
            <input type="text" class="form-control form-enviar" name="email" id="email" placeholder="email@exemplo.com">
          </div>
        </div>
      </div>
    </form>

    <hr>

    <form action="/" method="post">
      <div class="col-sm-10">
        <div class="row send">
          <div class="form-group">
            <label>Assunto:</label>
            <input type="text" class="form-control form-enviar" name="email" id="email" placeholder="Queremos ouvir sua opinião">
          </div>
        </div>
      </div>
    </form>

    <hr>

    <label>Mensagem:</label>
    <table>
      <tbody>
        <tr>
          <td align="center" class="env_mens">
            <table class="table-mens" cellpadding="5" cellspacing="5">
              <tbody>
                <tr>
                  <td class="td-mens">
                    <table class="table-td-mens">
                      <tbody>
                        <tr>
                          <td class="table-td-table">
                            <table width="100%" class="table-td-table">
                              <tbody>
                                <tr>
                                  <td>
                                    <h2><a class="a-span" target="_blank">Nome do Questionário
                                    </span></a>
                                  </h2>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table-td-mens">
                    <tbody>
                      <tr>
                        <td class="table-td-table">
                          <table width="100%" class="table-td-table">
                            <tbody>
                              <tr>
                                <td class="table-td-table">
                                  <div class="mens-body">
                                    <div class="span-mens">Este é um questionário de pesquisa e sua participação é importante. Clique no botão abaixo para começar a respondê-lo. Agradecemos sua
                                      participação!<span class="span-mens-span"></span>.
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table-td-mens">
                    <tbody>
                      <tr>
                        <td class="table-td-table">
                          <table class="table-bot">
                            <tbody class="span-mens">
                              <tr class="span-mens">
                                <td align="center" class="td-bot"><a herf="" target="_blank" class="a-span">Iniciar Questionário</a>
                                </td>
                              </tr>
                            </tbody>
                          </table> 
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <button type="submit" class="button button-block"/>
Enviar</button>

</div>
</header>

@endsection