<?php

namespace Admin;
use Bllim\Datatables\Datatables;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View, Redirect, Input, Exception, Util, Lang,HTML,Form;// Padrao
use Sentry, User; //Por CRUD

class UsuariosController extends BaseController
{

    /**
     * Classe model User
     * @var User
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(User $model,\AuthController $authController)
    {
        $this->model = $model;
        $this->auth = $authController;
        $this->data = array(
            'title' => "Usuário",
            'titles' => "Usuários",
            'route' => 'admin/usuario',
            'view_dir' => 'admin.usuarios'
        );
    }

    public function index()
    {
        $usuarios = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'usuarios' => $usuarios
            ));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit($id)
    {
        try {

            $usuario = $this->model->findOrFail($id);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('usuario'))->with(array('data' => $this->data));
        } catch (ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }
    }

    public function update($id)
    {
        $input = Input::all();
        $input['first_name'] = User::formataNome(Input::get('first_name'));
        $input['last_name']  = User::formataNome(Input::get('last_name'));
        $input['email']      = User::formataEmail(Input::get('email'));

        $validator = $this->model->validateUser($input);

        $input['dt_nascimento'] = Util::toMySQL(Input::get('dt_nascimento'));

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            if ($input['password'] === '') {
                unset($input['password']);
            }
            unset($input['password_confirm']);

            $user = Sentry::getUserProvider()->findById($id);
            $user->update($input);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->model->find($id)->delete();
            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.destroy.success'));
        } catch (Exception $e) {

            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.destroy.error'));
        }
    }
    public function getReenviarEmail($id)
    {
       return $this->auth->postReenviarEamil($id,$this->data['route']);
    }

    public function getAjaxUser()
    {

        $get_users = $this->model->join('usuario_perfis', 'users.perfil_id', '=', 'usuario_perfis.id')
            ->join('gamefication', 'users.gamefication_id', '=', 'gamefication.id')
            ->leftjoin('users as indicador_fid', 'users.fidelidade_indicador_id', '=', 'indicador_fid.id')
            ->leftjoin('usuario_promotor', 'usuario_promotor.user_id', '=', 'users.id')
            ->select(array('usuario_perfis.perfil as perfil','users.cpf', 'users.email', 'users.first_name', 'users.last_name', 'users.created_at',
                'users.genero', 'users.telefone', 'users.last_login', 'users.utm_campaign', 'users.utm_source',
                'users.utm_medium', 'users.utm_content', 'users.utm_term', 'users.st_portal_antigo','users.dt_nascimento',
                'users.activated', 'users.activated_at', 'users.st_newsletter','users.st_email_boasvindas','users.id',
                'gamefication.nome as gamefication_nome',
                \DB::raw("CONCAT(indicador_fid.first_name,' ',indicador_fid.last_name) as indicador_Club"),
                'usuario_promotor.status as st_promotor'));

        return Datatables::of($get_users, true)

            ->remove_column('id')
            ->edit_column('created_at', function ($usuario) {
                return Util::toTimestamps($usuario->created_at);
            })
            ->edit_column('activated', function ($usuario) {
                return Util::formatBoolean($usuario->activated);
            })
            ->edit_column('updated_at', function ($usuario) {
                return Util::toTimestamps($usuario->updated_at);
            })
            ->edit_column('st_newsletter', function ($usuario) {
                return Util::formatBoolean($usuario->st_newsletter);
            })
            ->edit_column('last_login', function ($usuario) {
                return ($usuario->last_login) ? Util::toTimestamps($usuario->last_login) : '';
            })
            ->edit_column('activated_at', function ($usuario) {
                return ($usuario->activated_at) ? Util::toTimestamps($usuario->activated_at) : '';
            })
            ->add_column('indicador_Club', function ($usuario) {
                return $usuario->indicador_Club;
            })
            ->edit_column('dt_nascimento', function ($usuario) {
                return Util::toView($usuario->dt_nascimento);
            })
            ->edit_column('st_portal_antigo', function ($usuario) {
                return Util::formatBoolean($usuario->st_portal_antigo);
            })
            ->edit_column('st_email_boasvindas', function ($usuario) {
                return Util::formatBoolean($usuario->st_email_boasvindas);
            })
            ->edit_column('st_promotor', function ($usuario) {
                return Util::formatBoolean($usuario->st_promotor);
            })
            ->add_column('editar', function ($model) {
                $link = link_to($this->data['route'] . '/' . $model->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar'));
                return $link;
            })
            ->add_column('excluir', function ($model) {
                $link = HTML::decode(Form::open(array('url' => $this->data['route'] . '/' . $model->id, 'method' => 'delete')) .
                    Form::button('Excluir', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Excluir')) . Form::close());
                return $link;
            })
            ->add_column('email_activated', function ($model) {
                $link = (!$model->activated) ? HTML::decode(Form::open(array('url' => $this->data['route'] . '/' . $model->id, 'method' => 'GET')) .
                    Form::button('E-mail Ativação', array('type' => 'submit', 'class' => 'btn btn-info btn-sm', 'title' => 'Reenviar Email')) . Form::close()) : '';
                return $link;
            })
            ->make(true);
    }

}