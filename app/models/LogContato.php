<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 06/04/2015
 * Time: 15:17
 */

class LogContato extends BaseModel
{

    protected $table = 'log_form_contato';

    protected $guarded = array();

    protected $fillable = array('nome', 'email', 'telefone', 'assunto','mensagem','ip','user_agent');

    public static $rules = array(
        'nome' => 'required',
        'email' => 'required|email',
        'telefone' => 'required',
        'assunto' => 'required',
        'mensagem' => 'required',
        'ip' => '',
        'user_agent' => ''

    );

    public static function validate($data)
    {
        if (Request::getMethod() == 'PUT') {

        }
        return Validator::make($data, self::$rules);
    }

}
