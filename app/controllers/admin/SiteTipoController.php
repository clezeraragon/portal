<?php

namespace Admin;

use SiteTipo; //Por CRUD

class SiteTipoController extends CrudController {

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

    public function __construct(SiteTipo $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Tipo",
            'titles' => "tipos",
            'route' => 'admin/site-tipo',
            'view_dir' => 'admin.site-tipo'
        );
    }
}
