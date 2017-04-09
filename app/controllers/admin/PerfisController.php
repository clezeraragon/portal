<?php

namespace Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use View, Redirect, Input, Exception, Lang; // Padrao
use Sentry, Perfil; //Por CRUD

class PerfisController extends BaseController {

    /**
     * Classe model Perfil
     * @var Perfil
     */
	protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

	public function __construct(Perfil $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Perfil",
            'titles' => "Perfis",
            'route' => 'admin/perfil',
            'view_dir' => 'admin.perfis'
        );
    }

    public function index()
    {
        $perfis = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'perfis' => $perfis
        ));
    }

    public function create()
    {
        $this->layout->content = View::make($this->data['view_dir'] . '.create')->with(array('data' => $this->data));
    }

    public function store()
    {
        $input = Input::all();

        $validator = $this->model->validate($input);

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $perfil = $this->model->create($input);

            $perfil->funcionalidades()->sync(Input::get('funcionalidades_ids'));

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
    }

    public function edit($id)
    {
        try {
            $funcionalidades_ids = array();

            $perfil = $this->model->findOrFail($id);
            
            if($perfil->funcionalidades) {
                foreach ($perfil->funcionalidades as $funcionalidade) {
                    $funcionalidades_ids[] = $funcionalidade->id;
                }
            }

            $this->layout->content = View::make($this->data['view_dir'] . '.edit')
                ->with(array(
                    'data' => $this->data,
                    'perfil' => $perfil,
                    'funcionalidades_ids' => $funcionalidades_ids,
            ));
        } catch(ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }
    }

    public function update($id)
    {
        $input = Input::all();
        $validator = $this->model->validate($input);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $perfil = $this->model->find($id);

            $perfil->update($input);

            $perfil->funcionalidades()->sync(Input::get('funcionalidades_ids'));

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }

    public function destroy($id)
    {
        try {
            $funcionalidades_ids = array();

            $perfil = $this->model->find($id);

            foreach ($perfil->funcionalidades as $funcionalidade) {
                $funcionalidades_ids[] = $funcionalidade->id;
            }

            $perfil->funcionalidades()->detach($funcionalidades_ids);
            $perfil->delete();

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.destroy.success'));
        } catch (Exception $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.destroy.error'));
        }
    }

}