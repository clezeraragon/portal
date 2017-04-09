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
                    <td align="center" bgcolor="#dcdcdc"><img src="{{asset('assets/img/email/logo_azul.gif')}}" width="216" height="159" alt=""></td>
                </tr>
                <tr>
                    <td height="401" valign="top" bgcolor="#F0F0F0" style="padding:0 50px;">
                        <h1>Sua mensagem foi enviada com sucesso!</h1>
                        <p class="texto"><strong>Obrigado por utilizar o Portal iSonhei.</strong></p>

                        {{--@if($dados_user_fidelidade)--}}
                            {{--<p class="texto">--}}
                                {{--Parabéns! Por ter solicitado um contato com ({{ $cliente }} - {{$anuncio_cat}}) através do formulário no Guia de Empresas, você já ganhou--}}
                                {{--{{$dados_user_fidelidade["pontos_pedido"]}} pontos.--}}
                            {{--</p>--}}
                            {{--<p class="texto">--}}
                                {{--Você pode ganhar mais {{$dados_user_fidelidade["pontos_visita"]}} pontos caso visite <strong>{{$cliente}}</strong> e ainda--}}
                                {{--{{$dados_user_fidelidade["pontos_fechamento"]}} pontos se fechar um contrato com esta empresa.--}}
                            {{--</p>--}}
                            {{--<p class="texto">--}}
                                {{--<strong>IMPORTANTE:</strong>--}}
                            {{--</p>--}}
                            {{--<ul>--}}
                                {{--<li>--}}
                                    {{--<p class="texto">--}}
                                        {{--Você deve solicitar o seu código de pontuação no ato da visita com {{$cliente}}.--}}
                                        {{--O mesmo procedimento acontece se fechar o contrato, neste caso, você ganhará dois códigos da mesma empresa.--}}
                                    {{--</p>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<p class="texto">--}}
                                        {{--Para inserir seus pontos, você deve acessar o seu painel de controle e incluir os códigos que recebeu no campo indicado,--}}
                                        {{--dessa forma você visualizará a acúmulo de pontos na somatória total.--}}
                                    {{--</p>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<p class="texto">--}}
                                        {{--Esta ação possui um prazo de validade, por isso fique atento! Você tem seis meses a partir do primeiro contato com--}}
                                        {{--o {{$cliente}} para conseguir pontuar nas demais ações, de visita ao espaço e fechamento de contrato.--}}
                                    {{--</p>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<br>--}}
                        {{--@endif--}}

                        <p class="texto">Aguarde que a empresa (<strong>{{ $cliente }} - {{$anuncio_cat}}</strong>) retornará em breve seu contato.</p>
                        <p class="texto">Segue abaixo a cópia da sua mensagem.</p>
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
                        <p>&nbsp;</p>
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