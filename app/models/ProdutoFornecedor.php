<?php

class ProdutoFornecedor extends BaseModel
{
    protected $table = 'produto_fornecedor';

    protected $guarded = array('id');

    public static $rules = array(
        'nome_fantasia' => 'required|unique:produto_fornecedor,nome_fantasia',
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
            self::$rules['nome_fantasia'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome_fantasia')->where('status', '=', 1)->lists('nome_fantasia', 'id');
        return array('' => 'Selecione um fornecedor') + $result;
    }
}