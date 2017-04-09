<?php

class GuiaEmpresa extends BaseModel
{
    protected $table = 'guia_empresa';

    protected $guarded = array('id');

    protected $fillable = array('cliente_id', 'cidade_id', 'categoria_id', 'plano_id', 'foto_id', 'url', 'dt_ini', 'dt_fim', 'qtd_imagem', 'qtd_video', 'descricao', 'texto', 'tipo_negociacao',
                                'observacoes', 'email_responsavel_anuncio', 'status');

    public static $rules = array(
        'cliente_id' => 'required|numeric',
        'cidade_id' => 'required|numeric',
        'categoria_id' => 'required|numeric',
        'plano_id' => 'required|numeric',
        'url' => 'required|alpha_dash|max:100|unique:guia_empresa,url', //RGE-020
        'dt_ini' => 'required|date_format:"Y-m-d"',
        'dt_fim' => 'required|date_format:"Y-m-d"',
        'qtd_imagem' => 'required|numeric',
        'qtd_video' => 'required|numeric',
        'descricao' => 'required|min:5|max:160',
        'texto' => 'required|min:5',
        'tipo_negociacao' => 'required',
        'status' => 'required|numeric',
        'email_responsavel_anuncio' => 'email|max:255'
    );

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {
            self::$rules['cliente_id'] = "";
            self::$rules['cidade_id'] = "";
            self::$rules['categoria_id'] = "";
            self::$rules['plano_id'] = "";
            self::$rules['url'] = "";
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join("cliente", 'guia_empresa.cliente_id', '=', 'cliente.id')
                    ->join("guia_cidade", 'guia_empresa.cidade_id', '=', 'guia_cidade.id')
                    ->join("guia_categoria", 'guia_empresa.categoria_id', '=', 'guia_categoria.id')
                    ->join("guia_plano", 'guia_empresa.plano_id', '=', 'guia_plano.id')
                    ->get(array(
                        'cliente.nm_nome_fantasia as nome_fantasia', 'guia_cidade.nome as cidade', 'guia_categoria.nome as categoria', 'guia_plano.nome as plano',
                        'guia_empresa.*'
                    ));
    }

    /**
     * verifica se já existe um registro com os campos de negocios
     * Regra: só pode um cadastro por cliente, região, categoria e plano
     *
     * @param $input
     * @return mixed
     * RGE-009
     */
    public function hasDuplicate($input, $id = null)
    {
        $result = $this->where('cliente_id' , '=' , $input['cliente_id'])
                        ->where('cidade_id' , '=' , $input['cidade_id'])
                        ->where('categoria_id' , '=' , $input['categoria_id'])
                        ->where('plano_id' , '=' , $input['plano_id']);

        if($id){
            $result = $result->where('id' , '!=' , $id);
        }

        $result = $result->get(array('id'))->toArray();

        if(isset($result[0]['id'])){
            return true;
        }
        return false;
    }

    public function guiaFotos()
    {
        return $this->belongsToMany('ClienteFoto', 'guia_foto','guia_empresa_id',  'foto_id');
    }

    public function guiaVideos()
    {
        return $this->belongsToMany('Video', 'guia_video','guia_empresa_id',  'video_id');
    }


    public function getAnunciosByFiltro($categoria = "todas-categorias", $cidade = "todas-cidades")
    {
        $result = $this;

        if($categoria != "todas-categorias"){
            $result = $result->where('guia_categoria.url', '=', $categoria);
        }

        if($cidade != "todas-cidades"){
            $result = $result->where('guia_cidade.url' , '=' , $cidade);
        }

        $result = $result->where('guia_empresa.status', '=', 1)
                        ->join("cliente", "guia_empresa.cliente_id" , "=" , "cliente.id")
                        ->join("guia_categoria", "guia_empresa.categoria_id" , "=" , "guia_categoria.id")
                        ->join("guia_cidade", "guia_empresa.cidade_id" , "=" , "guia_cidade.id")
                        ->join("guia_plano", "guia_empresa.plano_id" , "=" , "guia_plano.id")
                        ->leftjoin("cliente_foto", "guia_empresa.foto_id", "=", "cliente_foto.id")
                        ->orderBy('guia_plano.ordem')
                        ->get(array("cliente.nm_nome_fantasia as empresa", "cliente.path_img as path_img_logo", "guia_categoria.nome as categoria", "cliente_foto.path_img as path_img_destaque",
                                    "guia_plano.cor", "guia_empresa.*"));

        //return $result;
        if(count($result) > 0) {
            return $this->getFiltroRandomico($result);
        }
        else{
            return null;
        }
    }

    protected function getFiltroRandomico($result)
    {
        $new_array = array(); //novo array com os anuncios randomicos
        $temp = array(); //array de apoio para deixar o array principal randomico
        $plano = $result[0]['plano_id']; //ID do plano do primeiro anuncio do array

        foreach($result as $rs)
        {
            //enquanto for igual, separa anuncios do mesmo plano
            if($plano == $rs['plano_id']){
                $temp[] = $rs;
            }
            else{
                $plano = $rs['plano_id'];

                shuffle($temp); //deixa randomico o array temporario
                $new_array = array_merge($new_array, $temp); //joga para o array de retorno o array temporario já embaralhado

                $temp = null;
                $temp[] = $rs;
            }
        }

        //realiza a operação acima para o ultimo ID do plano
        shuffle($temp);
        $new_array = array_merge($new_array, $temp);

        return $new_array;
    }

    /**
     * @param $url - string
     * @return bool
     */
    public function getAnuncioById($url)
    {
        $anuncio = $this->where('guia_empresa.status', '=', 1)
                    ->where("guia_empresa.url", "=", $url)
                    ->join("cliente", "guia_empresa.cliente_id", "=", "cliente.id")
                    ->join("guia_categoria", "guia_empresa.categoria_id", "=", "guia_categoria.id")
                    ->join("guia_cidade", "guia_empresa.cidade_id", "=", "guia_cidade.id")
                    ->get(array("cliente.path_img as path_img_logo", "cliente.url as url_cliente", "guia_categoria.nome as categoria", "guia_categoria.url as url_categoria",
                                "guia_cidade.url as url_cidade", "guia_cidade.nome as guia_cidade", "guia_empresa.descricao", "guia_empresa.foto_id", "guia_empresa.texto",
                                "guia_empresa.id as guia_empresa_id" ,"guia_empresa.url as url_empresa", "cliente.*"))
                    ->toArray();

        if(isset($anuncio[0])){

            if($anuncio[0]["nm_site"]){
                preg_match("/http|https/",$anuncio[0]["nm_site"] , $matches);
                if(!$matches){
                    $anuncio[0]["nm_site"] = "http://" . $anuncio[0]["nm_site"];
                }
            }

            return $anuncio[0];
        }
        else{
            return false;
        }
    }

    public function getFotosByAnuncioId($id)
    {
        return $this->where("guia_foto.guia_empresa_id", "=", $id)
            ->join("guia_foto", "guia_empresa.id", "=", "guia_foto.guia_empresa_id")
            ->join("cliente_foto", "guia_foto.foto_id", "=", "cliente_foto.id")
            ->get(array("cliente_foto.*"))->toArray();
    }

    public function getVideosByAnuncioId($id)
    {
        return $this->where("guia_video.guia_empresa_id", "=", $id)
            ->join("guia_video", "guia_empresa.id", "=", "guia_video.guia_empresa_id")
            ->join("video", "guia_video.video_id", "=", "video.id")
            ->get(array("video.*"))->toArray();
    }

    public function getFotoDestaque($id)
    {
        return $this->where("guia_empresa.foto_id", "=", $id)
            ->join("cliente_foto", "guia_empresa.foto_id", "=", "cliente_foto.id")
            ->get(array("cliente_foto.path_img", "cliente_foto.titulo", "cliente_foto.descricao"))->toArray();
    }

    public function getDadosGuiaClienteToEmail($id)
    {
        $dados = $this->where("guia_empresa.id", "=", $id)
            ->join("cliente", "guia_empresa.cliente_id", "=", "cliente.id")
            ->join("guia_categoria", "guia_empresa.categoria_id", "=", "guia_categoria.id")
            ->join("guia_cidade", "guia_empresa.cidade_id", "=", "guia_cidade.id")
            ->get(array("cliente.nm_email_responsavel", "cliente.nm_nome_fantasia", "guia_categoria.nome as categoria", "guia_cidade.nome as guia_cidade", "guia_empresa.email_responsavel_anuncio"))
            ->toArray();

        if(isset($dados[0])){
            //Regra quando o anuncio tiver um responsavel diferente do cadastro do cliente
            if($dados[0]['email_responsavel_anuncio']){
                $dados[0]['nm_email_responsavel'] = $dados[0]['email_responsavel_anuncio'];
                unset($dados[0]['email_responsavel_anuncio']);
            }
            return $dados[0];
        }
        else{
            return false;
        }
    }

    public function getClienteByGuiaId($id)
    {
        $cliente = $this->where("guia_empresa.id", "=", $id)
            ->join("cliente", "guia_empresa.cliente_id", "=", "cliente.id")
            ->get(array("cliente.*"))->toArray();

        if(isset($cliente[0])){

            return $cliente[0];
        }
        else{
            return false;
        }
    }

    public static function getTotalFotosByAnuncioId($id)
    {
        return static::where("guia_foto.guia_empresa_id", "=", $id)
            ->join("guia_foto", "guia_empresa.id", "=", "guia_foto.guia_empresa_id")
            ->get()->count();
    }

    public static function getTotalVideosByAnuncioId($id)
    {
        return static::where("guia_video.guia_empresa_id", "=", $id)
            ->join("guia_video", "guia_empresa.id", "=", "guia_video.guia_empresa_id")
            ->get()->count();
    }

    public static function getAnunciosByClienteId($cliente_id)
    {
        $result = static::where('guia_empresa.status', '=', 1)
                ->where("guia_empresa.cliente_id", "=", $cliente_id)
                ->join("guia_categoria", "guia_empresa.categoria_id", "=", "guia_categoria.id")
                ->join("guia_cidade", "guia_empresa.cidade_id", "=", "guia_cidade.id")
                ->get(array("guia_categoria.nome as categoria", "guia_cidade.nome as guia_cidade", "guia_empresa.id as guia_empresa_id"));

        $return = null;
//        $return[''] = 'Selecione uma opção';

        foreach($result as $rs){
            $return[$rs->guia_empresa_id] = $rs->categoria . " - " . $rs->guia_cidade;
        }

        return $return;
    }
}