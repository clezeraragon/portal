<?php

namespace Admin;

use FidelidadeResgate; //Por CRUD
use Input, Redirect, Lang;

class FidelidadeResgateController extends CrudController {

    /**
     * Classe model FidelidadeResgate
     * @var FidelidadeResgate
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(FidelidadeResgate $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Resgate",
            'titles' => "Resgates",
            'route' => 'admin/fidelidade-resgate',
            'view_dir' => 'admin.fidelidade-resgate'
        );
    }


    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $input['frete'] = \Util::numberToMySQL($input['frete']);

        $this->model->find($id)->update($input);

        return Redirect::to($this->data['route'])
            ->with('success', Lang::get('crud.update.success'));
    }

}
