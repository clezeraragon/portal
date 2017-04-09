<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 21/01/2015
 * Time: 16:23
 */
class NewsLetter extends BaseModel
{


    protected $table = 'usuario_newsletter';

    protected $guarded = array('id');
    protected $fillable = array('user_id', 'email', 'status', 'ip', 'user_agent');

    public static $rules = array(
        'email' => 'required|email|unique:usuario_newsletter,email',
        'status' => 'required',

    );

    public static function validate($data)
    {
        //Quando for update, permite ter o mesmo nome de perfil, desde que seja o mesmo id
        if (Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
//            self::$rules['id'] .= ",$id";
            self::$rules['email'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }

    public static function completaInput($input)
    {
        $input["status"] = 1;
        $input["ip"] = Request::getClientIp();
        $input["user_agent"] = $_SERVER['HTTP_USER_AGENT'];
        if (Sentry::check()) {
            $input["user_id"] = Sentry::getUser()->id;
        }
        return $input;
    }

}