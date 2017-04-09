
<HTML>
<HEAD>
    <STYLE>
        BODY {
            font-family: Verdana;
            font-size: 11pt;
            color: #000;
            margin: 0;
            padding: 0;
        }

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
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="99%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="middle" bgcolor="#ffffff" style="background:#ffffff">
            <table width="600" height="624" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
                <tr>
                    <td height="20"></td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#dcdcdc"><img src="{{asset('assets/img/email/logo_azul.gif')}}" width="216" height="159" alt=""></td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#F0F0F0" style="padding:0 50px;">
                        <h1>Pedido de Redefinição de Senha</h1>

                        <p class="texto">Prezado(a) <strong>{{$user->first_name}}</strong>, houve uma solicitação para
                            alterar a senha de sua conta no Portal <strong>iSonhei</strong>.</p>

                        <p class="texto">Se você solicitou essa alteração, clique no link abaixo para redefinir sua
                            senha.</p>

                        <p class="texto" align="center"><a href="{{$forgotPasswordUrl}}">REDEFINIR MINHA SENHA DE ACESSO
                                AO PORTAL ISONHEI</a></p>

                        <p class="texto">Se por acaso você não fez essa solicitação, ignore esta mensagem, sua senha
                            permanecerá a mesma. </p>

                        <p class="texto">Obrigado,</p>

                        <p class="texto"><strong>Equipe iSonhei</strong></p>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" bgcolor="#00A6E2">
                        <h6>Não responda esta mensagem. Esta caixa de e-mail é automática e você não receberá uma
                            resposta.<br>
                            Leia os Termos de Uso e Política de Privacidade do Portal iSonhei.<br>
                            &copy;2015 iSonhei - O portal para quem quer realizar sonhos! - Todos os direitos
                            reservados.</h6></td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>