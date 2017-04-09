<?php

namespace Portal;

use Produto, Correios, Util;

class CorreioController extends BaseController {

    protected $servico = 'sedex_a_cobrar'; //opções: sedex, sedex_a_cobrar, sedex_10, sedex_hoje, pac

    protected $formato = 'caixa'; //opções: caixa, rolo, envelope

    protected $cep_origem = '02341002'; //CEP Isonhei

    protected $empresa; //Código da empresa junto aos correios, não obrigatório.

    protected $senha; //Senha da empresa junto aos correios, não obrigatório.

    protected $diametro = '0'; //Em centímetros, no caso de rolo

    protected $mao_propria; //Não obrigatórios

    protected $aviso_recebimento; // Não obrigatórios

    public function __construct()
    {

    }

    public function getPrazoValor($cepDestino, $produto_id)
    {
        $cepDestino = preg_replace('/-/', '', $cepDestino);
        //dd($cepDestino);

        $produto = new Produto();
        $dados_produto = $produto->find($produto_id);

        $dados = array(
            'tipo'              => $this->servico,
            'formato'           => $this->formato,
            'cep_origem'        => $this->cep_origem,
            'diametro'        => $this->diametro,

            'cep_destino'       => $cepDestino, //Obrigatório

            'peso'              => $dados_produto->peso, //Peso em kilos
            'comprimento'       => $dados_produto->comprimento, //Em centímetros
            'altura'            => $dados_produto->altura, //Em centímetros
            'largura'           => $dados_produto->largura, //Em centímetros
            'valor_declarado'   => $dados_produto->valor //Não obrigatórios
        );

        $resultado = Correios::frete($dados);
        //dd($resultado);

        return Util::number($resultado['valor'], 2);

    }

    public function getDadosCep($cep)
    {
        $resultado = Correios::cep($cep);
        //dd($resultado);

        return $resultado;
    }

}
