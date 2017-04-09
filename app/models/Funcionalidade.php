<?php

class Funcionalidade extends BaseModel
{
    protected $table = 'usuario_funcionalidades';

    public $timestamps = false;

    protected $guarded = array('id');

    protected $fillable = array('funcionalidade','metodo', 'modulo');

    public function perfis()
    {
        return $this->belongsToMany('Perfil', 'usuario_funcionalidades_perfis', 'funcionalidade_id', 'perfil_id');
    }

    public static function options()
    {
        return static::where('id', '!=', '1')->orderBy('modulo', 'DESC')->get();
    }

}