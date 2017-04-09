<?php

namespace Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use View, Redirect, Input, Exception, Lang; // Padrao
use Sentry, GuiaEmpresa, GuiaPlano; //Por CRUD

class GuiaEmpresaController extends BaseController {

    /**
     * Classe model GuiaEmpresa
     * @var GuiaEmpresa
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(GuiaEmpresa $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Guia de Empresa",
            'titles' => "Guia de Empresas",
            'route' => 'admin/guia-empresa',
            'view_dir' => 'admin.guia-empresa'
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

        $input['dt_ini'] = \Util::toMySQL($input['dt_ini']);
        $input['dt_fim'] = \Util::toMySQL($input['dt_fim']);

        //valida regras rules
        $validator = $this->model->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            //valida Regra de duplicidade
            $hasDuplicate = $this->model->hasDuplicate($input, null);
            if($hasDuplicate) {
                return Redirect::back()
                    ->withInput()
                    ->with('error',  Lang::get('guiaempresa.create.duplicate'));
            } else {

                $guiaPlano = new GuiaPlano();
                //valida Regra de limite de empresas em um plano
                $checkLimitePlano = $guiaPlano->checkLimitePlano($input['plano_id'], null);
                if($checkLimitePlano <= 0) {
                    return Redirect::back()
                        ->withInput()
                        ->with('error',  Lang::get('guiaempresa.create.limit'));
                }  else {

                    $this->model->create($input);

                    return Redirect::to($this->data['route'])
                        ->with('success', Lang::get('crud.create.success'));
                }
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

        $input['dt_ini'] = \Util::toMySQL($input['dt_ini']);
        $input['dt_fim'] = \Util::toMySQL($input['dt_fim']);

        //valida regras rules
        $validator = $this->model->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {

            //Regra deve ser habilitada se a trava de edição dos combos forem retiradas do formulario
            //valida Regra de duplicidade
            $hasDuplicate = $this->model->hasDuplicate($input, $id);
            if($hasDuplicate) {
                return Redirect::back()
                    ->withInput()
                    ->with('error',  Lang::get('guiaempresa.create.duplicate'));
            } else {

                $guiaPlano = new GuiaPlano();
                //valida Regra de limite de empresas em um plano
                $checkLimitePlano = $guiaPlano->checkLimitePlano($input['plano_id'], $id);
                if ($checkLimitePlano <= 0) {
                    return Redirect::back()
                        ->withInput()
                        ->with('error', Lang::get('guiaempresa.update.limit'));
                } else {

                    $this->model->find($id)->update($input);

                    return Redirect::to($this->data['route'])
                        ->with('success', Lang::get('crud.update.success'));
                }
            }
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

    public function getGaleriaFotos($id)
    {
        $guia = $this->model->find($id);

        $fotos_ids = array();
        if($guia->guiaFotos) {
            foreach ($guia->guiaFotos as $foto) {
                $fotos_ids[] = $foto->id;
            }
        }

        $this->layout->content = View::make($this->data['view_dir'] . '.fotos', compact('guia'))
            ->with(array(
                'data' => $this->data,
                'fotos_ids' => $fotos_ids
            ));
    }

    public function postGaleriaFotos($guia_id)
    {
        $guia = $this->model->find($guia_id);

        $fotos_ids = array();
        if(Input::get('fotos_ids')){
            $fotos_ids = Input::get('fotos_ids');
        }

        //RGE-013
        if(count($fotos_ids) > $guia->qtd_imagem)
        {
            return Redirect::back()
                ->withInput()
                ->with('error',  Lang::get('guiaempresa.galeriafotos.limit'));
        }  else {

            $guia->guiaFotos()->sync($fotos_ids);

            $input['foto_id'] = Input::get('destaque');
            $guia->update($input);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('guiaempresa.galeriafotos.success'));
        }
    }

    public function getGaleriaVideos($id)
    {
        $guia = $this->model->find($id);

        $videos_ids = array();
        if($guia->guiaVideos) {
            foreach ($guia->guiaVideos as $video) {
                $videos_ids[] = $video->id;
            }
        }

        $this->layout->content = View::make($this->data['view_dir'] . '.videos', compact('guia'))
            ->with(array(
                'data' => $this->data,
                'videos_ids' => $videos_ids
            ));
    }

    public function postGaleriaVideos($guia_id)
    {
        $guia = $this->model->find($guia_id);

        $videos_ids = array();
        if(Input::get('videos_ids')){
            $videos_ids = Input::get('videos_ids');
        }

        //RGE-014
        if(count($videos_ids) > $guia->qtd_video)
        {
            return Redirect::back()
                ->withInput()
                ->with('error',  Lang::get('guiaempresa.galeriavideos.limit'));
        }  else {

            $guia->guiaVideos()->sync($videos_ids);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('guiaempresa.galeriavideos.success'));
        }
    }


    public function getAnuncioComboboxByCliente($cliente_id)
    {
        $anuncios = GuiaEmpresa::getAnunciosByClienteId($cliente_id);

        $html = '<option value="">Selecione uma opção</option>';
        if($anuncios) {
            foreach ($anuncios as $key => $value) {
                $html .= "<option value=\"{$key}\">{$value}</option>";
            }
        }
        return $html;
    }

}
