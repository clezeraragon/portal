<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 23/02/2015
 * Time: 15:27
 */
class UserDados extends BaseModel
{

    protected $table = 'users_dados';
    protected $guarded = array('id');


    public function getDadosByUserId($user_id)
    {
        return $this->where("user_id", "=", $user_id)->get()->first(); //considerando que o usuario só tera um registro nessa tebala pela regra de unique no campo user_id
    }



}