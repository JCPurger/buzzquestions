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
                            <input type="text" class="form-control" name="email" id="email" placeholder="email@exemplo.com" size="400">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="col-sm-10">
                    <div class="row send">
                        <div class="form-group">
                            <label>Assunto:</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Queremos ouvir sua opinião" size="400">
                        </div>
                    </div>
                </div>


                <hr>

                <label>Mensagem:</label>
                <table>
                    <tbody>
                    <tr>
                        <td align="center" style="border-collapse: collapse;
            padding-top: 30px; padding-bottom: 30px;">
                            <table cellpadding="5" cellspacing="5" width="600" bgcolor="white" style="border-collapse: collapse;
               border-spacing: 0;">
                                <tbody>
                                <tr>
                                    <td style="border-collapse: collapse; padding: 0px;
                        text-align: center; width: 600px;">
                                        <table style="border-collapse: collapse; border-spacing:
                           0; box-sizing: border-box; min-height: 40px;
                           position: relative; width: 100%;">
                                            <tbody>
                                            <tr>
                                                <td style="border-collapse: collapse; font-family:
                                    Segoe Print; padding: 10px 15px; background:
                                    #fff;">
                                                    <table width="100%" style="border-collapse: collapse; border-spacing:
                                       0; font-family: Segoe Print;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="border-collapse: collapse;">
                                                                <h2><a style="display: inline-block; text-decoration:
                                                   none; box-sizing: border-box; font-family: Segoe Print;
                                                   width: 100%; text-align: center; color:
                                                   rgb(102,102,102); font-size: 16px; cursor: text;" target="_blank"><span style="font-weight: normal;
                                                   color: #666;">Nome do Questionário
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
                                        <table style="border-collapse: collapse;
                           border-spacing: 0; box-sizing: border-box;
                           min-height: 40px; position: relative; width:
                           100%;">
                                            <tbody>
                                            <tr>
                                                <td style="border-collapse:
                                    collapse; font-family: Segoe Print; padding: 10px
                                    15px;">
                                                    <table width="100%" style="border-collapse: collapse; border-spacing:
                                       0; text-align: left; font-family:
                                       Segoe Print;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="border-collapse:
                                                collapse;">
                                                                <div style="font-family: Segoe Print;
                                                   font-size: 15px; font-weight: normal; line-height:
                                                   170%; text-align: left; color: #666; word-wrap:
                                                   break-word;">
                                                                    <div style="text-align:
                                                      center;">Este é um questionário de pesquisa e sua participação é importante. Clique no botão abaixo para começar a respondê-lo. Agradecemos sua
                                                                        participação!<span style="line-height: 0;
                                                         display: none;"></span><span style="line-height:
                                                         0; display:
                                                         none;"></span>.
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
                                        <table style="border-collapse: collapse;
                           border-spacing: 0; box-sizing: border-box;
                           min-height: 40px; position: relative; width: 100%;
                           padding-bottom: 10px; padding-top: 10px;
                           text-align: center;">
                                            <tbody>
                                            <tr>
                                                <td style="border-collapse: collapse; font-family:
                                    Segoe Print; padding: 10px 15px;">
                                                    <div style="font-family: Segoe Print; text-align:
                                       center;">
                                                        <table style="border-collapse:
                                          collapse; border-spacing: 0; background-color:
                                          orange; border-radius: 10px; color:
                                          rgb(255,255,255); display: inline-block;
                                          font-family: Segoe Print; font-size: 15px; font-weight:
                                          bold; text-align: center;">
                                                            <tbody style="display:
                                             inline-block;">
                                                            <tr style="display:
                                                inline-block;">
                                                                <td align="center" style="border-collapse: collapse; display:
                                                   inline-block; padding: 15px 20px;"><a herf="" target="_blank" style="display: inline-block;
                                                   text-decoration: none; box-sizing: border-box;
                                                   font-family: Segoe Print; color: #fff; font-size: 15px;
                                                   font-weight: bold; margin: 0px; padding: 0px;
                                                   text-align: center; word-wrap: break-word; width:
                                                   100%; cursor: text;">Iniciar Questionário</a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table style="border-collapse: collapse;
                           border-spacing: 0; box-sizing: border-box;
                           min-height: 40px; position: relative; width: 100%;
                           padding: 30px 0px; text-align: center;">
                                            <tbody>
                                            <tr>
                                                <td style="border-collapse: collapse;
                                    font-family: Segoe Print; padding: 10px 15px;">
                                                    <table width="100%" style="border-collapse: collapse;
                                       border-spacing: 0; font-family: Segoe Print;">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" style="border-collapse:
                                                collapse;">
                                                                <img style="height: auto; width: 30px;">
                                                                &nbsp;
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
            </form>
        </div>
    </header>

@endsection