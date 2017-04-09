<?php

class CupomSolicitacoes extends BaseModel
{
    protected $table = 'cupom_solicitacoes';

    protected $guarded = array('id');

    public static $rules = array(
        'cupom_id' => 'required|numeric',
        'user_id' => 'required|numeric'
    );

    public function cadastraSolicitacao($cupom_id)
    {
        $this->create(array(
            "cupom_id" => $cupom_id,
            "user_id" => Sentry::getUser()->id,
            "ip" => Request::getClientIp(),
            "user_agent" => $_SERVER['HTTP_USER_AGENT']
        ));
    }

    public function getGrid()
    {
        $user = Sentry::getUser()->perfil->perfil;

        $get = ["users.email", "cliente.nm_nome_fantasia as cliente", "cupom.titulo", "cupom_solicitacoes.*"];

        $results =  $this->join("users", 'cupom_solicitacoes.user_id', '=', 'users.id')
                         ->join("cupom", 'cupom_solicitacoes.cupom_id', '=', 'cupom.id')
                         ->join("cliente", 'cupom.cliente_id', '=', 'cliente.id');

            if ($user === "Vendedor") {
                $results->join("vendedor", 'cliente.vendedor_id', '=', 'vendedor.id')->where('vendedor.user_id', Sentry::getUser()->id);
            }
        return $results->get($get);
    }
}