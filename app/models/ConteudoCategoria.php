<?php

class ConteudoCategoria extends BaseModel
{
    protected $table = 'conteudo_categoria';

    protected $guarded = array('id');

    protected $fillable = array('status', 'categoria_pai_id', 'categoria', 'url', 'descricao', 'titulo_pag', 'descricao_pag','palavras_pag', 'tipo_categoria');

    public static $rules = array(
        'status' => 'required|numeric',
        'categoria_pai_id' => 'numeric',
        'categoria' => 'required|min:5|max:100|unique:conteudo_categoria,categoria', //RCO-001
        'url' => 'required|alpha_dash|min:5|max:150|unique:conteudo_categoria,url', //RCO-002
        'descricao' => 'required',
        'titulo_pag' => 'required|min:5|max:100|unique:conteudo_categoria,titulo_pag', //RCO-003
        'descricao_pag' => 'required|min:100|max:160',
        'palavras_pag' => 'required|max:255',
        'tipo_categoria' => 'required',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->leftJoin('conteudo_categoria as cc' , 'conteudo_categoria.categoria_pai_id', '=' , 'cc.id')->get(
            array('conteudo_categoria.id', 'conteudo_categoria.status', 'conteudo_categoria.categoria', 'conteudo_categoria.url', 'conteudo_categoria.descricao',
                'conteudo_categoria.tipo_categoria', 'conteudo_categoria.updated_at', 'cc.categoria as categoria_pai')
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
            self::$rules['categoria'] .= ",$id";
            self::$rules['titulo_pag'] .= ",$id";

            self::$rules['url'] = ''; // RCO-005
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Combobox de categoria pai que não seja ele mesmo
     * @param null $notid
     * @return array
     */
    public static function options($notid = null)
    {
        $result = static::orderBy('categoria')->where('tipo_categoria' , "=" , "Pai");
        if($notid){
            $result = $result->where('id' , '!=' , $notid);
        }
        $result = $result->lists('categoria', 'id');

        return array('' => 'Selecione uma opção') + $result;
    }

    /**
     * Combobox de categorias ativa
     * @return array
     */
    public static function comboConteudo()
    {
        $result = static::orderBy('categoria')->where('status' , "=" , 1)->lists('categoria', 'id');

        return array('' => 'Selecione uma categoria') + $result;
    }

    /**
     * Menu
     * @return array
     */
    public static function getMenuCategorias(){

        $menu_itens = array();

        $categorias = static::where('conteudo_categoria.status', '=', '1')
                            ->leftJoin('conteudo_categoria as cc' , 'conteudo_categoria.categoria_pai_id', '=' , 'cc.id')
                            ->get(array('conteudo_categoria.*', 'cc.categoria as categoria_pai', 'cc.url as url_pai'));
        //dd($categorias);

        foreach($categorias as $categoria)
        {
            if(!isset($categoria->categoria_pai_id)) {
                $menu_itens[$categoria->id]['url']   = "categoria/" . $categoria->url;
                $menu_itens[$categoria->id]['nome']  = $categoria->categoria;
            }
            else{
                $menu_itens[$categoria->categoria_pai_id]['itens'][$categoria->id]['url']  = "categoria/" . $categoria->url_pai . "/" . $categoria->url;
                $menu_itens[$categoria->categoria_pai_id]['itens'][$categoria->id]['nome'] = $categoria->categoria;
            }
        }
        //dd($menu_itens);

        return $menu_itens;
    }

    public static function getMenuInspiracoes()
    {
        $categorias = static::where('conteudo_categoria.status', '=', '1')
            ->where('cat_pai.url', '=', "inspiracoes")
            ->join('conteudo_categoria as cat_pai' , 'conteudo_categoria.categoria_pai_id', '=' , 'cat_pai.id')
            ->orderBy("conteudo_categoria.categoria", "ASC")
            ->get(array('cat_pai.url as url_pai', 'conteudo_categoria.url', 'conteudo_categoria.categoria as nome'));
//        dd($categorias);

        return $categorias;
    }

    public static function getDadosCategoriaByUrl($pai, $filha = null)
    {
        if($filha){
            $categorias = static::where('conteudo_categoria.url', '=', $filha)->where('cc.url', '=', $pai);
        }
        else{
            $categorias = static::where('conteudo_categoria.url', '=', $pai);
        }

        $categorias = $categorias->leftJoin('conteudo_categoria as cc' , 'conteudo_categoria.categoria_pai_id', '=' , 'cc.id')
            ->get(array('conteudo_categoria.*', 'cc.categoria as categoria_pai', 'cc.url as url_pai'))
            ->toArray();

        if(isset($categorias[0])){
            return $categorias[0];
        }
        else{
            return false;
        }
    }
}