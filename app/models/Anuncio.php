<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 23/02/2015
 * Time: 15:27
 */
class Anuncio extends BaseModel
{

    protected $table = 'anuncio';
    protected $guarded = array('id');


    public static $rules = array(

        'anuncio' => 'required',
        'path_img' => 'required',
        'link' => 'required'

    );

    public static function validate($data)
    {
        if (Request::getMethod() == 'PUT') {

        }
        return Validator::make($data, self::$rules);
    }


    public function BannersDinamicos()
    {

        $banners = $this->where('anuncio.status', '=', 1)->get()->toArray();

        return Util::shuffle_assoc($banners);


    }



}