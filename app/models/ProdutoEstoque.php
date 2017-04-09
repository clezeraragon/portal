<?php

class ProdutoEstoque extends BaseModel
{
    protected $table = 'produto_estoque';

    protected $guarded = array('id');

    public static $rules = array(
        'produto_id' => 'required|numeric',
        'quantidade' => 'required|numeric'
    );

    public function getEstoqueByProductId($produto_id)
    {
        $estoque = null;
        $estoque = $this->where('produto_id', $produto_id)->get()->toArray();
        //dd($estoque);
        if(isset($estoque[0])){
            return $estoque[0];
        }
    }

    public function getNovoEstoque($estoque_atual, $tipo_movimentacao, $quantidade_lancamento)
    {
        switch($tipo_movimentacao)
        {
            case("entrada"):
            $new_estoque = ($estoque_atual + $quantidade_lancamento);
            break;
            case("saida"):
            $new_estoque = ($estoque_atual - $quantidade_lancamento);
            break;
            default:
            die("Erro 001, entrar em contato com o administrador do sistema.");
        }
        return $new_estoque;
    }

    public function registraMovimentacaoEstoque($produto_id, $tipo_movimentacao, $quantidade, $descricao)
    {
        $movimentacao = new ProdutoEstoqueMovimentacao();
        $movimentacao->create(array(
                        "produto_id" => $produto_id,
                        "qtd" => $quantidade,
                        "tipo" => $tipo_movimentacao,
                        "descricao" => $descricao,
                        "user_id" => Sentry::getUser()->id,
                        "ip" => Request::getClientIp()
        ));
    }

    public function atualizaEstoqueResgate($produto_id, $quantidade)
    {
        $estoque = $this->getEstoqueByProductId($produto_id);
        $novo_estoque = $this->getNovoEstoque($estoque['estoque'], "saida", $quantidade);

        $dados = array(
            "produto_id" => $produto_id,
            "estoque" => $novo_estoque
        );
        $this->find($estoque['id'])->update($dados);
    }
}