<?php

class UsuarioConvidado extends BaseModel
{
    protected $table = 'usuario_convidado';

    protected $guarded = array('id');

    public static $rules = array(
        'from_user_id' => 'required|numeric',
        'nome' => 'required|max:255',
        'email' => 'required|email|max:255',
        'mensagem' => ''
    );
}