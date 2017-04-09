<?php

class Cupom extends BaseModel
{
    protected $table = 'cupom';

    protected $guarded = array('id');

    public $dir_model_img = "cupom/";

    public static $rules = array(
        'cliente_id' => 'required|numeric',
        'guia_empresa_id' => 'numeric',
        'titulo' => 'required|max:100',
        'regras' => 'required',
        'voucher' => 'required|max:50',
        'path_img' => 'unique:cupom,path_img',
        'descricao' => 'required',
        'quantidade' => 'required|numeric',
        'dt_ini' => 'required|date_format:Y-m-d',
        'dt_fim' => 'required|date_format:Y-m-d',
        'status' => 'required|numeric'
    );

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['path_img'] .= ",$id";

            if(!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
        }
        return Validator::make($data, self::$rules);
    }

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {

        return $this->leftjoin("cliente", 'cupom.cliente_id', '=', 'cliente.id')
                    ->leftjoin("guia_empresa", 'guia_empresa.id', '=', 'cupom.guia_empresa_id')
                    ->leftjoin("guia_categoria", "guia_empresa.categoria_id", "=", "guia_categoria.id")
                    ->leftjoin("guia_cidade", "guia_empresa.cidade_id", "=", "guia_cidade.id")
                    ->get(array("cliente.nm_nome_fantasia as cliente", "guia_categoria.nome as categoria", "guia_cidade.nome as guia_cidade", "cupom.*"));
    }

    /**
     * Pega todos os cupons
     * @route - lista-cupons-de-desconto
     * @return mixed
     */
    public function getCupons()
    {
        return $this->where("cupom.status", "=", 1)
            ->where("cupom.dt_fim", ">=", date("Y-m-d"))
            ->leftjoin("guia_empresa", 'cupom.guia_empresa_id', '=', 'guia_empresa.id')
            ->leftjoin("cliente", 'cupom.cliente_id', '=', 'cliente.id')
            ->orderByRaw("RAND()")
            ->select("cliente.nm_nome_fantasia as cliente", "cliente.path_img as path_img_cliente", "cupom.*", "guia_empresa.url")
            ->get();
    }

    /**
     * Pega todos os cupons da empresa
     * @param $url - route(lista-cupons-de-desconto-empresa)
     * @return mixed
     */
    public static function getCuponsEmpresa($url)
    {
        return static::where("cupom.status", "=", 1)->where('guia_empresa.url', $url)
            ->where("cupom.dt_fim", ">=", date("Y-m-d"))
            ->join("guia_empresa", 'guia_empresa.id', '=', 'cupom.guia_empresa_id')
            ->join("cliente", "guia_empresa.cliente_id", "=", "cliente.id")
            ->orderByRaw("RAND()")
            ->select("cliente.nm_nome_fantasia as cliente", "cliente.path_img as path_img_cliente", "cupom.*", "guia_empresa.url")
//            ->select( "guia_empresa.*")
            ->get();

    }

    /**
     * Contar quantidade de Anuncios por parametro
     * @param $id - id da empresa
     * @return number int
     */
    public static function getCountEmpresaAnuncio($id)
    {
        $result = static::where("cupom.status", "=", 1)->where('cupom.guia_empresa_id', $id)
            ->where("cupom.dt_fim", ">=", date("Y-m-d"))
            ->join("guia_empresa", 'guia_empresa.id', '=', 'cupom.guia_empresa_id')
            ->select("guia_empresa.url as url_empresa")
            ->groupBy('url_empresa')->get()->toArray();

        return count($result);

    }

    /**
     * Verifica regras e requisitos para liberar o cupom de desconto
     * @param $id - id do cupom - PK
     * @return array cod [0|1] - status da verificação e retorno mensagem no caso de cod 0  e objeto cupom no caso de cod 1
     */
    public function verificaRegrasDownloadByCupomId($id)
    {
        $cupom = $this->find($id);

        if (strtotime(date("Y-m-d")) <= strtotime($cupom->dt_fim)) {
            return array('cod' => 1, 'retorno' => $cupom);
        } else {
            return array('cod' => 0, 'retorno' => "Cupom inválido.");
        }

    }

    /**
     * Gera o HTML para converter para PDF
     * @param $id - id do cupom - PK
     * @return string - html do cupom para converter em PDF
     */
    public function getHtmlVoucher($cupom, $cliente)
    {
//        dd($cliente->id);

        if ($cupom->path_img) {
            $path_img_cliente = $cupom->path_img;
        } else {
            $path_img_cliente = $cliente->path_img;
        }

        return $content = View::make('portal.cupom.layout_voucher_portrait',
            array(
                "path_logo_cliente" => $path_img_cliente,
                "cupom_titulo" => $cupom->titulo,
                "cupom_dsc" => $cupom->descricao,
                "cupom_regras" => $cupom->regras,
                "cupom_voucher" => $cupom->voucher,
                "cupom_validade" => \Util::toView($cupom->dt_fim)
            )
        );

    }

}