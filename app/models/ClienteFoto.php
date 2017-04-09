<?php

class ClienteFoto extends BaseModel
{
    protected $table = 'cliente_foto';

    protected $guarded = array('id');

    protected $fillable = array('cliente_id', 'path_img', 'titulo', 'descricao', 'ordem', 'status');

    public static $rules = array(
        'cliente_id' => 'required|numeric',
        'path_img' => 'required|unique:cliente_foto,path_img', //RCL-007
        'titulo' => 'required|max:100',
        'descricao' => 'required',
        'ordem' => 'required|numeric',
        'status' => 'required|numeric',
    );

    public $dir_model_img = "cliente/foto/"; //RCL-006

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('cliente' , 'cliente_foto.cliente_id', '=' , 'cliente.id')
            ->get(array('cliente.nm_nome_fantasia as nome_fantasia', 'cliente_foto.id', 'cliente_foto.titulo', 'cliente_foto.descricao', 'cliente_foto.ordem', 'cliente_foto.status', 'cliente_foto.updated_at')
            );
    }

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT') {
            $id = Request::segment(3);
            self::$rules['path_img'] .= ",$id";

            if(!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
        }

        return Validator::make($data, self::$rules);
    }

    /**
     * @param $cliente_id
     * RCL-006
     */
    public function setDirModelImg($cliente_id)
    {
        $this->dir_model_img = $this->dir_model_img . $cliente_id . "/";
    }

    public static function getGaleryByClient($client_id)
    {
        return static::orderBy('ordem', 'ASC')->where('cliente_id', '=', $client_id)->get();
    }

}