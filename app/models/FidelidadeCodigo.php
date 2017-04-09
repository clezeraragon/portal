<?php

class FidelidadeCodigo extends BaseModel
{
    protected $table = 'fid_codigo';

    protected $guarded = array('id');

    public static $rules = array(
        'acao_id' => 'required|numeric',
        'user_id' => 'numeric',
        'codigo' => 'required|min:1|max:45|unique:fid_codigo,codigo',
        'dsc_codigo' => 'required',
        'dt_ini' => 'required',
        'dt_fim' => 'required',
        'quantidade' => 'required|numeric|min:1',
        'st_usado' => 'required'
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join("fid_acoes", "fid_codigo.acao_id", "=", "fid_acoes.id")
                    ->leftjoin("users", "fid_codigo.user_id", "=", "users.id")
                    ->get(array("fid_acoes.nome as acao", "fid_acoes.st_excluir as acao_st_excluir", "users.email", "fid_codigo.*"));
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
            self::$rules['codigo'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }


    public function criarCodigoVisita($acao_id, $user_id, $meses_bloqueio_pedido, $tabela, $chave, $descricao)
    {
        $codigo = $this->criaCodigo($acao_id, $user_id, $chave);

        $dados = array(
            "acao_id" => $acao_id,
            "user_id" => $user_id,
            "codigo" => $codigo,
            "dsc_codigo" => "Código gerado pelo sistema",
            "dt_ini" => date('Y-m-d'),
            "dt_fim" => date('Y-m-d', strtotime("+$meses_bloqueio_pedido months")),
            "quantidade" => 1,
            "st_usado" => 0,
            "tabela" => $tabela,
            "chave" => $chave,
            "descricao" => $descricao
        );
        $this->create($dados);

        return $codigo;
    }


    public function criaCodigo($acao_id, $user_id, $chave = null)
    {
        return $acao_id . $user_id . $chave . str_shuffle("SNH") . str_shuffle(DATE("His"));
    }


    public function criarCodigoFechamento($acao_id, $user_id, $meses_validade_codigo, $tabela, $chave, $descricao)
    {
        $codigo = $this->criaCodigo($acao_id, $user_id, $chave);

        $dados = array(
            "acao_id" => $acao_id,
            "user_id" => $user_id,
            "codigo" => $codigo,
            "dsc_codigo" => "Código gerado pelo sistema",
            "dt_ini" => date('Y-m-d'),
            "dt_fim" => date('Y-m-d', strtotime("+$meses_validade_codigo months")),
            "quantidade" => 1,
            "st_usado" => 0,
            "tabela" => $tabela,
            "chave" => $chave,
            "descricao" => $descricao
        );
        $this->create($dados);

        return $codigo;
    }


    public function verificaCodigo($user_id, $codigo)
    {
        $codigo = trim($codigo);//elimina espaço em branco do codigo

        $ret = $this->where("st_usado", "=", 0) //Não utilizado
                    ->where("codigo", "=", $codigo)
                    ->get()
                    ->toArray();

        //verifica se o codigo é valido
        if(count($ret) > 0)
        {
            //verifica se
            //o codigo é exclusivo se algum usuario e se é o mesmo que está registrando
            //ou se o codigo é livre
            if((isset($ret[0]["user_id"]) && $ret[0]["user_id"] == Sentry::getUser()->id) || !isset($ret[0]["user_id"]) )
            {
                $movFid = new FidelidadeMovimentacao();

                //verifica se o usuario já usou o codigo
                $st_utilizou = $movFid->verificaUsuarioUtilizouCodigo("fid_codigo", $ret[0]["id"], $user_id);
                if($st_utilizou == 0)
                {
                    //verifica validade do periodo do codigo
                    if (strtotime($ret[0]["dt_fim"]) >= strtotime(date("Y-m-d")))
                    {
                        $total_cod_utilizado = $movFid->getQuantidadeEntradaByChave("fid_codigo", $ret[0]["id"]);
                        if ($total_cod_utilizado < $ret[0]["quantidade"])
                        {
                            return array('cod' => 1, 'retorno' => $ret[0]);
                        }
                        else {
                            return array('cod' => 0, 'retorno' => "Código atingiu o limite de utilização.");
                        }
                    }
                    else {
                        return array('cod' => 0, 'retorno' => "O prazo para utilização deste código venceu.");
                    }
                }
                else{
                    return array('cod' => 0, 'retorno' => "Você já utilizou este código.");
                }
            }
            else{
                return array('cod' => 0, 'retorno' => "Código Invalido para o seu cadastro");
            }
        }
        else{
            return array('cod' => 0, 'retorno' => "Código Invalido.");
        }
    }
}