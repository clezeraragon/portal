<?php

namespace Admin;

use Cupom, CupomSolicitacoes, GuiaEmpresa;
use Input, Redirect, Lang, View;

class CupomController extends CrudController {

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

    public function __construct(Cupom $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Cupom",
            'titles' => "Cupons",
            'route' => 'admin/cupom',
            'view_dir' => 'admin.cupom'
        );
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input['dt_ini'] = \Util::toMySQL($input['dt_ini']);
        $input['dt_fim'] = \Util::toMySQL($input['dt_fim']);
        $input['status'] = 1;

        if(isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        }

        $input = $this->model->setnull($input);

        $validator = $this->model->validate($input);
        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

            if(isset($input['path_img'])) {
                $this->model->upload_img($input['path_img']);
            }

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $rs = $this->model->findOrFail($id);

            $guiaEmp = new GuiaEmpresa();

            $anuncios = array('' => 'Selecione uma opção');
            $anuncios_cliente = $guiaEmp->getAnunciosByClienteId($rs->cliente_id);
            if($anuncios_cliente) {
                $anuncios += $anuncios_cliente;
            }
//            dd($anuncios);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('rs'))->with(array(
                'data' => $this->data,
                'cliente_id' => $rs->cliente_id,
                'anuncios' => $anuncios
            ));
        }
        catch(ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
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

        if(isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        }
        else{
            unset($input['path_img']);
        }

        $input = $this->model->setnull($input);

        $validator = $this->model->validate($input);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $this->model->find($id)->update($input);

            if(isset($input['path_img'])) {
                $this->model->upload_img($input['path_img']); //move o arquivo
            }

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }


    public function getRelatorioSolicitacoes()
    {
        $cupom_solicitacoes = new CupomSolicitacoes();

        $result = $cupom_solicitacoes->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.relatorio-solicitacoes')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));

    }
}
