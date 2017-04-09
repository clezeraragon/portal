<?php

class GuiaCategoria extends BaseModel
{
    protected $table = 'guia_categoria';

    protected $guarded = array('id');

    protected $fillable = array('nome', 'descricao', 'url', 'ordem', 'path_img', 'status');

    public static $rules = array(
        'nome' => 'required|min:5|max:40|unique:guia_categoria,nome', //RGE-001 RGE-018
        'descricao' => 'required|min:10',
        'url' => 'required|alpha_dash|min:5|max:100|unique:guia_categoria,url', //RGE-015
        //'ordem' => 'required|numeric|min:1|max:99|unique:guia_categoria,ordem', //RGE-002
        'path_img' => 'required|unique:guia_categoria,path_img', //RGE-003
        'status' => 'required|numeric',
    );

    //RGE-004
    public $dir_model_img = "guia/categoria/";

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
            self::$rules['url'] = "";
            //self::$rules['ordem'] .= ",$id";

            if(!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
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

        return array('' => 'Selecione uma Categoria') + $result;
    }

    public static function comboboxPortal()
    {
        $result = static::orderBy('nome')->where('status', '=', 1)->lists('nome', 'url');

        return array('todas-categorias' => 'Todas as Categorias') + $result;
    }

    public static function getCategorias()
    {
        return static::orderBy('nome')->where('status', '=', 1)->get()->toArray();
    }

    public function getCategoriaByUrl($url)
    {
        $dados = $this->where('url', '=', $url)->get();
        if(isset($dados[0])){

            return $dados[0];
        }
        else{
            return false;
        }
    }
    public static function getCategoriaById($id)
    {
        $dados = static::where('id', '=', $id)
            ->select("nome")
            ->get();
        if(isset($dados[0]["nome"])){

            return $dados[0]["nome"];
        }
        else{
            return false;
        }
    }
}