<?php

class Conteudo extends BaseModel
{
    protected $table = 'conteudo';

    protected $guarded = array('id');

    protected $fillable = array('categoria_id', 'status_id', 'titulo', 'introducao', 'conteudo', 'path_img','nome_img', 'url', 'titulo_pag', 'descricao_pag','palavras_pag');

    public static $rules = array(
        'categoria_id' => 'required|alpha_num',
        'status_id' => 'required|alpha_num',
        'titulo' => 'required|min:5|max:255',
        'introducao' => 'required|min:10|max:180', //limite home
        'conteudo' => 'required|min:100',
        'path_img' => 'required', //RCO-009
        'url' => 'required|alpha_dash|min:5|max:150|unique:conteudo,url', //RCO-007
        'titulo_pag' => 'required|min:5|max:100|unique:conteudo,titulo_pag', //RCO-012
        'descricao_pag' => 'required|min:5|max:255',
        'palavras_pag' => 'required|min:5|max:255',
        'nome_img' => 'required'
    );

    //RCO-013
    public $dir_model_img = "conteudo/destaque/";

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('conteudo_categoria as cc' , 'conteudo.categoria_id', '=' , 'cc.id')
                    ->join('conteudo_status as cs' , 'conteudo.status_id' , '=' , 'cs.id')->get(
                         array('conteudo.id', 'conteudo.titulo', 'conteudo.introducao', 'conteudo.url', 'cc.categoria as categoria', 'cs.status as status',
                                 'conteudo.url', 'conteudo.updated_at')
                        );
    }

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        //Quando for update, permite ter o mesmo nome de perfil, desde que seja o mesmo id
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['titulo_pag'] .= ",$id";
            self::$rules['url'] = "";

            self::$rules['path_img'] = "";
            self::$rules['nome_img'] = "";
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Seleciona lista de conteudos pela URL de sua categoria
     * @param $url - categoria pai ou filha
     * @return mixed
     */
    public function getConteudosByUrlCategoria($url)
    {
        return $this->join('conteudo_categoria as cc', 'conteudo.categoria_id', '=', 'cc.id')
                    ->where('cc.url', '=', $url)
                    ->orderBy("created_at", "DESC")
                    ->where('conteudo.status_id' , '=' , 2); //RCO-015
    }

    /**
     * Seleciona Dados do conteudo pela sua url
     * @param $url - do conteudo
     * @return mixed
     */
    public function getConteudoByUrl($url, $preview = 0)
    {
        $conteudo = $this;

        if(!$preview){
            $conteudo = $conteudo->where('conteudo.status_id' , '=' , 2); //RCO-015
        }

        $conteudo = $conteudo->join('conteudo_categoria as ccf' , 'conteudo.categoria_id', '=' , 'ccf.id')
            ->leftJoin('conteudo_categoria as ccp' , 'ccf.categoria_pai_id', '=' , 'ccp.id')
            ->where('conteudo.url' , '=' , $url)
            ->get(array('conteudo.*', 'ccf.categoria as categoria_nivel1', 'ccf.url as categoria_nivel1_url', 'ccp.categoria as categoria_nivel2', 'ccp.url as categoria_nivel2_url'))
            ->toArray();

        if(isset($conteudo[0])){
            return $conteudo[0];
        }
        else{
            return false;
        }
    }

    /**
     * Seleciona conteudos relacionado
     * @param $categoria_id - id da categoria
     * @param $not_id - id do conteudo que será negado
     * @return mixed
     * RCO-014
     */
    public function getConteudosRelacionadoByCategoria($categoria_id, $not_id)
    {
        return $conteudos = $this->where('conteudo.categoria_id' , '=' , $categoria_id)
            ->where('conteudo.id' , '!=' , $not_id)
            ->where('conteudo.status_id' , '=' , 2) //RCO-015
            ->orderBy('created_at', 'desc')->take(3)
            ->get(array('conteudo.id','conteudo.titulo','conteudo.path_img', 'conteudo.url','conteudo.nome_img' ))
            ->toArray();
    }

    public function getConteudoByBusca($string)
    {
        return $this->join('conteudo_categoria as cc', 'conteudo.categoria_id', '=', 'cc.id')
            ->where('conteudo.titulo', 'like', '%' . $string . "%")
            ->orWhere('conteudo.conteudo', 'like', '%' . $string . "%")
            ->where('conteudo.status_id' , '=' , 2); //RCO-015
    }

    public function getConteudoVinculado($id,$status = null)
    {
        if ($status == 1) {
            $result = $this->where('id', '=', $id)->first();

            if (isset($result->id)) {
                $cmsblocoMateria = CmsBlocoMateria::where('conteudo_id', '=', $result->id)->first();
            }

            if (isset($cmsblocoMateria['conteudo_id'])) {
                $cmsBloco = CmsBloco::where('id', '=', $cmsblocoMateria->bloco_id)->first();
                return array('nome' => $cmsBloco['nome'], 'rota' => route('Cms-edit-materia', $cmsBloco->id));
            } else {
                return false;
            }
        }
    }

}