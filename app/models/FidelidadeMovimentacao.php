<?php

class FidelidadeMovimentacao extends BaseModel
{
    protected $table = 'fid_movimentacao';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'acao_id' => 'required',
        'pontos' => 'required|numeric'
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join("users as users", "fid_movimentacao.user_id", "=", "users.id")
                    ->join("fid_acoes", "fid_movimentacao.acao_id", "=", "fid_acoes.id")
                    ->leftjoin("users as users_indicado", "fid_movimentacao.user_indicado_id", "=", "users_indicado.id")
                    ->get(array("users.email as usuario", "fid_acoes.nome as acao", "users_indicado.email as usuario_indicado", "fid_movimentacao.*"));
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
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Seleciona o total de pontos pelo tipo (entrada ou saida)
     * @param $user_id
     * @param $tipo - (entrada ou saida)
     * @return mixed
     */
    public function getTotalByTipo($user_id, $tipo)
    {
        return $this->where("tipo", $tipo)->where("user_id", $user_id)->sum('pontos');
    }


    public function getQuantidadeEntradaByChave($tabela, $chave)
    {
        return $this->where("tabela", $tabela)
            ->where("chave", $chave)
            ->count();
    }

    public function verificaUsuarioUtilizouCodigo($tabela, $chave, $user_id)
    {
        return $this->where("tabela", $tabela)
            ->where("chave", $chave)
            ->where("user_id", $user_id)
            ->count();
    }

    public function getTotalPedidoOrcamentoByAnuncio($user_id, $guia_empresa_id, $data_bloqueio)
    {
        return $this->join("guia_contato", "fid_movimentacao.chave", "=", "guia_contato.id")
            ->where("fid_movimentacao.tabela", "=", "guia_contato")
            ->where("fid_movimentacao.user_id", "=", $user_id)
            ->where("guia_contato.guia_empresa_id", "=", $guia_empresa_id)
            ->where("fid_movimentacao.created_at", ">", $data_bloqueio)
            ->count();
    }

    public function getRelatorioPontuacaoByAcao($acao_id)
    {
        $dados = $this->join("users", "fid_movimentacao.user_id", "=", "users.id")
            ->where("fid_movimentacao.acao_id", "=", $acao_id)
            ->groupBy("fid_movimentacao.user_id")
            ->get(array("fid_movimentacao.user_id", "users.first_name", "users.last_name", DB::raw('COUNT(*) as total')));

//        dd($dados);

        return $dados;
    }
}