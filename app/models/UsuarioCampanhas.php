<?php

class UsuarioCampanhas extends BaseModel
{
    protected $table = 'usuario_campanhas';

    protected $guarded = array('id');

    protected $fillable = array('user_id', 'campanha_id');


    public function cadastraUsuarioCampanha($user_id, $campanha_id)
    {
        $this->create(array(
           "user_id" => $user_id,
           "campanha_id" => $campanha_id
        ));
    }

    public static function usuarioParticipou($user_id, $campanha_id)
    {
        $dados = static::where("user_id", "=",$user_id )->where("campanha_id", "=",$campanha_id)->get()->count();
        if($dados){
            return true;
        }
        return false;
    }
}