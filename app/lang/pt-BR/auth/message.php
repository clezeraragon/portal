<?php
/**
* Language file for auth error messages
*
*/

return array(

    'account_already_exists' => 'Já existe uma conta com este e-mail.',
    'account_not_found'      => 'Email ou senha está incorreta.',
    'account_error_token'    => 'O link que você acessou está inativo.<strong>Para resetar a sua senha acesse o última solicitação enviada por e-mail.</strong>
                                 <div style="padding-left: 38px;">Este e-mail dará acesso a uma página para redefinição de sua senha.</div>',
    'account_not_activated'  => 'Esta conta de usuário não está ativada.',
    'account_suspended'      => 'Conta de usuário suspensa por causa de muitas tentativas de login. Tente novamente mais tarde.',
    'account_banned'         => 'Esta conta de usuário foi banido.',

    'signin' => array(
        'error'   => 'Houve um problema ao tentar iniciar a sessão, por favor, tente novamente.',
        'success' => 'Login efetuado com sucesso!',
    ),

    'signup' => array(
        'error'   => 'Houve um problema ao tentar criar a sua conta, por favor, tente novamente.',
        'success' => 'Sua conta foi criada, para ativá-la acesse seu e-mail e clique no link da mensagem.',
    ),

    'forgot-password' => array(
        'error'   => 'Houve um problema ao tentar obter um código de redefinição de senha, por favor, tente novamente.',
        'success' => 'Se o e-mail informado está cadastrado no iSonhei, a senha de recuperação foi enviada com sucesso.',
    ),

    'forgot-password-confirm' => array(
        'error'   => 'Houve um problema ao tentar redefinir sua senha, por favor, tente novamente.',
        'success' => 'Sua senha foi redefinida com êxito.',
    ),

    'activate' => array(
        'error'   => 'Houve um problema ao tentar ativar sua conta, por favor, tente novamente.',
        'success' => 'Sua conta foi ativada!',
        'info' => 'Sua ativação já foi realizada anteriormente obrigado! ' . '<span class="glyphicon glyphicon-thumbs-up">' . '</span>'
    ),

    'logout' => array(
        'success' => 'Você se desconectou com êxito!',
    ),
    'ativator' => array(
        'success' => 'Se o e-mail informado está cadastrado no iSonhei e ainda não foi ativado, o e-mail de ativação foi enviado com sucesso.',
    ),

    "acl" => array(
        "without_access" => "Voce não possui <b>Permissão</b> para acessar essa funcionalidade."
    )

);
