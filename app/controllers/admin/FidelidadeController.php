<?php

namespace Admin;

use FidelidadeMovimentacao; //Por CRUD
use Input, Redirect, Lang, View;

class FidelidadeController extends BaseController {

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function getPontuacao()
    {
        $this->data = array(
            'title' => "Pontuação",
            'titles' => "Pontuações",
            'route' => 'admin/fidelidade-pontuacao',
            'view_dir' => 'admin.fidelidade-pontuacao'
        );

        $fidMov = new FidelidadeMovimentacao;
        $result = $fidMov->getGrid();

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));
    }


}
