<?php

class Produto extends BaseModel
{
    protected $table = 'produto';

    protected $guarded = array('id');

    public static $rules = array(
        'nome' => 'required|min:5|max:100|unique:produto,nome',
        'url' => 'required|alpha_dash|max:255|unique:produto,url',
        'produto_tipo_id' => 'required|numeric',
        'fornecedor_id' => 'required|numeric',
        'descricao' => 'required',
        'valor' => 'required|numeric|min:1',
        'de_pontos' => 'numeric',
        'por_pontos' => 'required|numeric',
        'peso' => 'required|numeric',
        'comprimento' => 'required|numeric|min:16',
        'altura' => 'required|numeric|min:2',
        'largura' => 'required|numeric|min:11',
        'path_img' => 'required|unique:produto,path_img',
        'status' => 'required|numeric',
        'path_arquivo' => 'required|unique:produto,path_arquivo',
    );


    public $dir_model_img = "produto/";
    public $dir_model_arquivo = "/assets/download/produto-digital/";

    protected $arquivo;

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('produto_tipo' , 'produto.produto_tipo_id', '=' , 'produto_tipo.id')
                    ->join('produto_fornecedor' , 'produto.fornecedor_id', '=' , 'produto_fornecedor.id')
                    ->leftjoin('produto_estoque' , 'produto.id', '=' , 'produto_estoque.produto_id')
                    ->get(array('produto.*', 'produto_tipo.nome as tipo_produto', 'produto_fornecedor.nome_fantasia as fornecedor', 'produto_estoque.estoque'));
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
            self::$rules['path_img'] .= ",$id";
            self::$rules['path_arquivo'] .= ",$id";

            self::$rules['url'] = "";

            if(!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
            if(!isset($data['path_arquivo'])) {
                self::$rules['path_arquivo'] = "";
            }
        }

        //Produto fisico
        if($data['produto_tipo_id'] == 1){
            self::$rules['path_arquivo'] = "";
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
        return array('' => 'Selecione um produto') + $result;
    }

    public function getPrateleiraProdutos($campo = "created_at", $order = "ASC")
    {
        $com_estoque = DB::table("produto")
            ->select('produto.*', 'produto_estoque.estoque')
            ->where("status", "=", 1)
            ->where("produto_estoque.estoque", ">", 0)
            ->leftjoin('produto_estoque' , 'produto.id', '=' , 'produto_estoque.produto_id')
            ->orderBy("produto." . $campo, $order)
            ->get();
//        dd($com_estoque);

        $sem_estoque = DB::table("produto")
            ->select('produto.*', 'produto_estoque.estoque')
            ->where("status", "=", 1)
            ->where("produto_estoque.estoque", "=", 0)
            ->orWhere("produto_estoque.estoque", "=", null)
            ->leftjoin('produto_estoque' , 'produto.id', '=' , 'produto_estoque.produto_id')
            ->orderBy("produto." . $campo, $order)
            ->get();
//        dd($sem_estoque);

        $produtos = array_merge($com_estoque, $sem_estoque);
//        dd($produtos);

        return $produtos;
    }


    /*
     * Utilizado postProdutoResgate
     */
    public function getProdutoById($id)
    {
        $produto = $this->where("produto.status", "=", 1)
                    ->where("produto.id", "=", $id)
                    ->join('produto_fornecedor' , 'produto.fornecedor_id', '=' , 'produto_fornecedor.id')
                    ->leftjoin('produto_estoque' , 'produto.id', '=' , 'produto_estoque.produto_id')
                    ->get(array("produto.*", "produto_fornecedor.nome_fantasia as fornecedor", "produto_estoque.estoque"));
        if(isset($produto[0])){
            return $produto[0];
        }
    }

    public function getProdutoByUrl($url)
    {
        $produto = $this->where("produto.status", "=", 1)
            ->where("produto.url", "=", $url)
            ->join('produto_fornecedor' , 'produto.fornecedor_id', '=' , 'produto_fornecedor.id')
            ->leftjoin('produto_estoque' , 'produto.id', '=' , 'produto_estoque.produto_id')
            ->get(array("produto.*", "produto_fornecedor.nome_fantasia as fornecedor", "produto_estoque.estoque"));
        if(isset($produto[0])){
            return $produto[0];
        }
    }


    public function setArquivo($img)
    {
        $this->arquivo = $img;
    }

    public function getArquivoPath()
    {
        return $this->dir_model_arquivo . $this->arquivo->getClientOriginalName();
    }

    public function upload_arquivo($nm_arq)
    {
        $this->arquivo->move(public_path() . $this->dir_model_arquivo , $nm_arq);
    }
}