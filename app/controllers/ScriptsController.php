<?php

class ScriptsController extends Controller {

	public function getScript10Amigos()
	{
        echo "Hello Start<br>";

        $dt_ini           = "2015-06-05 00:00:01"; //data inicial da campanha
        $dt_fim           = "2015-07-05 23:59:59"; //data final da campanha
        $ids_acao_analise = array (10 , 4); //ID's da acao que será analisada
        $objetivo         = 10; //qantidade de vezes que precisa ser realizada uma ação para ganhar o beneficio
        $beneficio        = 1000; //quantidade de pontos dado a cada objetivo alcançado

        $id_acao_pontuacao = 13; //ID da acao de pontuacao da promocao

        $fidelidade = new Fidelidade();
        $fidMov     = new FidelidadeMovimentacao();

        $resultado = $fidMov->join("users", "fid_movimentacao.user_id", "=", "users.id")
            ->whereIn("fid_movimentacao.acao_id", $ids_acao_analise)
            ->whereBetween('fid_movimentacao.created_at',array($dt_ini, $dt_fim))
            ->groupBy("fid_movimentacao.user_id")
            ->orderBy("total", "DESC")
            ->get(array("users.email", "users.id",  DB::raw('count(*) as total')));

        $etapa1 = array();
        foreach($resultado as $rs)
        {
            $etapa1[$rs->id] = ($rs->total % $objetivo);
        }

//        dd($etapa1);

        $dt_ini           = "2015-07-05 00:00:01"; //data inicial da campanha
        $dt_fim           = "2015-07-31 23:59:59"; //data final da campanha

        $resultado = $fidMov->join("users", "fid_movimentacao.user_id", "=", "users.id")
            ->whereIn("fid_movimentacao.acao_id", $ids_acao_analise)
            ->whereBetween('fid_movimentacao.created_at',array($dt_ini, $dt_fim))
            ->groupBy("fid_movimentacao.user_id")
            ->orderBy("total", "DESC")
            ->get(array("users.email", "users.id",  DB::raw('count(*) as total')));

        foreach($resultado as $rs)
        {
            $total_etapa1 = 0;
            if(isset($etapa1[$rs->id])){
                $total_etapa1 = $etapa1[$rs->id];
            }
            $total_objetivos = floor(($rs->total + $total_etapa1) / $objetivo);

            $total_pontos = $total_objetivos * $beneficio;

            echo "<br>" . $observacao = "Acoes:" . $rs->total . "|Objetivos:" . $total_objetivos . "|Pontos:" . $total_pontos;

            //Se o usuario conseguiu pontuacao com a promocao
            if($total_objetivos > 0) {
//                $fidelidade->registraMovimentacaoDePromocao($rs->id, $id_acao_pontuacao, $total_pontos, null, null, null, $observacao);
                echo "<h1>OK</h1>";
            }

            echo "<br>Usuario: " . $rs->email;
            echo "<br>Total de acoes realizadas: " . $rs->total;
            echo "<br>Total de acoes realizadas na etapa 1 que não foram pontuadas: " . $total_etapa1;
            echo "<br>Total de objetivos: " . $total_objetivos;
            echo "<br>Total de pontos: " . $total_pontos;
            echo "<Br>===========";
        }

        echo "<br>Hello End";
	}

}
