<?php

namespace Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use View, Redirect, Input, Exception, Lang; // Padrao
use Sentry, GuiaCategoria; //Por CRUD

class GuiaCategoriaController extends BaseController {

    /**
     * Classe model GuiaCategoria
     * @var GuiaCategoria
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(GuiaCategoria $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Categoria",
            'titles' => "Categorias",
            'route' => 'admin/guia-categoria',
            'view_dir' => 'admin.guia-categoria'
        );
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->content = View::make($this->data['view_dir'] . '.create')->with(array('data' => $this->data));
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

        if(isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
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

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('rs'))->with(array('data' => $this->data));
        }
        catch(ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
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

        if(isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        }
        else{
            unset($input['path_img']);
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

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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

}
