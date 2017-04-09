<?php

class GuiaPlano extends BaseModel
{
    protected $table = 'guia_plano';

    protected $guarded = array('id');

    protected $fillable = array('nome', 'qtd_imagem', 'qtd_video', 'ordem', 'limite', 'cor', 'status');

    public static $rules = array(
        'nome' => 'required|min:2|max:100|unique:guia_plano,nome', //RGE-007
        'qtd_imagem' => 'required|numeric|min:1|max:99',
        'qtd_video' => 'required|numeric|min:1|max:99',
        'ordem' => 'required|numeric|min:1|max:99|unique:guia_plano,ordem', //RGE-008
        'limite' => 'required|numeric',
        'cor' => 'required',
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
            self::$rules['ordem'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nome')->where('status', '=', 1)->lists('nome', 'id');

        return array('' => 'Selecione uma opção') + $result;
    }

    public function getConfigPlano($plano)
    {
        $config = array();
        $dados = $this->find($plano)->toArray();

        $config['qtd_imagem'] = $dados['qtd_imagem'];
        $config['qtd_video']  = $dados['qtd_video'];

        return $config;

    }

    /**
     * Verifica limite de cadastros no plano selecionado
     * @param $plano_id
     * @param null $guia_id - parametro quando é update
     * @return mixed
     * RGE-010
     */
    public function checkLimitePlano($plano_id, $guia_id = null)
    {
        $limitePlano = $this->getLimitePlano($plano_id);
        $qtdEmpOnPlano = $this->getEmpOnPlano($plano_id, $guia_id);

        return ($limitePlano - $qtdEmpOnPlano);
    }

    /**
     * Seleciona o limite cadastro para o Plano
     * @param $plano_id
     * @return mixed
     */
    public function getLimitePlano($plano_id)
    {
        $rsLimite = $this->where('id', '=', $plano_id)->get(array('limite'))->toArray();
        return $rsLimite[0]['limite'];
    }

    /**
     * Pega o número de empresas vinculadas ao plano
     * @param $plano_id
     * @return int qtd empresas
     */
    public function getEmpOnPlano($plano_id, $guia_id = null)
    {
        $guiaEmpresa = new GuiaEmpresa();
        $rs = $guiaEmpresa->where('plano_id', '=', $plano_id);

        if($guia_id){
            $rs->where('id', '!=', $guia_id);
        }

        return $rs->count();
    }
}