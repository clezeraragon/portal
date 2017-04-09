<?php
/**
 * Created by PhpStorm.
 * User: iSonhei
 * Date: 18/02/2015
 * Time: 17:36
 */

require app_path(). "/pagseguro/php/source/PagSeguroLibrary/PagSeguroLibrary.php";

class PagSeguro {

    public function __construct(){}

    public function consultaPagamentoByTransactionId($transaction_code)
    {
        try {

            $credentials = PagSeguroConfig::getAccountCredentials();

            $transaction = PagSeguroTransactionSearchService::searchByCode($credentials, $transaction_code);

            return $transaction;

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

}