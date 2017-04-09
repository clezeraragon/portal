<?php

class ClienteHistoricoContato extends BaseModel
{
    protected $table = 'cliente_historico_contato';

    protected $guarded = array('id');

    public static $rules = array(
        'cliente_id' => 'required|numeric',
        'user_id' => 'required|numeric',
        'mensagem' => 'required',
    );


    /*
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid($cliente_id)
    {
        return $this->where("cliente_id", "=", $cliente_id)
            ->join("cliente", 'cliente_historico_contato.cliente_id', '=', 'cliente.id')
            ->join("users", 'cliente_historico_contato.user_id', '=', 'users.id')
//            ->orderBy("created_at", "DESC")
            ->get(array("cliente.nm_nome_fantasia as cliente", "users.email as usuario", "cliente_historico_contato.*"));
    }



}