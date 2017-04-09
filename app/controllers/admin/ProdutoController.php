<?php

namespace Admin;

use Produto; //Por CRUD
use Input, Redirect, Lang;

class ProdutoController extends CrudController {

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

    public function __construct(Produto $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Produto",
            'titles' => "Produtos",
            'route' => 'admin/fidelidade-produto',
            'view_dir' => 'admin.fidelidade-produto'
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

        $this->model->setImg($input['path_img']);
        $input['path_img'] = $this->model->getImgPath();

        if(isset($input['path_arquivo'])) {
            $this->model->setArquivo($input['path_arquivo']);
            $input['path_arquivo'] = $this->model->getArquivoPath();
        }

        $validator = $this->model->validate($input);
        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);
            $this->model->upload_img($input['path_img']);

            if(isset($input['path_arquivo'])) {
                $this->model->upload_arquivo($input['path_arquivo']);
            }

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

        if(isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        }
        else{
            unset($input['path_img']);
        }

        if(isset($input['path_arquivo'])) {
            $this->model->setArquivo($input['path_arquivo']);
            $input['path_arquivo'] = $this->model->getArquivoPath();
        }
        else{
            if($input['produto_tipo_id'] == 1) {
                $input['path_arquivo'] = null;
            }
            else{
                unset($input['path_arquivo']);
            }
        }

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

            if(isset($input['path_arquivo'])) {
                $this->model->upload_arquivo($input['path_arquivo']);
            }

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }

}
