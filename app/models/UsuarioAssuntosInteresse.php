<?php

class UsuarioAssuntosInteresse extends BaseModel
{
    protected $table = 'usuario_assuntos_interesse';

    public $timestamps = false;

    protected $guarded = array('id');

    protected $fillable = array('assunto');

    public static function listaAssuntos()
    {
        return static::orderBy('assunto', 'DESC')->get();
    }

}