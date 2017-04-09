<?php

namespace Admin;

use FidelidadeCodigo; //Por CRUD
use Input, Redirect, Lang;

class FidelidadeCodigoController extends CrudController {

    /**
     * Classe model
     * @var
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(FidelidadeCodigo $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Código",
            'titles' => "Códigos",
            'route' => 'admin/fidelidade-codigo',
            'view_dir' => 'admin.fidelidade-codigo'
        );
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input['dt_ini']   = \Util::toMySQL($input['dt_ini']);
        $input['dt_fim']   = \Util::toMySQL($input['dt_fim']);
        $input['st_usado'] = 0;

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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $input['dt_ini'] = \Util::toMySQL($input['dt_ini']);
        $input['dt_fim'] = \Util::toMySQL($input['dt_fim']);

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
