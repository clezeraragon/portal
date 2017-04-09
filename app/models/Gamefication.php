<?php

class Gamefication extends BaseModel
{
    protected $table = 'gamefication';

    protected $guarded = array('id');

    public $dir_model_img = "gamefication/";

    public static $rules = array(
        'nome' => 'required|min:5|max:100|unique:gamefication,nome',
        'fator' => 'required|numeric|min:1',
        'pontos' => 'required|numeric',
        'nivel' => 'required|unique:gamefication,nivel',
        'path_img' => 'required|unique:gamefication,path_img',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->all();
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
            self::$rules['nome'] .= ",$id";
            self::$rules['nivel'] .= ",$id";
            self::$rules['path_img'] .= ",$id";

            if(!isset($data['path_img'])) {
                self::$rules['path_img'] = "";
            }
        }

        return Validator::make($data, self::$rules);
    }


    public static function getNivelPadrao(){
        return 1;
    }

    /**
     * @param $pontos - numero de pontos da acao em processamento
     * @param $user_id
     * @return mixed - numero de pontos multiplicado pelo fator
     */
    public function multiplicadorGamefication($pontos, $user_id)
    {
        $gamefication_nivel = User::find($user_id)->gamefication_id;
        $gamefication_fator = $this->find($gamefication_nivel)->fator;

        return ($pontos * $gamefication_fator);
    }

    /**
     * Verifica e promove o usuario de nivel no gamefication
     * @param $user_id
     */
    public function verificaPromocaoNivelUsuario($user_id)
    {
        $movFid = new FidelidadeMovimentacao();
        $user   = User::find($user_id);

        $pontosAdquiridos = $movFid->getTotalByTipo($user_id, "entrada");

        $proximoNivel = $this->getProximoNivel($user->gamefication_id);

        if(isset($proximoNivel->id))
        {
            if ($pontosAdquiridos >= $proximoNivel->pontos) {
                $user->update(array("gamefication_id" => $proximoNivel->id));
            }
        }
    }

    /**
     * Seleciona o proximo nivel no gamefication apartir de um ID de gamefication
     * @param $id
     * @return mixed
     */
    public function getNivelAnterior($id)
    {
        $gameficationNivelAtual = $this->find($id);

        return $this->orderBy("nivel" , "DESC")->where("nivel" , "<", $gameficationNivelAtual->nivel)->first();
    }


    public function getNivelAtual($id)
    {
        return $this->find($id);
    }


    public function getProximoNivel($id)
    {
        $gameficationNivelAtual = $this->find($id);

        return $this->orderBy("nivel")->where("nivel" , ">", $gameficationNivelAtual->nivel)->first();
    }

}