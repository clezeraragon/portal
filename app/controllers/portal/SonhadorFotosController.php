<?php

namespace Portal;

use View, Input, Redirect, Lang; // Padrao
use SiteFoto;

class SonhadorFotosController extends BaseController {

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    /**
     * Classe model
     * @var
     */
    protected $model;

    public function __construct(SiteFoto $model)
    {
        $this->model = $model;
        $this->data = array(
            'title_pag' => "Sonhador Fotos",
            'title_seo' => "Sonhador Fotos",
            'description_seo' => "Sonhador Fotos",
            'keywords_seo' => "Sonhador Fotos",
            'view_dir' => 'portal.sonhador-fotos',
            'route' => 'site-sonhador/construtor/fotos'
        );
    }

    public function index($siteid)
    {
        $result = $this->model->getGrid($siteid);

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result,
                'siteid' => $siteid
            ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($siteid)
    {
        $this->layout->content = View::make($this->data['view_dir'] . '.create')
            ->with(array(
                'data' => $this->data,
                'siteid' => $siteid
            ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($siteid)
    {
        $input = Input::all();
        $input['site_id']  = $siteid;

        $limite = $this->model->checkLimiteFotosBySite($input['site_id']);
        if(!$limite){
            return Redirect::back()
                ->withInput()
                ->with('error',  Lang::get('sonhador.cadastro.limitefotos'));
        }

        //validação de imagem
        $validatorImage = $this->model->validateImage($input);
        if($validatorImage->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validatorImage)
                ->with('error',  Lang::get('crud.create.error'));
        }
        else {
            $this->model->setImg($input['path_img']);
            $this->model->setDirModelImg($input['site_id']);
            $input['path_img'] = $this->model->getImgPath();

            $validator = $this->model->validate($input);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', Lang::get('crud.create.error'));
            } else {

                $this->model->create($input);
                $this->model->upload_img($input['path_img']);

                return Redirect::back()
                    ->with('success', Lang::get('crud.create.success'));
            }
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
    public function edit($siteid , $id)
    {
        try {
            $rs = $this->model->findOrFail($id);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('rs'))
                ->with(array(
                    'data' => $this->data,
                    'siteid' => $siteid
                ));
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
    public function update($site_id, $id)
    {
        $input = Input::all();
        $input['site_id'] = $site_id;

        $validator = $this->model->validate($input);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $this->model->find($id)->update($input);

            return Redirect::to($this->data['route'] . "/" . $site_id)
                ->with('success', Lang::get('crud.update.success'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($site_id, $id)
    {
        try {
            $this->model->find($id)->delete();
            return Redirect::to($this->data['route'] . "/" . $site_id)
                ->with('success', Lang::get('crud.destroy.success'));
        } catch (Exception $e) {

            return Redirect::to($this->data['route'] . "/" . $site_id)
                ->with('error', Lang::get('crud.destroy.error'));
        }
    }

}
