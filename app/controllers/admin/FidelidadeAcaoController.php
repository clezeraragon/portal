<?php

namespace Admin;

use FidelidadeAcao; //Por CRUD
use Input, Redirect, Lang;

class FidelidadeAcaoController extends CrudController {

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

    public function __construct(FidelidadeAcao $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Ação",
            'titles' => "Ações",
            'route' => 'admin/fidelidade-acao',
            'view_dir' => 'admin.fidelidade-acao'
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

        $input["st_editar"]  = 1;
        $input["st_excluir"] = 1;

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


}
