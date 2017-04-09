<?php

namespace Admin;

use ClienteHistoricoContato;
use Input, Redirect, Lang, View, Sentry;

class ClienteHistoricoContatoController extends BaseController {

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


    public function __construct(ClienteHistoricoContato $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Histórico de Contato",
            'titles' => "Histórico de Contatos",
            'route' => 'admin/cliente-historico-contato',
            'view_dir' => 'admin.cliente-historico-contato'
        );
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input += array("user_id" => Sentry::getUser()->id);

        $validator = $this->model->validate($input);
        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

            return Redirect::back()
                ->with('success', Lang::get('crud.create.success'));
        }
    }

}
