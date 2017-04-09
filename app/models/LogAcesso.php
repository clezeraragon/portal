<?php

class LogAcesso extends BaseModel
{
    protected $table = 'usuario_log_acesso';

    protected $fillable = array('user_id','ip','user_agent', 'log');

    /**
     * Salva log de acesso do usuario no sistema
     * @param $user_id = id do usuario
     */
    public function savarLogAcesso($user_id)
    {
        $this->create(array(
            "user_id" => $user_id,
            "ip" => Request::getClientIp(),
            "user_agent" => $_SERVER['HTTP_USER_AGENT']
        ));
    }

    public function getLoginUsuarioByTime($tempo = null)
    {
        if($tempo == "*"){
            return $this->distinct()
                ->get(array("user_id"))
                ->count();
        }
        if(isset($tempo)) {
            return $this->whereBetween("created_at", array(date('Y-m-d', strtotime('-'.$tempo.' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                ->distinct()
                ->get(array("user_id"))
                ->count();
        }
        else{
            return $this->whereBetween("created_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                ->distinct()
                ->get(array("user_id"))
                ->count();
        }
    }

}