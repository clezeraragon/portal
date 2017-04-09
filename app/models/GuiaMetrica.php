<?php

class GuiaMetrica extends BaseModel
{
    protected $table = 'guia_metrica';

    protected $guarded = array('id');

    protected $fillable = array('guia_empresa_id', 'pagina_id', 'tipo_id', 'posicao', 'chave', 'ip', 'user_agent', 'cliente_id', 'categoria_id', 'cidade_id', 'plano_id');

    public static $rules = array(
        'guia_empresa_id' => 'required|numeric',
        'pagina_id' => 'required|numeric',
        'tipo_id' => 'required|numeric',
        'posicao' => 'numeric',
        'chave' => '',
        'ip' => '',
        'user_agent' => '',
        'cliente_id' => 'numeric',
        'categoria_id' => 'numeric',
        'cidade_id' => 'numeric',
        'plano_id' => 'numeric'
    );


    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getRelatorioMetricaByEmpresa($dt_ini = null, $dt_fim = null)
    {
        $user = Sentry::getUser()->perfil->perfil;

        $clicks = $this->join("guia_empresa", "guia_metrica.guia_empresa_id", "=", "guia_empresa.id")
                       ->join("cliente", "guia_empresa.cliente_id", "=", "cliente.id");

        if ($user === 'Vendedor'){
            $clicks->join("vendedor", 'cliente.vendedor_id', '=', 'vendedor.id')->orwhere('vendedor.user_id', Sentry::getUser()->id);
        }

        if($dt_ini && $dt_fim){
            $clicks = $clicks->whereBetween('guia_metrica.created_at', array($dt_ini . " 00:00:01", $dt_fim . " 23:59:59"));
        }

        $clicks = $clicks->get(array("cliente.nm_nome_fantasia as cliente", "guia_metrica.*"));
//        dd(DB::getQueryLog());
//        dd($clicks);

        $dados = array();
        foreach($clicks as $click){

            $dados[$click->guia_empresa_id]['empresa'] = $click->cliente;

            if(isset($dados[$click->guia_empresa_id][$click->tipo_id])) {
                $dados[$click->guia_empresa_id][$click->tipo_id] += 1;
            }
            else{
                $dados[$click->guia_empresa_id][$click->tipo_id] = 1;
            }
        }

//        dd($dados);
        return $dados;
    }

    public function saveMetrica($anuncio_id, $pagina_id, $tipo_id, $posicao = null, $chave = null)
    {
        $ips_negado = array("187.35.143.118");

        $ip = Request::getClientIp();

        if (!in_array($ip, $ips_negado))
        {
            $guia_empresa = GuiaEmpresa::find($anuncio_id);

            $dados = array(
                "guia_empresa_id" => $anuncio_id,
                "pagina_id" => $pagina_id,
                "tipo_id" => $tipo_id,
                "ip" => $ip,
                "user_agent" => $_SERVER['HTTP_USER_AGENT'],
                "cliente_id" => $guia_empresa->cliente_id,
                "categoria_id" => $guia_empresa->categoria_id,
                "cidade_id" => $guia_empresa->cidade_id,
                "plano_id" => $guia_empresa->plano_id
            );

            if ($posicao){
                $dados['posicao'] = $posicao;
            }
            if ($chave){
                $dados['chave'] = $chave;
            }

            $this->create($dados);
        }
    }
}