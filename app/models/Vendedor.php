<?php

class Vendedor extends BaseModel
{
    protected $table = 'vendedor';

    protected $guarded = array('id');

    public static $rules = array(
        'nome' => 'required|max:255|unique:vendedor,nome',
        'status' => 'required',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->all();
    }

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);

        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');

        return array('' => 'Selecione um Vendedor') + $result;
    }
}