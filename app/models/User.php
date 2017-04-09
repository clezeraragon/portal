<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $guarded = array('id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Regras de validação de formulario
     * @var array
     * RUS-001
     */
    public static $rules = array(
        'first_name'       => 'required|min:3',
        'last_name'        => 'required|min:3',
        'email'            => 'required|email|unique:users,email', //RUS-002
        'email_confirm'    => 'required|email|same:email',
        'password'         => 'required|between:5,32', //RUS-003
        'password_confirm' => 'required|same:password',
        'dt_nascimento'    => 'required|date_format:d/m/Y|after:01/01/1900', //RUS-013
        'genero'           => 'required|max:1',
        'cpf'              => 'cpf|unique:users,cpf',
        'telefone'         => 'min:13|max:14',
//        'concorda'         => 'required',
        'st_newsletter'    => ''
    );

    public static function addRules(array $rules){
        foreach($rules as $key => $value){
            self::$rules[$key] = $value;
        }
    }

    public static function getRules(){
        return self::$rules;
    }

    /**
     * Valida formulario
     * @param $data - input form
     * @return mixed
     */
    public function validateAll($data, $id)
    {
        //Quando for update, permite ter o mesmo nome de perfil, desde que seja o mesmo id
        if(Request::getMethod() == 'PUT') {

            self::$rules['cpf'] .= ",$id";

            unset(self::$rules['concorda']);
            unset(self::$rules['email_confirm']);

            if($data['password'] === '') {
                unset(self::$rules['password']);
                unset(self::$rules['password_confirm']);
            }
        }
        return Validator::make($data, self::$rules);
    }

    /**
     * Valida formulario admin
     * @param $data - input form
     * @return mixed
     * RUS-014
     */
    public function validateUser($data)
    {
        $id = Request::segment(3);

        self::$rules['email'] .= ",$id";

        return  $this->validateAll($data, $id);
    }

    /**
     * Valida formulario portal - painel
     * @param $data - input form
     * @return mixed
     * RUS-014
     */
    public function validateUserPortal($data)
    {
        self::$rules['email'] = "";

        return  $this->validateAll($data, Sentry::getUser()->id);
    }

    /**
     * Valida os dados para completar o cadastro e participar do clube de vantagens
     * @param $data
     * @return mixed
     */
    public function validateDadosFidelidade($data)
    {
        $rules = array(
            'telefone' => self::$rules['telefone']
        );
        if(isset($data['cpf'])){
            $rules += array(
                'cpf'      => self::$rules['cpf'] . ",",
            );
        }

        return Validator::make($data, $rules);
    }

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getGrid()
    {
        return $this->join('usuario_perfis', 'users.perfil_id', '=', 'usuario_perfis.id')
                    ->join('gamefication', 'users.gamefication_id', '=', 'gamefication.id')
                    ->leftjoin('users as indicador_fid', 'users.fidelidade_indicador_id', '=', 'indicador_fid.id')
                    ->leftjoin('usuario_promotor', 'usuario_promotor.user_id', '=', 'users.id')
                    ->get(array('usuario_perfis.perfil as perfil', 'gamefication.nome as gamefication_nome', 'indicador_fid.first_name as nome_indicador_fid',
                            'indicador_fid.last_name as sobrenome_indicador_fid', 'usuario_promotor.status as st_promotor', 'users.*'));
    }


    public function perfil()
    {
        return $this->belongsTo('Perfil', 'perfil_id');
    }


    public function interesses()
    {
        return $this->belongsToMany('UsuarioAssuntosInteresse', 'usuario_interesses','user_id',  'assunto_id');
    }

    /**
     * Seta o id do usuario comum do site
     * @return int - id do perfil
     */
    public static function getPerfilPadrao(){
        return 2; //RUS-004
    }


    public function setnull($input)
    {
        foreach ($input as &$value) {
            if ($value === '') $value = null;
        }
        return $input;

    }
    public static function comboboxUser()
    {

        $result = static::orderBy('email')->lists('email', 'id');
        return array('' => 'Selecione uma opção') + $result;
    }

    public static function formataNome($string)
    {
        return ucwords(strtolower(trim($string)));
    }

    public static function formataEmail($string)
    {
        return strtolower(trim($string));
    }


    public function getCadastroUsuarioByTime($tempo = null)
    {
        if($tempo == "*"){
            return $this->count();
        }
        else if(isset($tempo)) {
            return $this->whereBetween("created_at", array(date('Y-m-d', strtotime('-'.$tempo.' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                ->count();
        }
        else{
            return $this->whereBetween("created_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                ->count();
        }
    }

    public function getAtivacaoUsuarioByTime($tempo = null)
    {
        if($tempo == "*"){
            return $this->where("activated", "=", 1)
                        ->count();
        }
        else if(isset($tempo)) {
            return $this->where("activated", "=", 1)
                        ->whereBetween("activated_at", array(date('Y-m-d', strtotime('-'.$tempo.' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                        ->count();
        }
        else{
            return $this->where("activated", "=", 1)
                         ->whereBetween("activated_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                         ->count();
        }
    }

    public function getCadastroFidelidadeByTime($tempo = null)
    {
        if($tempo == "*"){
            return $this->whereNotNull("fidelidade_indicador_id")
                ->count();
        }
        else if(isset($tempo)) {
            return $this->whereNotNull("fidelidade_indicador_id")
                ->whereBetween("created_at", array(date('Y-m-d', strtotime('-'.$tempo.' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                ->count();
        }
        else{
            return $this->whereNotNull("fidelidade_indicador_id")
                ->whereBetween("created_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                ->count();
        }
    }
}
