<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 09/12/2014
 * Time: 11:18
 */
class Video extends BaseModel
{


    protected $table = 'video';
    protected $guarded = array('id');
    protected $fillable = array('cliente_id', 'link', 'titulo','status','descricao');

    public static $rules = array(
        'cliente_id' => 'numeric',
//        'link' => array('required','regex:/^((http|https):\/\/)?([a-z0-9\-]+\.)?[a-z0-9\-]+\.[a-z0-9]{2,4}(\.[a-z0-9]{2,4})?(\/.*)?$/i', 'unique:video,link'), //RVI-001
        'link' => 'required|unique:video,link',
        'titulo' => 'required|min:5'

    );

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        //Quando for update, permite ter o mesmo nome de perfil, desde que seja o mesmo id
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['link'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->leftjoin("cliente", 'video.cliente_id', '=', 'cliente.id')

                    ->get(array('video.*', 'cliente.nm_nome_fantasia as cliente'

            ));
    }
    public function clientes()
    {

            return $this->belongsTo('Cliente');
//          return $this->hasMany('Cliente','id');
    }

    public static function getGaleryByClient($client_id)
    {
        return static::orderBy('titulo', 'ASC')->where('cliente_id', '=', $client_id)->get();
    }
    public function cms_bloco()
    {
        return $this->belongsToMany('Cms_bloco', 'cms_bloco_video_item', 'bloco_id', 'video_id');
    }

} 