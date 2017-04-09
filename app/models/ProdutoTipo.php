<?php

class ProdutoTipo extends BaseModel
{
    protected $table = 'produto_tipo';

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');
        return array('' => 'Selecione um tipo de produto') + $result;
    }
}