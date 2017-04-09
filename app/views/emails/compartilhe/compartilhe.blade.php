<HTML>
<HEAD>
    <STYLE>
        BODY {margin:0; padding:0;}
        h1 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 22px;
            line-height: 48px;
            color: #0082B4;
            font-weight: bold;
        }
        h2 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight:bold;
            line-height: 10px;
            color: #0082B4;
            font-weight: bold;
            margin: 6px 0;
            padding:0;
        }
        h6 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: normal;
            line-height: 13px;
            color: #000;
        }
        .texto {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 13px;
            line-height: 15px;
            font-weight: normal;
            color: #000;
        }
        a {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-style:italic;
            line-height: 13px;
            font-weight: normal;
            color: #909090;
            text-decoration:none;
        }
    </STYLE>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<table width="650" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td valign="top" style="padding:0 20px;">
            <h1>Indicação de página no Portal iSonhei . </h1>
            <p class="texto">Olá <strong>{{$to_nome}}</strong>, seu amigo(a) <strong>{{$from_nome}} </strong>indicou uma página no Portal <strong>iSonhei</strong>.</p>
            <h2>{{$nomeEmpresa}}</h2>
            <a href="{{$urlPortal}}">{{$urlPortal}}</a>
            <p class="texto">{{$mensagem}}</p>
            <br /><br />
        </td>
    </tr>
    <tr>
        <td valign="middle">
            <div style="float:left; margin-right:15px; margin-left:10px;">
                <img src="{{asset('assets/img/email/logo-isonhei.gif')}}" width="100" height="62" alt="">
            </div>
            <h6>Não responda esta mensagem. Esta caixa de e-mail é automática e você não receberá uma resposta.<br>Leia os Termos de Uso e Política de Privacidade do Portal iSonhei.<br>&copy;2015 iSonhei - O portal para quem quer realizar sonhos!<br>Todos os direitos reservados.</h6>
        </td>
    </tr>
</table>
</body>
</html>