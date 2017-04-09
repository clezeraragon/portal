<?php

class SiteCotaPedido extends BaseModel
{
    protected $table = 'cota_pedido';

    protected $guarded = array('id');

    public static $rules = array(
        "cota_id" => "required|numeric",
        "quantidade" => "required|numeric",
        "vl_unit" => "required",
        "vl_total" => "required",
        "nome" => "required|Regex:/[A-Za-z]+ [A-Za-z]+$/",
        "email" => "required",
        "cpf" => "required|min:14|max:14|cpf",
        "mensagem" => "required",
        "nm_ip" => "required",
        "st_resgatado" => "required"
    );

    public function getGridAdmin($site_id)
    {
        return $this->where('site_id', '=', $site_id)
                    ->join("site_cota", "cota_pedido.cota_id", "=", "site_cota.id")
                    ->join("cota_pagamento", "cota_pagamento.cota_pedido_id", "=", "cota_pedido.id")
                    ->join("forma_pagamento", "cota_pagamento.forma_pagamento_id", "=", "forma_pagamento.id")
                    ->get(array("cota_pedido.*", "site_cota.produto", "cota_pagamento.ps_cod_transacao", "cota_pagamento.ps_status", "forma_pagamento.nome as forma_pagamento"));
    }

    public static function getQuantidadeTotalPedido($cota_id)
    {
        return static::where('cota_pedido.cota_id', '=', $cota_id)
            ->sum("cota_pedido.quantidade");
    }

    public static function getQuantidadeTotalVendido($cota_id)
    {
        return static::where('cota_pedido.cota_id', '=', $cota_id)
                        ->where('cota_pagamento.ps_status', '=', "PAID")
                        ->join("cota_pagamento", "cota_pagamento.cota_pedido_id", "=", "cota_pedido.id")
                        ->sum("cota_pedido.quantidade");
    }

    public function getPedidosLiberadosBySonhador($user_id)
    {
        return $this->where('site.user_id', '=', $user_id)
            ->where("cota_pagamento.ps_data_liberacao", "<=", date("Y-m-d") )
            ->join("site_cota", "cota_pedido.cota_id", "=", "site_cota.id")
            ->join("site", "site_cota.site_id", "=", "site.id")
            ->join("cota_pagamento", "cota_pagamento.cota_pedido_id", "=", "cota_pedido.id")
            ->get(array("site.titulo_site", "site_cota.produto as cota", "cota_pedido.vl_total", "cota_pedido.nome", "cota_pedido.mensagem", "cota_pedido.created_at as data_compra", "cota_pagamento.ps_status"));
    }

    public static function getTotalPedidoBySiteId($site_id)
    {
        return static::join("site_cota", "cota_pedido.cota_id", "=", "site_cota.id")
            ->where('site_cota.site_id', '=', $site_id)
            ->sum("cota_pedido.quantidade");
    }

    public static function getTotalVendidoBySiteId($site_id)
    {
        return static::join("site_cota", "cota_pedido.cota_id", "=", "site_cota.id")
            ->join("cota_pagamento", "cota_pagamento.cota_pedido_id", "=", "cota_pedido.id")
            ->where('site_cota.site_id', '=', $site_id)
            ->where('cota_pagamento.ps_status', '=', "PAID")
            ->sum("cota_pedido.quantidade");
    }
}