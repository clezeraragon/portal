<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body style="background:#F6F6F6; width:100%; margin:0;">
    <center>
        <div style="background:white; width:50%; top:30px; border:1px;">
            <div>
                <a href="{{ URL::route('portal') }}"><img src="http://www.isonhei.com.br/themes/isonhei2/mail/01/template_01.jpg" alt="" style="margin-bottom:10px;" border="0"/></a>
            </div>
            <div>
                @yield('content')
            </div>
            <div style="background:#EAEAEA; padding: 4px;">
                <p style="font-size:16px;">Obrigado, Equipe <strong>@lang('general.site_name')</strong></p>
                <p style="text-align:left; font-size:10px;">
                    {{--{{$mensagem}}--}}
                    Não responda a esta mensagem. Esta caixa de e-mail não é monitorada e você não receberá uma resposta.<br />
                    Leia os Termos de Uso e Política de Privacidade do Portal @lang('general.site_name').<br />
                    © {{date("Y")}} @lang('general.site_name') - O portal para quem quer realizar sonhos!
                </p>
            </div>
        </div>
    </center>
</body>
</html>