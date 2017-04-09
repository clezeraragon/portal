<?php

class SiteCotaPagamento extends BaseModel
{
    protected $table = 'cota_pagamento';

    protected $guarded = array('id');

    public static $rules = array(
        "cota_pedido_id" => "required|numeric",
        "forma_pagamento_id" => "required|numeric"
    );

    public function getPagamentoByPsTrasationCode($code)
    {
        $dados = $this->where('ps_cod_transacao', $code)->get(array("cota_pagamento.*"))->toArray();
        if (isset($dados[0])) {
            return $dados[0];
        }
        return false;
    }
}