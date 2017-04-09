<?php

class Fidelidade extends BaseModel
{
    /**
     * Metodo para embaralhar o id do usuario indicador
     * @param $id - id do usuario indicador
     * @return string - com o id do usuario indicador criptografado
     */
    public function encriptografaCodigoIndicacao($id)
    {
//        $codigo = $id;
//        for ($i = 0; $i <= 2; $i++) {
//            $codigo = base64_encode($codigo);
//        }
//        return $codigo;

        return $id;
    }

    /**
     * Metodo para desembaralhar o id do usuario indicador
     * @param $id - id do usuario indicador criptografado
     * @return string - com o id do usuario indicador
     */
    public function decriptografaCodigoIndicacao($codigo)
    {
//        $id = $codigo;
//        for ($i = 0; $i <= 2; $i++) {
//            $id = base64_decode($id);
//        }
        return $codigo;
    }

    public static function getLinkIndicacao($user_id)
    {
        return  route('portal') . "/club/" . $user_id;
    }

    /**
     * Registrar Pontos do programa de Fidelidade para os usuarios do portal antigo
     * @param $user_id
     */
    public function processaCadastroPortalAntigo($user_id)
    {
        $acao_id = 1; //ID acao para cadastros antigo
        $this->registraMovimentacao($user_id, $acao_id, "entrada", null);
    }

    /**
     * @param $user_id - usuario que esta se cadastrando
     * @param $indicador_id - id do usuario que indicou o cadastrado, pode ser nulo no caso de cadastro organico
     */
    public function processaCadastroPortal($user, $indicador_id)
    {
        if ($indicador_id) {

            $promotor = new Promotor();
            $usuario_promotor = $promotor->findPromotorAtivoByUserId($indicador_id);
            //dd($usuario_promotor);
            if($usuario_promotor)
            {
                /*Registra pontos do promotor indicador*/
                $acao_id = 10; //ID Indicação de cadastro Promotor
                $this->registraMovimentacao($indicador_id, $acao_id, "entrada", $user->id);

                /*Registra pontos do usuario que esta se cadastrando por indicação do promotor*/
                $acao_id = 9; //ID Cadastro por Indicação Promotor
                $this->registraMovimentacao($user->id, $acao_id, "entrada", null);

                //verifica se o promotor tem um responsavel
                if(isset($usuario_promotor->responsavel_id))
                {
                    /*Registra do responsavel do promotor*/
                    $acao_id = 11; //ID Bônus por indicação de cadastro Promotor
                    $tabela = "users";
                    $chave = $indicador_id;
                    $descricao = " Promotor: " . $usuario_promotor->first_name . " " . $usuario_promotor->last_name;
                    $this->registraMovimentacao($usuario_promotor->responsavel_id, $acao_id, "entrada", null, $tabela, $chave, $descricao);
                }

                //verifica se o promotor esta relacionado a um cliente
                if(isset($usuario_promotor->cliente_id)) {

                    $cliente = Cliente::find($usuario_promotor->cliente_id);

                    $acao_id = 12; //Fechamento com o Parceiro por indicação de Promotor
                    $meses_validade_codigo = 6;
                    $tabela = "cliente";
                    $chave = $usuario_promotor->cliente_id;
                    $descricao = $cliente->nm_nome_fantasia;

                    $fidelidade_codigo = new FidelidadeCodigo();
                    $cod_fechamento = $fidelidade_codigo->criarCodigoFechamento($acao_id, $user->id, $meses_validade_codigo, $tabela, $chave, $descricao);

                    $acaoFid = new FidelidadeAcao();
                    $dados_email = array(
                        'cod_fechamento' => $cod_fechamento,
                        'cliente' => $cliente->nm_nome_fantasia,
                        'usuario' => $user->first_name . " " . $user->last_name,
                        'usuario_promotor' => $usuario_promotor->first_name . " " . $usuario_promotor->last_name,
                        'usuario_promotor_email' => $usuario_promotor->email,
                        'pontos_promotor' => $acaoFid->find(10)->pontos,
                        'pontos_fechamento' => $acaoFid->find(12)->pontos,
                    );

                    Mail::send('emails.fidelidade.codigo-fechamento', $dados_email , function ($message) use ($cliente, $user, $dados_email){
                        $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                            ->subject("Código gerador de pontos para " . $user->first_name . " " . $user->last_name)
                            ->to($cliente->nm_email_responsavel, $cliente->nm_nome_fantasia) //responsavel pelo cliente
                            ->cc($dados_email["usuario_promotor_email"], $dados_email["usuario_promotor"]) //promotor
                            ->bcc(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome')); //isonhei
                    });
                }

            }
            else {

                /*Registra pontos do usuario indicador*/
                $acao_id = 4; //ID Indicacao de cadastro
                $this->registraMovimentacao($indicador_id, $acao_id, "entrada", $user->id);

                /*Registra pontos do usuario que esta se cadastrando*/
                $acao_id = 3; //ID Cadastro indicacao
                $this->registraMovimentacao($user->id, $acao_id, "entrada", null);
            }
        }
        else {

            /*Registra pontos do usuario que se cadastrou pelo portal*/
            $acao_id = 2; //ID Cadastro Organico
            $this->registraMovimentacao($user->id, $acao_id, "entrada", null);
        }
    }

    public function processaResgateProduto($user_id, $pontos, $resgate_id)
    {
        $acao_id = 5; //ID Resgate
        $tipo    = "saida";
        $status  = "liberado";

        $movFid  = new FidelidadeMovimentacao();
        $dados = array(
            "user_id" => $user_id,
            "acao_id" => $acao_id,
            "resgate_id" => $resgate_id,
            "pontos" => $pontos,
            "tipo" => $tipo,
            "status" => $status
        );

        //registra a movimentacao de pontos
        $movFid->create($dados);
    }


    /**
     * Registrar Pontos do programa de Fidelidade para os usuarios que solicitar um orçamento no guia de empresa
     * @param $user_id
     * @return boolean - se o usuario pontuo no programa neste contato
     */
    public function processaPedidoOrcamento($user_id, $nome_usuario_form, $guia_empresa_id, $guia_contato_id)
    {
        $meses_bloqueio_pedido = 6; //tempo em meses que o usuario vai pontua 1x por esta ação
        $data_bloqueio_pedido = date('Y-m-d 00:00:01', strtotime("-$meses_bloqueio_pedido months"));

        $guia_empresa = new GuiaEmpresa();
        $cliente = $guia_empresa->getClienteByGuiaId($guia_empresa_id);

        $tabela = "guia_contato";
        $chave = $guia_contato_id;
        $descricao = $cliente['nm_nome_fantasia'];

        //verifica se o usuario ira pontuar no fidelidade
        $movFid  = new FidelidadeMovimentacao();
        $total_orcamento = $movFid->getTotalPedidoOrcamentoByAnuncio($user_id, $guia_empresa_id, $data_bloqueio_pedido);
        if($total_orcamento == 0){

            $acao_id = 6; //ID acao para pedido de orçamento
            $this->registraMovimentacao($user_id, $acao_id, "entrada", null, $tabela, $chave, $descricao);

            $fidelidade_codigo = new FidelidadeCodigo();

            //get codigo visita
            $acao_id = 7; //Visita ao parceiro
            $cod_visita = $fidelidade_codigo->criarCodigoVisita($acao_id, $user_id, $meses_bloqueio_pedido, $tabela, $chave, $descricao);

            //get codigo fechamento
            $acao_id = 8; //Fechamento com o parceiro
            $cod_fechamento = $fidelidade_codigo->criarCodigoFechamento($acao_id, $user_id, $meses_bloqueio_pedido, $tabela, $chave, $descricao);

            $acaoFid = new FidelidadeAcao();

            $return = array();
            $return["pontos_pedido"]     = $acaoFid->find(6)->pontos;
            $return["pontos_visita"]     = $acaoFid->find(7)->pontos;
            $return["pontos_fechamento"] = $acaoFid->find(8)->pontos;
            $return["cod_visita"]        = $cod_visita;
            $return["cod_fechamento"]    = $cod_fechamento;

            return $return;
        }

        return false;
    }

    /**
     * @param $user_id
     * @param $codigo - array com os dados do codigo salvos no banco
     */
    public function processaCodigo($user_id, $codigo)
    {
        $tabela = "fid_codigo";
        $chave = $codigo["id"];
        $descricao = "Código: " . $codigo["codigo"];

        $this->registraMovimentacao($user_id, $codigo["acao_id"], "entrada", null, $tabela, $chave, $descricao);

        if(isset($codigo["user_id"])){
            $fid_codigo = new \FidelidadeCodigo();
            $fid_codigo->find($codigo["id"])->update(array("st_usado" => 1));
        }
    }


    /**
     * Registra a movimentacao dos pontos, de acordo com o nivel no gamefication e verifica a promoção do usuario após registro de pontos.
     * @param $user_id
     * @param $acao_id
     * @param $tipo - entrada ou saida
     * @param $indicado_id - id do usuario indicado na ação de indicação
     * @param $tabela - tabela da chave do registro
     * @param $chave - pk da tabela de ligação do registro de ponto - para auditoria
     * @param $descricao - nome do registro de ligação para exibição no painel
     */
    public function registraMovimentacao($user_id, $acao_id, $tipo, $user_indicado_id = null, $tabela = null, $chave = null, $descricao = null, $observacao = null)
    {
        $movFid  = new FidelidadeMovimentacao();
        $acaoFid = new FidelidadeAcao();
        $gamefication = new Gamefication();

        $acao = $acaoFid->find($acao_id);

        //verifica se tem acrescimo de pontos pelo nivel do gamefication
        $pontos = $gamefication->multiplicadorGamefication($acao->pontos, $user_id);

        //Dados obrigatorios
        $dados = array(
            "user_id" => $user_id,
            "acao_id" => $acao->id,
            "pontos" => $pontos,
            "tipo" => $tipo
        );

        //Dados opcional por ações
        if($user_indicado_id){
            $dados["user_indicado_id"] = $user_indicado_id;
        }
        if($tabela){
            $dados["tabela"] = $tabela;
        }
        if($chave){
            $dados["chave"] = $chave;
        }
        if($descricao){
            $dados["descricao"] = $descricao;
        }
        if($observacao){
            $dados["observacao"] = $observacao;
        }

        //status = liberado|pendente
        $dados["status"] = $this->getStatusPontuacao($tipo, $user_id);

        //registra a movimentacao de pontos
        $movFid->create($dados);

        //verifica se o usuario sera promovido
        $gamefication->verificaPromocaoNivelUsuario($user_id);
    }


    /**
     * Verifica se o usuario tem o cpf preenchido, para a liberação dos pontos
     * @param $tipo (entrada|saida)
     * @param $user_id
     * @return string (liberado|pendente)
     */
    public function getStatusPontuacao($tipo, $user_id)
    {
        if($tipo == "entrada"){

            $user = User::find($user_id);

            if(!$user->cpf){
                return "pendente";
            }
            return "liberado";
        }
        return "liberado";
    }


    /**
     * Este metodo recebe um valor cheio de pontos, diferente do registraMovimentacao que recebe um id de ação e busca os pontos desta ação no banco de dados
     * Esté metodo tem a pontuação flexivel para uma mesma ação
     */
    public function registraMovimentacaoDePromocao($user_id, $acao_id, $pontos, $tabela = null, $chave = null, $descricao = null, $observacao = null)
    {
        $movFid  = new FidelidadeMovimentacao();
        $gamefication = new Gamefication();

        //verifica se tem acrescimo de pontos pelo nivel do gamefication
        $pontos = $gamefication->multiplicadorGamefication($pontos, $user_id);

        //Dados obrigatorios
        $dados = array(
            "user_id" => $user_id,
            "acao_id" => $acao_id,
            "pontos" => $pontos,
            "tipo" => "entrada"
        );

        if($tabela){
            $dados["tabela"] = $tabela;
        }
        if($chave){
            $dados["chave"] = $chave;
        }
        if($descricao){
            $dados["descricao"] = $descricao;
        }
        if($observacao){
            $dados["observacao"] = $observacao;
        }

        //status = liberado|pendente
        $dados["status"] = $this->getStatusPontuacao("entrada", $user_id);

        //registra a movimentacao de pontos
        $movFid->create($dados);

        //verifica se o usuario sera promovido
        $gamefication->verificaPromocaoNivelUsuario($user_id);
    }


    public function getSaldoPontosByUser($user_id)
    {
        $entrada = $this->getTotalPontosByTipoAndUser("entrada", $user_id);
        $saida = $this->getTotalPontosByTipoAndUser("saida", $user_id);

        return ($entrada - $saida);
    }

    /**
     * Seleciona o total de pontos registrados por tipo de movimentacao(tipo:entrada|saida) e por usuario (user_id)
     * @param $tipo
     * @param $user_id
     * @return mixed
     */
    public function getTotalPontosByTipoAndUser($tipo, $user_id)
    {
        $movFid = new FidelidadeMovimentacao();
        $total = $movFid->where("user_id", $user_id)
            ->where("tipo", $tipo)
            ->where("status", "liberado")
            ->sum("pontos");
        return $total;
    }


    public function getMovimentacaoEntradaLiberadaByUser($user_id)
    {
        return $this->getMovimentacaoEntradaByUser($user_id, "liberado");
    }

    public function getMovimentacaoEntradaPendenteByUser($user_id)
    {
        return $this->getMovimentacaoEntradaByUser($user_id, "pendente");
    }

    private function getMovimentacaoEntradaByUser($user_id, $status)
    {
        $movFid = new FidelidadeMovimentacao();
        return $movFid->join("fid_acoes", "fid_movimentacao.acao_id", "=", "fid_acoes.id")
                    ->leftjoin("users", "fid_movimentacao.user_indicado_id", "=", "users.id")
                    ->where("user_id", $user_id)
                    ->where("tipo", "entrada")
                    ->where("status", $status)
                    ->get(array("fid_acoes.nome as acao", "fid_movimentacao.*", "users.first_name as nome_indicado", "users.last_name as sobrenome_indicado"));
    }


    public function getResgatesByUser($user_id)
    {
        $resgate = new FidelidadeResgate();
        return $resgate->join("fid_movimentacao", "fid_movimentacao.resgate_id", "=", "fid_resgate.id")
                        ->join("fid_status_resgate", "fid_resgate.status_resgate_id", "=", "fid_status_resgate.id")
                        ->join("produto", "fid_resgate.produto_id", "=", "produto.id")
                        ->where("fid_resgate.user_id", $user_id)
                        ->where("fid_movimentacao.tipo", "saida")
                        ->get(array("produto.nome as produto", "produto.produto_tipo_id", "produto.path_arquivo", "fid_movimentacao.pontos", "fid_status_resgate.nome as status_resgate", "fid_resgate.*"));
    }


    public function liberaMovimentacaoEntradaByUser($user_id)
    {
        $movFid = new FidelidadeMovimentacao();
        $movFid->where('tipo', '=', "entrada")
            ->where('status', '=', "pendente")
            ->where('user_id', '=', $user_id)
            ->update(array('status' => "liberado"));
    }

    public function getIndicacoesPendentesAceitacao($user_id)
    {
        $user = new User();
        return $user->where("fidelidade_indicador_id", "=", $user_id)
                    ->where("activated", "=", 0) //não ativou o cadastro
                    ->get(array("first_name", "last_name", "email", "created_at"));
    }
}