<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 13/05/2015
 * Time: 11:32
 */

class LogPromotor  extends  BaseModel{


    protected $table = 'usuario_promotor_aceite_log';

    protected $guarded = array();

    protected $fillable = array('usuario_promotor_id','ip','user_agent');

//    public static $rules = array(
//        'usuario_promotor_id' => 'required|numeric|unique:usuario_promotor_aceite_log,usuario_promotor_id',
//        'ip' => '',
//        'user_agent' => ''
//
//    );
}