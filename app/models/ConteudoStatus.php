<?php

class ConteudoStatus extends BaseModel
{
    protected $table = 'conteudo_status';

    public $timestamps = false;

    protected $guarded = array('id');

    protected $fillable = array('status');

    public static $rules = array(
        'status' => 'required|min:3|max:100'
    );

    public static function options()
    {
        $result = static::orderBy('status')->lists('status', 'id');
        return array('' => 'Selecione um status') + $result;
    }

}