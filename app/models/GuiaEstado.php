<?php

class GuiaEstado extends BaseModel
{
    protected $table = 'guia_estado';

    protected $guarded = array('id');

    protected $fillable = array('pais_id', 'nome', 'uf', 'status');

    public static $rules = array(
        'pais_id' => 'required|numeric',
        'nome' => 'required|min:2|max:100|unique:guia_pais,nome',
        'uf' => 'required|alpha|min:2|max:2',
        'status' => 'required|numeric',
    );

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');

        return array('' => 'Selecione um Estado') + $result;
    }

}