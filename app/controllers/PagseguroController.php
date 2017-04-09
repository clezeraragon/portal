<?php

require app_path(). "/pagseguro/php/source/PagSeguroLibrary/PagSeguroLibrary.php";

class PagseguroController extends Controller{

    public function __construct(){}

    public function consultaTransacaoById($transaction_code)
    {
        try {

            $credentials = PagSeguroConfig::getAccountCredentials();

            $transaction = PagSeguroTransactionSearchService::searchByCode($credentials, $transaction_code);

            $status = $transaction->getStatus()->getTypeFromValue();

            $cotaPagamento = new SiteCotaPagamento();
            $pagamento = $cotaPagamento->getPagamentoByPsTrasationCode($transaction_code);

            $pagamento->update(array("ps_status" => $status));


        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

}