<?php

class GuiaCidade extends BaseModel
{
    protected $table = 'guia_cidade';

    protected $guarded = array('id');

    protected $fillable = array('estado_id', 'nome', 'url', 'ordem', 'status');

    public static $rules = array(
        'estado_id' => 'required|numeric',
        'nome' => 'required|min:5|max:100|unique:guia_cidade,nome', //RGE-005
        'url' => 'required|alpha_dash|min:5|max:100|unique:guia_cidade,url', //RGE-016
        //'ordem' => 'required|numeric|min:1|max:99|unique:guia_cidade,ordem', //RGE-006
        'status' => 'required|numeric',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join("guia_estado", "guia_cidade.estado_id", "=", "guia_estado.id")
            ->get(array("guia_estado.nome as estado", "guia_cidade.*"));
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
            self::$rules['url'] = "";
            //self::$rules['ordem'] .= ",$id";
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

        return array('' => 'Selecione uma Cidade') + $result;
    }

    public static function comboboxPortal()
    {
        $result = static::join('guia_estado','guia_cidade.estado_id','=','guia_estado.id')
            ->where('guia_cidade.status', '=', 1)
            ->groupBy('guia_cidade.nome')
            ->orderBy('guia_estado.nome')
            ->orderBy('guia_cidade.nome')
            ->select('guia_cidade.nome AS cidade','guia_estado.nome AS estado','guia_cidade.url','guia_cidade.id')->get();

        $group = [];
        foreach ($result as $resultado)
        {

            if (!isset($group[$resultado->estado]))
            {
                $group[$resultado->estado] = [];
            }
            $group[$resultado->estado][$resultado->url] = $resultado->cidade;
        }

        return array('todas-cidades' => 'Todas as Cidades') + $group;
    }


    public function getCidadeByUrl($url)
    {
        $dados = $this->where('url', '=', $url)->get();
        if(isset($dados[0])){

            return $dados[0];
        }
        else{
            return false;
        }
    }

}