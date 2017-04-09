<HTML>
<HEAD>
    <STYLE>
        BODY {font-family: Verdana;font-size: 11pt; color: #000; margin:0; padding:0;}
        h1 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 24px;
            line-height: 48px;
            color: #0082B4;
            font-weight: bold;
            text-align: center;
        }
        h6 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: normal;
            line-height: 13px;
            color: #FFF;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 0px;
            padding-bottom: 0px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .campos {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 12px;
            font-weight: bold;
            color: #000;
        }
        .dados {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 12px;
            font-weight: normal;
            color: #000;
        }
        .texto {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 13px;
            line-height: 15px;
            font-weight: normal;
            color: #000;
        }
    </STYLE>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<table width="100%" height="99%" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr>
        <td align="center" valign="middle" bgcolor="#ffffff" style="background:#ffffff">
            <table width="600" height="624" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
                <tr><td height="20"></td></tr>
                <tr>
                    <td align="center" bgcolor="#dcdcdc"><img src="{{ asset('assets/img/email/logo_azul.gif') }}" width="216" height="159" alt=""></td>
                </tr>
                <tr>
                    <td height="401" valign="top" bgcolor="#F0F0F0" style="padding:0 50px;">
                        <h1>Novo Contato do Portal iSonhei</h1>
                        <p class="texto"><strong>
                            {{\Input::get('nome')}}</strong> entrou em contato com sua empresa (<strong>{{ $cliente }} - {{$anuncio_cat}}</strong>) através do Portal <strong>iSonhei</strong>.
                            Seguem abaixo os dados e a mensagem recebida através do nosso portal.
                        </p>
                        <p class="texto">&nbsp;</p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="20%" height="40" valign="top" class="campos">NOME:</td>
                                <td width="80%" valign="top" class="dados">{{\Input::get('nome')}}</td>
                            </tr>
                            <tr>
                                <td height="40" valign="top" class="campos">E-MAIL:&nbsp;</td>
                                <td valign="top" class="dados">{{\Input::get('email')}}</td>
                            </tr>
                            <tr>
                                <td height="40" valign="top" class="campos">DATA:&nbsp;</td>
                                <td valign="top" class="dados">{{date("d/m/Y H:i:s")}}</td>
                            </tr>
                            @if(\Input::get('telefone'))
                                <tr>
                                    <td height="40" valign="top" class="campos">TELEFONE:&nbsp;</td>
                                    <td valign="top" class="dados">{{\Input::get('telefone')}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td height="40" valign="top" class="campos">ASSUNTO:&nbsp;</td>
                                <td valign="top" class="dados">{{\Input::get('assunto')}}</td>
                            </tr>
                            <tr>
                                <td height="40" valign="top" class="campos">MENSAGEM:&nbsp;</td>
                                <td valign="top" class="dados">{{\Input::get('mensagem')}}</td>
                            </tr>
                        </table>

                        {{--@if($dados_user_fidelidade)--}}

                            {{--<p class="texto">--}}
                                {{--Abaixo seguem dois códigos geradores de pontuação no iSonhei Club.--}}
                            {{--</p>--}}
                            {{--<p>&nbsp;</p>--}}
                            {{--<p class="texto">--}}
                                {{--<strong>CÓDIGO VISITA:</strong> {{$dados_user_fidelidade["cod_visita"]}}--}}
                            {{--</p>--}}
                            {{--<p class="texto">--}}
                                {{--O código acima deve ser fornecido ao cliente no ato da visita presencial ao seu estabelecimento.--}}
                            {{--</p>--}}
                            {{--<p>&nbsp;</p>--}}
                            {{--<p class="texto">--}}
                                {{--<strong>CÓDIGO FECHAMENTO:</strong> {{$dados_user_fidelidade["cod_fechamento"]}}--}}
                            {{--</p>--}}
                            {{--<p class="texto">--}}
                                {{--O código acima deve ser entregue quando o cliente fechar o contrato de prestação de serviço com a sua empresa.--}}
                            {{--</p>--}}
                            {{--<br>--}}
                            {{--<p class="texto">--}}
                                {{--<strong>Importante:</strong> o código é pessoal, único, intransferível e gerado automaticamente pelo sistema.--}}
                                {{--Os códigos são um estímulo para o seu ato de venda, por isso, é importante que você administre corretamente sua distribuição.--}}
                            {{--</p>--}}

                        {{--@endif--}}
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" bgcolor="#00A6E2">
                        <h6>Não responda esta mensagem. Esta caixa de e-mail é automática e você não receberá uma resposta.<br>
                            Leia os Termos de Uso e Política de Privacidade do Portal iSonhei.<br>
                            &copy;2015 iSonhei - O portal para quem quer realizar sonhos! - Todos os direitos reservados.</h6></td>
                </tr>
                <tr><td height="20"></td></tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>