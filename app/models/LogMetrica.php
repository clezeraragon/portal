<?php

class LogMetrica extends BaseModel
{
    public static function savarLogLinkIndicacaoFidelidade($fidelidade_indicador, $st_link_valido, $descricao = null)
    {
        $dados = array(
            "fidelidade_indicador" => $fidelidade_indicador,
            "user_agent" => $_SERVER['HTTP_USER_AGENT'],
            "ip" => Request::getClientIp(),
            "st_link_valido" => $st_link_valido,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        );

        if(isset($descricao)) {
            $dados += array(
                "descricao" => $descricao
            );
        }

        DB::table('log_link_indicacao')->insert($dados);
    }

    public static function savarLogMetricaSite($pagina, $metrica)
    {
        $dados = array(
            "pagina" => $pagina,
            "metrica" => $metrica,
            "user_agent" => $_SERVER['HTTP_USER_AGENT'],
            "ip" => Request::getClientIp(),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        );

        if(isset(Sentry::getUser()->id)) {
            $dados += array(
                "user_id" => Sentry::getUser()->id
            );
        }

        DB::table('log_metrica_site')->insert($dados);
    }

    public function getAcessoLinkIndicacaoByTime($tempo = null)
    {
        $logLinkInd = new LogLinkIndicacao();

        if($tempo == "*"){
           return $logLinkInd->getTotalAcessoUnico("*");
        }
        else if(isset($tempo)) {
            return $logLinkInd->getTotalAcessoUnico($tempo);
        }
        else{
            return $logLinkInd->getTotalAcessoUnico();
        }
    }
}