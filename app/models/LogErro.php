<?php

class LogErro extends BaseModel
{
    protected $table = 'log_erros';

    protected $guarded = array('id');

    public static function savarLogErro($url, $tipo)
    {
//        dd(array(
//            "url" => $url,
//            "tipo" => $tipo,
//            "user_id" => (Sentry::check()) ? Sentry::getUser()->id : "NULL",
//            "user_agent" => $_SERVER['HTTP_USER_AGENT'],
//            "ip" => Request::getClientIp(),
//        ));

        static::create(array(
            "url" => $url,
            "tipo" => $tipo,
            "user_id" => (Sentry::check()) ? Sentry::getUser()->id : "NULL",
            "user_agent" => $_SERVER['HTTP_USER_AGENT'],
            "ip" => Request::getClientIp(),
        ));
    }

}