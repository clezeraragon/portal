<?php

class BaseModel extends Eloquent
{
    /**
     * Objeto File do form
     * @var
     */
    protected $img;

    /**
     * Dir base para salvar imagens
     * @var string
     */
    protected  $dir_store_img = "/assets/imagens/";

	public static function validate($data)
	{
		return Validator::make($data, static::$rules);
	}

    /**
     * Adiciona rules as rules padrao
     * @param array $rules
     */
    public static function addRules(array $rules){
        foreach($rules as $key => $value){
            static::$rules[$key] = $value;
        }
    }

    /**
     * Set status default no input de cadastro
     * @param array $input  Dados do form
     * @return array
     */
    public function setDefaultStatus(array $input)
    {
        $input['status'] = 1;
        return $input;
    }

    /**
     * Set objeto File
     * @param $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return string - nome img + extensao
     */
    public function getImgPath()
    {
        return $this->dir_store_img . $this->dir_model_img . $this->img->getClientOriginalName();
    }

    /**
     * @param $nm_arq - Nome do Arquivo com extensão
     */
    public function upload_img($nm_arq)
    {
        $this->img->move(public_path() . $this->dir_store_img . $this->dir_model_img , $nm_arq);
    }

    public function setnull($input)
    {
        foreach ($input as &$value) {
            if ($value === '') $value = null;
        }
        return $input;

    }

}