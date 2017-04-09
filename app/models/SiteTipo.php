<?php

class SiteTipo extends BaseModel
{
    protected $table = 'site_tipo';

    protected $guarded = array('id');

    protected $fillable = array('nome', 'status');

    public static $rules = array(
        'nome' => 'required|min:2|max:100|unique:site_tipo,nome', //RSO-003
        'status' => 'required|numeric',
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
            self::$rules['nome'] .= ",$id";
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

        return array('' => 'Selecione uma opção') + $result;
    }

}