<?php

namespace Sonhador;

use View, Redirect, Mail, Input, Lang; // Padrao
use Sonhador, SiteFoto, SiteRecado, SiteCota, SiteCotaPedido, SiteCotaPagamento;

require app_path() . "/pagseguro/php/source/PagSeguroLibrary/PagSeguroLibrary.php";

class SiteSonhadorController extends BaseController
{

    /**
     * Seleciona configuração do site do Sonhador
     * @param $id - id do site
     * @return bool - configuracao do site
     */
    public function getConfigSite($id)
    {
        $dados = Sonhador::getConfigSite($id, false);
        if (!$dados) {
            return Redirect::route("404");
        }
        return $dados;
    }

    /**
     * Metodo responsavel por selecionar as configurações e exibir o site do sonhador
     * @param $id - id do site
     * @return mixed
     */
    public function getSite($id)
    {
        //Configuracao do site
        $dados = Sonhador::getConfigSite($id, false);
        if (!$dados) {
            return Redirect::route("404");
        }

        //Boolean se o usuario pode editar o site
        $canEdit = Sonhador::getPermissionEdit($dados['user_id']);

        //Fotos
        $siteFoto = new SiteFoto;
        $fotos = $siteFoto->getGrid($id);

        //Recados
        $recados = SiteRecado::getRecadosBySiteId($id);

        //Vitrine de Cotas
        $siteCota = new SiteCota;
        $cotas = $siteCota->getCotasToSite($id);

        return View::make('sonhador.' . $dados['path_layout'] . '.index')->with(array(
            "data" => $dados,
            "canEdit" => $canEdit,
            "fotos" => $fotos,
            "recados" => $recados,
            "cotas" => $cotas
        ));
    }


    public function getConfirmacaoPedidoCota($cotaid)
    {
        //Dados da cota
        $siteCota = new SiteCota();
        $cota = $siteCota->find($cotaid);
        if (!$cota) {
            return Redirect::route("404");
        }

        //Configuracao do site
        $dados = $this->getConfigSite($cota->site_id);

        return View::make('sonhador.' . $dados['path_layout'] . '.checkout')->with(array(
            "cota" => $cota,
            "data" => $dados,
            "canEdit" => false
        ));
    }


    public function postPedidoCota()
    {
        $pagamento_id = 1; //Pagamento via PagSeguro

        $input = Input::all();

        //Dados da cota
        $siteCota = new SiteCota();
        $cota = $siteCota->find($input['cota_id']);

        // Pegar o titulo do site
        $site = new \Sonhador();
        $site_titulo = $site->find($cota->site_id);

        // Pegar o nome do dono do site
        $usuario = new \User();
        $usuario_name = $usuario->find($site_titulo['user_id']);
//        dd($usuario_name['email']);


        //Dados do Pedido,
        $input['quantidade'] = 1;
        $input['vl_unit'] = $cota->vl_unit;
        $input['vl_total'] = $cota->vl_unit;
        $input['nm_ip'] = \Request::getClientIp();
        $input['st_resgatado'] = 0; //Não

        //Valida Dados do pedido
        $siteCotaPedido = new SiteCotaPedido();
        $validator = $siteCotaPedido->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            //Cria o pedido em nosso sistema
            $siteCotaPedido = $siteCotaPedido->create($input);

            // todos os dados para passar para o e-mail
            $dados_cliente = array('nome' => Input::get('nome'),
                'mensagem' => Input::get('mensagem'),
                'valor' => \Util::number($input['vl_unit'],2),
                'email' => $usuario_name['email'],
                'nome_cota' => $cota['produto'],
                'titulo_site' => $site_titulo['titulo_site'],
                'nome_titular_site' => $usuario_name['first_name'],
                'site_cota_pedido_id' => $siteCotaPedido->id);


            Mail::send('emails.sonhador.cota', $dados_cliente, function ($message) use ($dados_cliente) {
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->to($dados_cliente['email'], Input::get('nome') . ' ' . Input::get('lastname'))
                    ->cc(Lang::get('general.empresa_email_geral'), Input::get('nome'))
                    ->subject("Confirmação Pedido de Cota - nº " . $dados_cliente['site_cota_pedido_id']);
            });

            //PagSeguro
            if ($pagamento_id == 1) {
                $code = $this->processaPagamentoByPagSeguro($pagamento_id, $cota, $siteCotaPedido, $input);

                //Cria Pagina para chamada do lightbox
                return View::make('sonhador.pagseguro')->with(array(
                    'code' => $code,
                    'site_id' => $cota->site_id
                ));
            }
        }
    }


    public function processaPagamentoByPagSeguro($pagamento_id, $cota, $siteCotaPedido, $input)
    {
        //Configura pedido para o Pagseguro
        $paymentRequest = new \PagSeguroPaymentRequest();
        $paymentRequest->setCurrency("BRL"); //Moeda
        $paymentRequest->addItem($cota->id, $cota->produto, 1, number_format($cota->vl_unit, 2, '.', '')); //Itens do Pedido
        $paymentRequest->setReference($siteCotaPedido->id); //referencia do pedido em nosso sistema - Id do pedido em nosso sistema

        //Dados do Comprador informado no formulario checkout
        $paymentRequest->setSender(
            $input['nome'],
            $input['email'],
            '', '', //ddd e telefone
            'CPF',
            $input['cpf']
        );

        // Set shipping information for this payment request
        $shipCode = \PagSeguroShippingType::getCodeByType('NOT_SPECIFIED');
        $paymentRequest->setShippingType($shipCode);
        //Dados Isonhei
        $paymentRequest->setShippingAddress(
            '02341002',
            'Av. Nova Cantareira',
            '4635',
            '',
            'Tremembé',
            'São Paulo',
            'SP',
            'BRA'
        );

        try {
            $credentials = \PagSeguroConfig::getAccountCredentials();

            // Register this payment request in PagSeguro to obtain the checkout code
            $onlyCheckoutCode = true;
            $code = $paymentRequest->register($credentials, $onlyCheckoutCode);

            //Cria Registro de Pagamento em nosso sistema com o codigo do PagS
            $siteCotaPagamento = new SiteCotaPagamento();
            $siteCotaPagamento->create(array(
                "cota_pedido_id" => $siteCotaPedido->id,
                "forma_pagamento_id" => $pagamento_id,
                "ps_cod_pedido" => $code
            ));

            //Retorna codigo do pedido do PagS
            return $code;

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }


    public function getPedidoObrigado($codpedidopagseguro, $codtransacao)
    {
        try {

            //Pega Dados da transacao no PagS
            $credentials = \PagSeguroConfig::getAccountCredentials();
            $transaction = \PagSeguroTransactionSearchService::searchByCode($credentials, $codtransacao);

            $status = $transaction->getStatus()->getTypeFromValue();

            $dados = array();
            if ($status == "PAID") {
//                $dados['ps_data_liberacao'] = date('Y-m-d', strtotime("+30 days")); # original
                $dados['ps_data_liberacao'] = date('Y-m-d');
            }
            $dados['ps_cod_transacao'] = $codtransacao;
            $dados['ps_status'] = $status;

            //Atualiza codigo da transacao
            $siteCotaPagamento = new SiteCotaPagamento();
            $siteCotaPagamento = $siteCotaPagamento->where("ps_cod_pedido", "=", $codpedidopagseguro);
            $siteCotaPagamento->update($dados);


            //Pega o Id do Site
            $site_id = Sonhador::getSiteIdByCodTransacaoPag($codtransacao);

            //Configuracao do site
            $dados = $this->getConfigSite($site_id);

            return View::make('sonhador.basico.agradecimento')->with(array(
                "data" => $dados,
                "canEdit" => false
            ));

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

}
