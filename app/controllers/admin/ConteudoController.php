<?php

namespace Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use View, Redirect, Input, Exception, Lang; // Padrao
use Sentry, Conteudo; //Por CRUD

class ConteudoController extends BaseController
{

    /**
     * Classe model Conteudo
     * @var Conteudo
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Conteudo $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Conteúdo",
            'titles' => "Conteúdos",
            'route' => 'admin/conteudo',
            'view_dir' => 'admin.conteudo'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $conteudos = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'conteudos' => $conteudos
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
        $extensaoDaImg = $input['path_img']->getClientOriginalExtension();
        $input['nome_img'] = $input["url"] . "." . $input['path_img']->getClientOriginalExtension();

        //Imagem destaque - será refatorado
//        $this->model->setImg($input['path_img']);
//        $input['path_img'] = $this->model->getImgPath();

        $input['path_img'] = "/assets/imagens/conteudo/";

        $validator = $this->model->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $conteudo = $this->model->create($input);
            //$this->model->upload_img($input['path_img']);

            $redimensonaImagem = new \RedimensionaImagem(Input::file('path_img'));
            $redimensonaImagem->redimensionarImagem($conteudo->id, $input["url"], $extensaoDaImg);
            $path_img = "/assets/imagens/conteudo/";
            $conteudo->where("id", $conteudo->id)->update(["path_img" => $path_img]);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $conteudo = $this->model->findOrFail($id);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('conteudo'))->with(array('data' => $this->data));
        } catch (ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();

        if (isset($input['path_img'])) {
            $input['path_img'] = "/assets/imagens/conteudo/";
        } else {
            unset($input['path_img']);
        }

        $validator = $this->model->validate($input);
        $contemViculo = $this->model->getConteudoVinculado($id, $input['status_id']);

        if ($contemViculo) {
            return Redirect::back()
                ->with('warning',
                    'Esse conteúdo vai mudar seu' . '<strong style="color:red"> status, </strong>' . 'por favor desvincular o mesmo do módulo' .
                    '<strong class="text-uppercase" style="color:red"> CMS ' . $contemViculo["nome"] . '</strong> ' .
                    'se prefererir clique em ' . link_to($contemViculo['rota'], 'Editar',array('style'=>'color:red')));
        }
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));

        } else {
            $conteudo = $this->model->find($id);
            $conteudo->update($input);

            if (isset($input['path_img'])) {

                $redimensonaImagem = new \RedimensionaImagem(Input::file('path_img'));
                $redimensonaImagem->redimensionarImagem($conteudo["id"], $conteudo["url"], Input::file('path_img')->getClientOriginalExtension());

//                $path_img = "/assets/imagens/conteudo/";
//                $conteudo->where("id", $conteudo["id"])->update(["path_img"=>$path_img]);
                // $this->model->upload_img($input['path_img']); //move o arquivo
            }

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
