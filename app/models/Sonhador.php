<?php

class Sonhador extends BaseModel
{
    protected $table = 'site';

    protected $guarded = array('id');

    public static $rules = array(
        "user_id" => "required|numeric",
        "tipo_id" => "required|numeric",
        "plano_id" => "required|numeric",
        "layout_id" => "required|numeric",
        "dt_ini_veiculacao" => "required",
        "dt_fim_veiculacao" => "required",
        "endereco" => "max:255",
        "numero" => "max:10",
        "cidade" => "max:100",
        "cor_fundo" => "required",
        "titulo_site" => "required|max:50", //RSO-019
        "path_img_topo" => "",
        "titulo2" => "required|max:100",
        "texto2" => "required",
        "titulo3" => "required|max:100",
        "titulo4" => "required|max:100",
        "titulo5" => "required|max:100",
        "texto5" => "required",
        "titulo6" => "required|max:100",
        "texto6" => "required",
        "status" => "required|numeric",
        "st_busca" => "required|numeric"
    );

    protected  $dir_store_img = "/sonhador/";
    public $dir_model_img = "site/";

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('users', 'site.user_id', '=', 'users.id')
                    ->join('site_plano', 'site.plano_id', '=', 'site_plano.id')
                    ->get(array('users.first_name','users.last_name','users.cpf', 'site_plano.nome as plano', 'site.*'));
    }

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if (Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['dt_ini_veiculacao'] = "";
            self::$rules['dt_fim_veiculacao'] = "";
            self::$rules['user_id'] = "";
            self::$rules['plano_id'] = "";
            self::$rules['layout_id'] = "";
            self::$rules['tipo_id'] = "";
        }

        return Validator::make($data, self::$rules);
    }

    public static function validateImage($data)
    {
        return Validator::make($data, array('path_img_topo' => 'image|max:2000'));
    }

    public static function completaInput($input)
    {
        $qtd_dias_plano = SitePlano::getDiasPlano($input['plano_id']);

        $input['user_id'] = Sentry::getUser()->id;
        $input['layout_id'] = 1;
        $input['dt_ini_veiculacao'] = date("Y-m-d");
        $input['dt_fim_veiculacao'] = date('Y-m-d', strtotime("+$qtd_dias_plano days"));

        //Dados Padrão Inicial
        $input['endereco'] = "";
        $input['numero'] = "";
        $input['cidade'] = "";
        $input['cor_fundo'] = "0081A8";
        $input['path_img_topo'] = "/sonhador/site/header_sonhador.jpg";
        $input['titulo2'] = "Sua História";
        $input['texto2'] = "Bem-vindo ao seu site. Descreva aqui o seu sonho ou sua história.";
        $input['titulo3'] = "Galeria de Fotos";
        $input['titulo4'] = "Lista de Presentes";
        $input['titulo5'] = "Mural de Recados";
        $input['texto5'] = "Crie um texto para incentivar os visitantes do seu site a deixar um recado.";
        $input['titulo6'] = "Informações Gerais";
        $input['texto6'] = "Insira aqui as informações complementares, como data, local, horário, padrão de trajes,de um evento, etc.";
        $input['status'] = 1;
        $input['st_busca'] = 1;

        return $input;
    }

    public function setDirModelImg($siteid)
    {
        $this->dir_model_img = $this->dir_model_img . $siteid . "/topo/";
    }

    /**
     * @param $id
     * @param $construtor boolean se a config é para a pagina do construtor
     * @return bool
     */
    public static function getConfigSite($id, $construtor)
    {
        $config = static::where("site.id", "=", $id)
            ->join("site_layout", "site.layout_id", "=", "site_layout.id");

        if (!$construtor) {
            $config = $config->where("site.dt_fim_veiculacao", ">=", date("Y-m-d"))
                            ->where("site.status", "=", 1); //RSO-009
            if (isset(Sentry::getUser()->id)) {
                $config = $config->orWhere("site.user_id", "=", Sentry::getUser()->id);
            }
        }

        $config = $config->get(array("site.*", "site_layout.path as path_layout"))->toArray();

        if (isset($config[0])) {
            return $config[0];
        }
        return false;
    }

    public function getSitesByUser($user_id)
    {
        $sites = static::where("site.user_id", "=", $user_id)->get();
        return $sites;
    }

    public function getGridSitesByUser($user_id)
    {
        $sites = $this->where("site.user_id", "=", $user_id)
            ->get(array("site.id", "site.titulo_site", "site.dt_ini_veiculacao", "site.dt_fim_veiculacao"));

        return $sites;
    }

    public static function getPermissionEdit($user_id)
    {
        if (isset(Sentry::getUser()->id)) {
            if (Sentry::getUser()->id == $user_id) {
                return true;
            }
        }

        return false;
    }

    public static function getSiteIdByCodTransacaoPag($codtransacao)
    {
        $dados = static::where("cota_pagamento.ps_cod_transacao", "=", $codtransacao)
            ->join("site_cota", "site_cota.site_id", "=", "site.id")
            ->join("cota_pedido", "cota_pedido.cota_id", "=", "site_cota.id")
            ->join("cota_pagamento", "cota_pagamento.cota_pedido_id", "=", "cota_pedido.id")
            ->get(array("site.id as id"))->toArray();

        if (isset($dados[0])) {
            return $dados[0]['id'];
        }
        return false;
    }

    public function getSiteOwner($siteid)
    {
        $dados = $this->where('id', '=', $siteid)->get(array("site.user_id"))->toArray();

        if (isset($dados[0])) {
            return $dados[0]['user_id'];
        }
        return false;
    }


}