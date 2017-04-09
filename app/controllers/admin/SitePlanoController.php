<?php

namespace Admin;

use View, Redirect, Input, Lang; // Padrao
use SitePlano; //Por CRUD

class SitePlanoController extends CrudController {

    /**
     * Classe model SitePlano
     * @var SitePlano
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(SitePlano $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Plano",
            'titles' => "Planos",
            'route' => 'admin/site-plano',
            'view_dir' => 'admin.site-plano'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input = $this->model->setDefaultStatus($input);

        $input['valor'] = \Util::numberToMySQL($input['valor']);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();

        $input['valor'] = \Util::numberToMySQL($input['valor']);

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
