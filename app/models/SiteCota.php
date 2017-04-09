<?php

class SiteCota extends BaseModel
{
    protected $table = 'site_cota';

    protected $guarded = array('id');

    public static $rules = array(
        'site_id' => 'required|numeric',
        'produto' => 'required|min:5|max:60', //RSO-007
        'path_img' => 'required|unique:site_cota,path_img', //RSO-005
        'qtd_cota' => 'required|numeric',
        'vl_unit' => 'required',
        'vl_total' => 'required',
        'status' => 'required|numeric'
    );

    protected  $dir_store_img = "/sonhador/";
    public $dir_model_img = "site/";

    protected  $limite_cotas = 30; //RSO-016

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['path_img'] = "unique:site_cota,path_img,$id";
        }

        return Validator::make($data, self::$rules);
    }

    public static function validateImage($data)
    {
        return Validator::make($data, array('path_img' => 'image|max:2000')); //RSO-017
    }

    public function getGrid($site_id)
    {
        return $this->where('site_id', '=', $site_id)->get();
    }

    public function getCotasToSite($site_id)
    {
        return $this->where('site_id', '=', $site_id)
            ->where('status', '=', 1) //RSO-018
            ->get();
    }

    public function setDirModelImg($id)
    {
        $this->dir_model_img = $this->dir_model_img . $id . "/cotas/";
    }

    //RSO-016
    public function checkLimiteCotasBySite($site_id)
    {
        $qtd_cotas = $this->where('site_id', '=', $site_id)->get()->count();

        //subtrai a cota da edição
        if(Request::getMethod() == 'PUT') {
            $qtd_cotas -=1;
        }

        if($qtd_cotas < $this->limite_cotas){
            return true;
        }
        else{
            return false;
        }
    }

    public function verificaDependencia($cota_id)
    {
        $qtd_pedido = SiteCotaPedido::getQuantidadeTotalPedido($cota_id);

        if($qtd_pedido){
            return "Esta cota possui um pedido, por isso não é possível excluí-la";
        }
        return false;
    }


}