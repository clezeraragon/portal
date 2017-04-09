<?php
class LogCompartilha extends BaseModel
{

    protected $table = 'log_compartilha_pagina';

    protected $guarded = array();

    protected $fillable = array('from_nome', 'from_email', 'to_nome', 'to_email', 'link','mensagem','ip','user_agent');

    public static $rules = array(
        'from_nome' => 'required',
        'from_email' => 'required|email',
        'to_nome' => 'required',
        'to_email' => 'required|email',
        'link' => 'required',
        'mensagem' => 'required',
        'ip' => '',
        'user_agent' => ''

    );


}
