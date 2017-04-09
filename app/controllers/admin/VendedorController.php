<?php

namespace Admin;

use Cartalyst\Sentry\Facades\FuelPHP\Sentry;
use Vendedor; //Por CRUD
use Input, Redirect, Lang;

class VendedorController extends CrudController {

    /**
     * Classe model SiteTipo
     * @var SiteTipo
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Vendedor $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Vendedor",
            'titles' => "Vendedores",
            'route' => 'admin/vendedor',
            'view_dir' => 'admin.vendedor'
        );
    }

    public function store()
    {
        $input = Input::all();



        $input = $this->model->setnull($input);
        $input = $this->model->setDefaultStatus($input);

        $validator = $this->model->validate($input);

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
    }
    public function update($id)
    {
        $input = Input::all();

        $input = $this->model->setnull($input);

        $validator = $this->model->validate($input);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $this->model->find($id)->update($input);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }
}
