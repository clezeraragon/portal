<?php

namespace Portal;

use View, Input, Redirect, Lang; // Padrao
use SiteRecado;

class SonhadorRecadosController extends BaseController {

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

    public function __construct(SiteRecado $model)
    {
        $this->model = $model;
        $this->data = array(
            'title_pag' => "Sonhador Recados",
            'title_seo' => "Sonhador Recados",
            'description_seo' => "Sonhador Recados",
            'keywords_seo' => "Sonhador Recados",
            'view_dir' => 'portal.sonhador-recados',
            'route' => 'site-sonhador/construtor/recados'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($site_id)
    {
        $input = Input::all();
        $input['site_id'] = $site_id;
        $input['status']  = 0;

        $validator = $this->model->validate($input);

        if($validator->fails()) {
            return Redirect::to("/sonhador/".$site_id."/#4")
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

            return Redirect::to("/sonhador/".$site_id."/#4")
                ->with('success', Lang::get('crud.create.success'));
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
        $input['status'] = 1;

        $this->model->find($id)->update($input);

        return Redirect::to("/sonhador/".$site_id."/#4")
            ->with('success', Lang::get('crud.update.success'));
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
            return Redirect::to("/sonhador/".$site_id."/#4")
                ->with('success', Lang::get('crud.destroy.success'));
        } catch (Exception $e) {

            return Redirect::to("/sonhador/".$site_id."/#4")
                ->with('error', Lang::get('crud.destroy.error'));
        }
    }

}
