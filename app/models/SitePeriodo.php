<?php

class SitePeriodo extends BaseModel
{
    protected $table = 'site_periodo';

    protected $guarded = array('id');

    protected $fillable = array('periodo', 'qtd_dias');

    public static $rules = array(
        'periodo' => 'required|min:2|max:100|unique:site_periodo,periodo', //RSO-001
        'qtd_dias' => 'required|numeric',
    );

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('periodo')->lists('periodo', 'id');

        return array('' => 'Selecione uma opção') + $result;
    }

}