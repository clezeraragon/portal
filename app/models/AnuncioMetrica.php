<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 23/02/2015
 * Time: 14:13
 */
class AnuncioMetrica extends BaseModel
{

    protected $table = 'anuncio_metrica';
    protected $guarded = array('id');
    protected $fillable = array('anuncio_id', 'metrica_tipo_id', 'pagina_id', 'posicao', 'ip', 'user_agent');


    public static $rules = array(

        'anuncio_id' => 'required|numeric',
        'metrica_tipo_id' => 'required|numeric',
        'pagina_id' => 'required|numeric',
        'posicao' => 'numeric',
        'ip' => '',
        'user_agent' => ''

    );
    public function getRelatorioMetricaByAnuncio($dt_ini = null, $dt_fim = null)
    {
        $clicks = $this->join("metrica_pagina", "metrica_pagina.id", "=", "anuncio_metrica.pagina_id")
            ->join("metrica_tipo", "metrica_tipo.id", "=", "anuncio_metrica.metrica_tipo_id")
            ->join("anuncio","anuncio.id","=","anuncio_metrica.anuncio_id");


        if($dt_ini && $dt_fim){
            $clicks = $clicks->whereBetween('anuncio_metrica.created_at', array($dt_ini . " 00:00:01", $dt_fim . " 23:59:59"));
        }
        $clicks = $clicks->get(array("anuncio.anuncio as anuncio", "anuncio_metrica.*","metrica_pagina.*","metrica_tipo.metrica"));
//        dd($clicks);
        $dados = array();
        foreach($clicks as $click){

            $dados[$click->anuncio_id]['anuncio'] = $click->anuncio;
            $dados[$click->anuncio_id]['pagina'] = $click->pagina;
            $dados[$click->anuncio_id]['tipo_metrica'] = $click->metrica;
            if(isset($dados[$click->anuncio_id][$click->metrica_tipo_id])) {
                $dados[$click->anuncio_id][$click->metrica_tipo_id] += 1;

            }
            else{
                $dados[$click->anuncio_id][$click->metrica_tipo_id] = 1;

            }

        }

        return $dados;



    }

    public function saveMetrica($anuncio_id, $metrica_tipo_id, $pagina_id, $posicao = null)
    {
        $ips_negado = array("187.35.143.118");

        $ip = Request::getClientIp();

        if (!in_array($ip, $ips_negado))
        {
            $dados = array(
                "anuncio_id" => $anuncio_id,
                "metrica_tipo_id" => $metrica_tipo_id,
                "pagina_id" => $pagina_id,
                "ip" => $ip,
                "user_agent" => $_SERVER['HTTP_USER_AGENT'],
            );

            if ($posicao) {
                $dados['posicao'] = $posicao;
            }

            $this->create($dados);
        }
    }

}