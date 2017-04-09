<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 09/12/2014
 * Time: 11:02
 */

namespace Admin;

use View, Redirect, Input, Exception, Lang, Validator;
use Cliente, Sentry, Video;

class VideoController extends BaseController
{


    protected $model;

    /**
     * Numero de itens por pagina
     * @var int
     */
    protected $per_page;

    /**
     * dados padr�o das views
     * @var array
     */
    protected $data;

    public function __construct(Video $model)
    {
        $this->model = $model;
        $this->per_page = 10;
        $this->data = array(
            'title' => "Video",
            'titles' => "Videos",
            'route' => 'admin/video',
            'view_dir' => 'admin.videos'
        );
    }

    public function index()
    {
        $result = $this->model->getGrid();
//        dd($result);

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

        $input = $this->model->setnull($input);

        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

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
            $rs = $this->model->findOrFail($id);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('rs'))->with(array('data' => $this->data));
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
        $input = $this->model->setnull($input);
        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {
            $this->model->find($id)->update($input);

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