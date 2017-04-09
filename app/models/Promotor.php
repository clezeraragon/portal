<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 23/04/2015
 * Time: 15:08
 */
class Promotor Extends BaseModel
{

    protected $table = 'usuario_promotor';
    protected $fillable = array('user_id', 'responsavel_id', 'cliente_id', 'observacao', 'status','st_aceite_termo');
    protected $guarded = array('id');


    public static $rules = array(

        'user_id' => 'required|numeric|unique:usuario_promotor,user_id',
        'responsavel_id' => 'numeric',
        'cliente_id' => 'numeric',
        'observacao' => 'max:255',
        'status' => 'numeric'

    );

    public static function validate($data)
    {

        if (Request::getMethod() == 'PUT') {
            $id = Request::segment(3);

            self::$rules['user_id'] .= ",$id";

        }

        return Validator::make($data, self::$rules);
    }

    public function getGrid()
    {
        return $this->leftjoin("cliente", 'usuario_promotor.cliente_id', '=', 'cliente.id')
            ->join("users as promotor", "usuario_promotor.user_id", '=', 'promotor.id')
            ->leftjoin("users as proprietario", "usuario_promotor.responsavel_id", '=', 'proprietario.id')
            ->leftjoin("usuario_promotor_aceite_log", 'usuario_promotor_aceite_log.usuario_promotor_id', '=', 'usuario_promotor.id')
            ->get(array("proprietario.email as propri", "promotor.email as promo", "cliente.nm_nome_fantasia as cliente", "usuario_promotor_aceite_log.created_at as dt_aceite", "usuario_promotor.*"));
    }


    public function findPromotorAtivoByUserId($user_id)
    {
        return $this->join("users", "usuario_promotor.user_id", "=", "users.id")
            ->where("usuario_promotor.user_id", $user_id)
            ->where("usuario_promotor.status", 1)
            ->where("usuario_promotor.st_aceite_termo", 1)
            ->get(array("users.first_name", "users.last_name", "users.email", "usuario_promotor.*"))->first();
    }

    public function relatorioVendaMais()
    {
        $acao_id = 10; //Cadastro Promotor

        $movFid  = new FidelidadeMovimentacao();

        return $movFid->getRelatorioPontuacaoByAcao($acao_id);
    }


}