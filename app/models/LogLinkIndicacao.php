<?php

class LogLinkIndicacao extends BaseModel
{

    protected $table = 'log_link_indicacao';

    protected $guarded = array('id');

    public function getGrid()
    {
        return $this->all();
    }

    public function getTotalAcessoUnico($tempo = null)
    {
        if($tempo == "*"){
            return $this->where("st_link_valido", "=", 1)
                ->distinct()
                ->get(array("ip"))
                ->count();
        }
        else if(isset($tempo)) {
            return $this->where("st_link_valido", "=", 1)
                ->whereBetween("created_at", array(date('Y-m-d', strtotime('-'.$tempo.' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                ->distinct()
                ->get(array("ip"))
                ->count();
        }
        else{
            return $this->where("st_link_valido", "=", 1)
                ->whereBetween("created_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                ->distinct()
                ->get(array("ip"))
                ->count();
        }
    }
}