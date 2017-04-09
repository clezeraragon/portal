<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 19/05/2015
 * Time: 16:50
 */
use Cartalyst\Sentry;

class LogBusca extends BaseModel
{

    protected $table = 'log_busca';

    protected $fillable = array('user_id', 'string', 'qtd_conteudo', 'qtd_produto', 'qtd_guia', 'ip', 'user_agent');

    public function getGrid()
    {
        return $this->all();
    }

    public function savarLogBusca($string, $qtd_conteudo, $qtd_produto, $qtd_guia)
    {
        if (\Sentry::check()) {
            $user_id = \Sentry::getUser()->id;
        } else {
            $user_id = null;
        }

        $this->create(array(
            "user_id" => $user_id,
            'string' => $string,
            'qtd_conteudo' => $qtd_conteudo,
            'qtd_produto' => $qtd_produto,
            'qtd_guia' => $qtd_guia,
            "ip" => Request::getClientIp(),
            "user_agent" => $_SERVER['HTTP_USER_AGENT']
        ));
    }

}