<?php

namespace Admin;


use View, Redirect, Input, Exception, Lang, Illuminate\Database\Eloquent\ModelNotFoundException; // Padrao
use CmsBloco, CmsBlocoVideo, CmsBlocoMateria, Video, Conteudo;

class CmsBlocoController extends BaseController
{


    /**
     * Classe model CmsBloco
     * @var CmsBloco
     */
    protected $model;

    /**
     * dados padr�o das views
     * @var array
     */
    protected $data;

    public function __construct(CmsBloco $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Cms bloco",
            'titles' => "Cms bloco",
            'route' => 'admin/cms-bloco',
            'view_dir' => 'admin.cms-bloco'
        );

    }

    public function getIndex()
    {
        $result = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));
    }

    public function getEditVideo($id)
    {
        try {
            $videos_ids = array();
            $rs = $this->model->findOrFail($id);

            $videos = Video::all();
//        dd($videos);
            foreach ($rs->video as $video) {
                $videos_ids[] = $video->id;

            }

//            dd($videos_ids);
            $this->layout->content = View::make($this->data['view_dir'] . '.edit-video', compact('rs', 'videos'))->with(array('data' => $this->data, 'videos_ids' => $videos_ids));
        } catch (ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }

    }

    public function getEditMateria($id)
    {
        try {
            $rs = $this->model->findOrFail($id);
            $materias = Conteudo::orderBy('titulo')->where('status_id', '=', 2)->get();

            $inputselect = Conteudo::lists('titulo','id');

            $conteudos_ids = CmsBlocoMateria::orderBy('ordem')->where('bloco_id', '=', $id)->get()->toArray();

            $this->layout->content = View::make($this->data['view_dir'] . '.edit-materia', compact('rs', 'materias','inputselect'))->with(array('data' => $this->data, 'conteudos_ids' => $conteudos_ids));
        } catch (ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }

    }

    public function postUpdateVideo($id)
    {
        $input = Input::all();

        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $rs = $this->model->find($id);
            $rs->video()->sync(Input::get('videos_ids'));

            foreach (Input::get('videos_ids') as $key => $result) { /* $key (RCMS- 001) */
                $banco = new CmsBlocoVideo();
                $item = $banco->where('video_id', '=', $result)->where('bloco_id', '=', $rs->id)->first();

                $item->update(array('ordem' => $key));

            }
            $rs->update($input);
            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }

    public function postUpdateMateria($id)
    {

        $input = Input::all();
        $uniques = array_unique($input['conteudos_ids']);
        $ids = array_diff_assoc($input['conteudos_ids'], $uniques);

        if ($ids) {
            return Redirect::back()
                ->withInput($ids)
                ->withErrors($ids)
                ->with('error', ' Os campos da materia estão iguais');
        }

        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $rs = $this->model->find($id);
            $rs->materia()->sync(Input::get('conteudos_ids'));

            foreach (Input::get('conteudos_ids') as $key => $result) { /* $key (RCMS- 001) */
                $banco = new CmsBlocoMateria();
                $item = $banco->where('conteudo_id', '=', $result)->where('bloco_id', '=', $rs->id)->first();

                $item->update(array('ordem' => $key));

            }
            $rs->update($input);
            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }


}