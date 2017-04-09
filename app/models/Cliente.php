<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 24/10/2014
 * Time: 17:05
 */
class Cliente extends BaseModel
{
    protected $table = 'cliente';
    protected $guarded = array('id');
    protected $fillable = ['nm_razao_social', 'nm_nome_fantasia', 'nm_cnpj', 'nm_cpf', 'nm_site', 'nm_responsavel', 'nm_email_responsavel', 'nm_email_administrativo', 'nm_telefone1', 'nm_telefone2'
        , 'nm_cep', 'nm_endereco', 'nu_numero', 'nm_complemento', 'nm_bairro', 'nm_cidade', 'nm_uf', 'st_google_maps', 'txt_descricao', 'path_img', 'nm_link_facebook', 'nm_link_instagram', 'nm_link_twitter',
        'url', 'status', 'vendedor_id'];

    public static $rules = array(

        'vendedor_id' => 'numeric',
        'nm_razao_social' => 'required|min:5|unique:cliente,nm_razao_social', //RCL-001
        'nm_cnpj' => 'unique:cliente,nm_cnpj', //RCL-003
        'nm_cpf' => 'unique:cliente,nm_cpf', //RCL-002
        'nm_email_responsavel' => 'required',
        'nm_endereco' => 'required|min:5', //RCL-004
        'nu_numero' => 'required|numeric', //RCL-004
        'path_img' => 'unique:cliente,path_img', //RCL-005
        'status' => 'required|numeric',
        'st_google_maps' => 'required',
        'nm_site' => 'url',
        'nm_link_facebook' => 'url',
        'nm_link_instagram' => 'url',
        'nm_link_twitter' => 'url',
        'url' => 'required|unique:cliente,url'
    );

    public $dir_model_img = "cliente/logo/";


    public function clientes()
    {

//          return $this->belongsTo('Clientetipo','cliente_tipo_id');
//          return $this->hasMany('Cliente','id');
    }

    public static function validate($data)
    {
        if (Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
//            self::$rules['path_img'] .= ",$id";
            self::$rules['nm_razao_social'] .= ",$id";
            self::$rules['nm_cnpj'] .= ",$id";
            self::$rules['nm_cpf'] .= ",$id";

            self::$rules['url'] = "";

            if (!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
        }
//        dd(self::$rules);
        return Validator::make($data, self::$rules);
    }

    /**
     * Combobox
     * @return array
     */
    public static function combobox()
    {
        $result = static::orderBy('nm_nome_fantasia')->where('status', '=', 1)->lists('nm_nome_fantasia', 'id');

        return array('' => 'Selecione uma opção') + $result;
    }

    /**
     * ComboBox de clientes para a edição do Guia anuncio, caso o clientes esteja inativado.
     * Seleciona todos os clientes ativos e o cliente que for passado como parametro independente do status.
     */
    public static function comboboxAll($cliente_id)
    {
        $result = static::orderBy('nm_nome_fantasia')->where('status', '=', 1)->orWhere('id', '=', $cliente_id)->lists('nm_nome_fantasia', 'id');

        return array('' => 'Selecione uma opção') + $result;
    }


    public static function getTelefoneMetrica($id)
    {
        $dados = static::where("id", "=", $id )->get(array("nm_telefone1" , "nm_telefone2"))->toArray();

        $return = null;

        if(isset($dados[0]["nm_telefone1"])){
            $return = $dados[0]["nm_telefone1"];
        }

        if(isset($dados[0]["nm_telefone2"])){
            $return .= " | " . $dados[0]["nm_telefone2"];
        }

        return $return;
    }

    public static function getEnderecoMetrica($id)
    {
        $dados = static::where("id", "=", $id )->get(array("nm_endereco" , "nu_numero", "nm_complemento", "nm_bairro", "nm_cidade", "nm_uf"))->toArray();

        $return = null;

        if(isset($dados[0]["nm_endereco"])){
            $return = $dados[0]["nm_endereco"];
        }
        if(isset($dados[0]["nu_numero"])){
            $return .= ", " . $dados[0]["nu_numero"];
        }
        if(isset($dados[0]["nm_complemento"])){
            $return .= " - " . $dados[0]["nm_complemento"];
        }
        if(isset($dados[0]["nm_bairro"])){
            $return .= " - " . $dados[0]["nm_bairro"];
        }
        if(isset($dados[0]["nm_cidade"])){
            $return .= " - " . $dados[0]["nm_cidade"];
        }
        if(isset($dados[0]["nm_uf"])){
            $return .= " - " . $dados[0]["nm_uf"];
        }

        return $return;

    }

    public static function getSiteMetrica($id)
    {
        $dados = static::where("id", "=", $id )->get(array("nm_site"))->toArray();

        $return = null;

        if(isset($dados[0]["nm_site"])){
            $return = $dados[0]["nm_site"];
        }

        return $return;
    }

    public static function getEmailByGuiaId($id)
    {
        $dados = null;
        $dados = static::where("guia_empresa.id", "=", $id)
            ->join("guia_empresa", "guia_empresa.cliente_id", "=", "cliente.id")
            ->get(array("nm_email_responsavel", "nm_nome_fantasia"))->toArray();

        if (isset($dados)) {
            return $dados;
        }
    }
    public static function getCliente($id)
    {

        $cliente = Cliente::find($id);
        $cliente = $cliente->nm_nome_fantasia;
        return $cliente;
    }

    public function relatorioClientesGuia()
    {
        $dados = $this->leftjoin("guia_empresa", "guia_empresa.cliente_id", "=", "cliente.id")
                        ->leftjoin("guia_cidade", 'guia_empresa.cidade_id', '=', 'guia_cidade.id')
                        ->leftjoin("guia_categoria", 'guia_empresa.categoria_id', '=', 'guia_categoria.id')
                        ->leftjoin("guia_plano", 'guia_empresa.plano_id', '=', 'guia_plano.id')
                        ->orderBy("cliente.id", "DESC")
                        ->get(array("cliente.*", "guia_empresa.dt_ini as dt_ini_veiculacao", "guia_empresa.dt_fim as dt_fim_veiculacao", "guia_empresa.url as url_anuncio", "guia_empresa.texto as texto_resumo",
                                    "guia_empresa.descricao as texto_descricao", "guia_empresa.status as anuncio_status", "guia_empresa.updated_at as anuncio_updated_at", "guia_empresa.id as guia_empresa_id",
                                    "guia_empresa.tipo_negociacao as tipo_negociacao", "guia_empresa.observacoes as opcionais_observacoes", "guia_cidade.nome as cidade", "guia_categoria.nome as categoria",
                                    "guia_plano.nome as plano"));

        return $dados;
    }
}