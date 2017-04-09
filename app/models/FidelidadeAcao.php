<?php

class FidelidadeAcao extends BaseModel
{
    protected $table = 'fid_acoes';

    protected $guarded = array('id');

    public static $rules = array(
        'nome' => 'required|min:5|max:100|unique:fid_acoes,nome',
        'pontos' => 'required|numeric',
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

    public static function getPontosByAcaoId($acao_id)
    {
        return static::find($acao_id);

    }

    public static function combobox()
    {
        $result = static::orderBy('nome')->lists('nome', 'id');

        return array('' => 'Selecione uma ação') + $result;
    }
}