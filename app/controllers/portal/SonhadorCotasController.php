<?php

namespace Portal;

use View, Input, Redirect, Lang; // Padrao
use SiteCota;

class SonhadorCotasController extends BaseController {

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

    public function __construct(SiteCota $model)
    {
        $this->model = $model;
        $this->data = array(
            'title_pag' => "Sonhador Cotas",
            'title_seo' => "Sonhador Cotas",
            'description_seo' => "Sonhador Cotas",
            'keywords_seo' => "Sonhador Cotas",
            'view_dir' => 'portal.sonhador-cotas',
            'route' => 'site-sonhador/construtor/cotas'
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
        $input['vl_unit']  = \Util::numberToMySQL($input['vl_unit']);
        $input['vl_total'] = \Util::numberToMySQL($input['vl_total']);

        $input = $this->model->setDefaultStatus($input);

        //Regra de limite de cotas
        $limite = $this->model->checkLimiteCotasBySite($input['site_id']);
        if(!$limite){
            return Redirect::back()
                ->withInput()
                ->with('error',  Lang::get('sonhador.cadastro.limitecotas'));
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

            //Validação formulario
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
    public function update($siteid, $id)
    {
        $input = Input::all();
        $input['site_id']  = $siteid;
        $input['vl_unit']  = \Util::numberToMySQL($input['vl_unit']);
        $input['vl_total'] = \Util::numberToMySQL($input['vl_total']);

        //Regra de limite de cotas
        $limite = $this->model->checkLimiteCotasBySite($input['site_id']);
        if(!$limite){
            return Redirect::back()
                ->withInput()
                ->with('error',  Lang::get('sonhador.cadastro.limitecotas'));
        }

        //validação de imagem
        $validatorImage = $this->model->validateImage($input);
        if($validatorImage->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validatorImage)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            if(isset($input['path_img'])) {
                $this->model->setImg($input['path_img']);
                $this->model->setDirModelImg($input['site_id']);
                $input['path_img'] = $this->model->getImgPath();
            }
            else{
                unset($input['path_img']);
            }

            //Validação formulario
            $validator = $this->model->validate($input);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', Lang::get('crud.create.error'));
            } else {

                $this->model->find($id)->update($input);
                if(isset($input['path_img'])) {
                    $this->model->upload_img($input['path_img']); //move o arquivo
                }

                return Redirect::to($this->data['route'] . "/" . $siteid)
                    ->with('success', Lang::get('crud.create.success'));
            }
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
        $dependencias = $this->model->verificaDependencia($id);

        if(!$dependencias){
            try {
                $this->model->find($id)->delete();
                return Redirect::to($this->data['route'] . "/" . $site_id)
                    ->with('success', Lang::get('crud.destroy.success'));
            } catch (Exception $e) {

                return Redirect::to($this->data['route'] . "/" . $site_id)
                    ->with('error', Lang::get('crud.destroy.error'));
            }
        }
        else{
            return Redirect::back()
                ->with('error', $dependencias);
        }
    }

}
