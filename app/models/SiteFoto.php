<?php

class SiteFoto extends BaseModel
{
    protected $table = 'site_foto';

    protected $guarded = array('id');

    public static $rules = array(
        'site_id' => 'required|numeric',
        'path_img' => 'required|unique:site_foto,path_img', //RSO-004
        'titulo' => 'required|min:5|max:80' //RSO-008
    );

    protected  $dir_store_img = "/sonhador/";
    public $dir_model_img = "site/";

    protected  $limite_fotos = 30;

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {

            self::$rules['path_img'] = "";
        }

        return Validator::make($data, self::$rules);
    }

    public static function validateImage($data)
    {
        return Validator::make($data, array('path_img' => 'image|max:2000')); //RSO-015
    }

    public function getGrid($site_id)
    {
        return $this->where('site_id', '=', $site_id)->get();
    }

    public function setDirModelImg($id)
    {
        $this->dir_model_img = $this->dir_model_img . $id . "/fotos/";
    }

    //RSO-014
    public function checkLimiteFotosBySite($site_id)
    {
        $qtd_fotos = $this->where('site_id', '=', $site_id)->get()->count();

        if($qtd_fotos < $this->limite_fotos){
            return true;
        }
        else{
            return false;
        }
    }

}