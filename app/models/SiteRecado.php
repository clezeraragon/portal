<?php

class SiteRecado extends BaseModel
{
    protected $table = 'site_recado';

    protected $guarded = array('id');

    public static $rules = array(
        'site_id' => 'required|numeric',
        'nome' => 'required',
        'assunto' => 'required',
        'recado' => 'required',
        'status' => 'required'
    );

    public function getGrid($site_id)
    {
        return $this->where('site_id', '=', $site_id)->get();
    }

    public static function getRecadosBySiteId($site_id)
    {
        return static::where('site_id', '=', $site_id)->get();
    }

    public function getRecadosByUser($user_id)
    {
        return $this->where('site.user_id', '=', $user_id)
            ->join("site", "site_recado.site_id", "=", "site.id")
            ->get(array("site.titulo_site", "site_recado.*"));
    }
}