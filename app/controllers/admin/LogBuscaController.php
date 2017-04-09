<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 22/06/2015
 * Time: 17:13
 */

namespace Admin;
use View;
use LogBusca;

class LogBuscaController  extends BaseController{

    protected $model;

    /**
     * Numero de itens por pagina
     * @var int
     */
    protected $per_page;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(LogBusca $model)
    {
        $this->model = $model;
        $this->per_page = 10;
        $this->data = array(
            'title' => "Log de Busca",
            'titles' => "Log de Busca",
            'route' => 'admin/log-busca',
            'view_dir' => 'admin.log-busca'
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $result = $this->model->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));
    }

}