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
                    <td height="158" align="center" bgcolor="#dcdcdc"><img src="{{asset('assets/img/email/topo_email.jpg')}}" width="600" height="158" alt=""></td>
                </tr>
                <tr>
                    <td height="401" align="left" valign="top" bgcolor="#F0F0F0" style="padding:0 50px;">
                        <h1>Bem-vindo ao iSonhei!</h1>
                        <p class="texto">Parabéns <strong>{{$user->first_name}}</strong>, você realizou com sucesso o cadastro no Portal <strong>iSonhei</strong>.</p>
                        <p class="texto">Para validar seu cadastro e usufruir de todos os benefícios no portal, é preciso clicar no link abaixo para ativar sua conta. Este link só poderá ser utilizado uma  vez.</p>
                        <p class="texto" align="center"><a href="{{$activationUrl}}">QUERO ATIVAR MINHA CONTA NO ISONHEI</a></p>
                        <p class="texto">Os seguintes dados são necessários para ter acesso ao Portal <strong>iSonhei</strong> após clicar no link acima.</p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="20%" height="40" valign="top" class="campos">E-MAIL:&nbsp;</td>
                                <td width="80%" valign="top" class="dados">{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td height="40" valign="top" class="campos">SENHA:&nbsp;</td>
                                <td valign="top" class="dados">sua senha informada no cadastro.</td>
                            </tr>
                        </table>
                        <p class="texto">Caso tenha dúvidas sobre sua conta ou qualquer assunto do portal, entre em contato conosco através do e-mail <a href="mailto: @lang('general.empresa_email_geral')"> @lang('general.empresa_email_geral')</a> ou pela nossa página de contato no site.</p>
                        <p class="texto">&nbsp;</p>
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