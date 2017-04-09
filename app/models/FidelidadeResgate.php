<?php

class FidelidadeResgate extends BaseModel
{
    protected $table = 'fid_resgate';

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required|numeric',
        'produto_id' => 'required|numeric',
        'status_resgate_id' => 'required|numeric',
        'nome' => 'required',
        'endereco' => 'required',
        'numero' => 'required',
        'cep' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'telefone' => 'required'
    );


    public function completaInput($input)
    {
        $input['status_resgate_id'] = 1; //ID - Em andamento
        $input['user_id'] = Sentry::getUser()->id;

        return $input;
    }

    public function getDadosResgateToEmail($resgate_id)
    {
        $dados = $this->where("fid_resgate.id", "=", $resgate_id)
                    ->join("produto", "fid_resgate.produto_id", "=", "produto.id")
                    ->join("users", "fid_resgate.user_id", "=", "users.id")
                    ->get(array("produto.nome as produto", "users.cpf", "fid_resgate.*"))->toArray();

        if(isset($dados[0])){
            return $dados[0];
        }
    }

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join("produto", "fid_resgate.produto_id", "=", "produto.id")
            ->join("fid_status_resgate", "fid_resgate.status_resgate_id", "=", "fid_status_resgate.id")
            ->join("users", "fid_resgate.user_id", "=", "users.id")
            ->get(array("produto.nome as produto", "fid_status_resgate.nome as status_resgate", "users.email", "fid_resgate.*"));
    }
}