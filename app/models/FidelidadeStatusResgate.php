<?php

class FidelidadeStatusResgate extends BaseModel
{
    protected $table = 'fid_status_resgate';

    protected $guarded = array('id');

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');

        return array('' => 'Selecione um Status') + $result;
    }
}