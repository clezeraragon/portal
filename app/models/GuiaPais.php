<?php

class GuiaPais extends BaseModel
{
    protected $table = 'guia_pais';

    protected $guarded = array('id');

    protected $fillable = array('nome', 'status');

    public static $rules = array(
        'nome' => 'required|min:2|max:100|unique:guia_pais,nome',
        'status' => 'required|numeric',
    );

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');

        return array('' => 'Selecione um País') + $result;
    }
}