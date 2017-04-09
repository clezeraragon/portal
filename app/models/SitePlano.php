<?php

class SitePlano extends BaseModel
{
    protected $table = 'site_plano';

    protected $guarded = array('id');

    protected $fillable = array('periodo_id', 'nome', 'descricao', 'valor', 'status');

    public static $rules = array(
        'periodo_id' => 'required|numeric',
        'nome' => 'required|min:2|max:100|unique:site_plano,nome', //RSO-002
        'descricao' => 'required',
        'valor' => '',
        'status' => 'required|numeric',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('site_periodo', 'site_plano.periodo_id', '=', 'site_periodo.id')->get(array(
            'site_plano.*', 'site_periodo.periodo as periodo'
        ));
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

    public static function getDiasPlano($id)
    {
        $plano = static::where('site_plano.id' , "=" , $id)
                ->join("site_periodo", "site_plano.periodo_id", "=", "site_periodo.id")
                ->get(array('qtd_dias'))->toArray();

        return $plano[0]['qtd_dias'];
    }

}