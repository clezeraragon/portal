<?php

namespace Admin;

use ProdutoFornecedor; //Por CRUD

class ProdutoFornecedorController extends CrudController {

    /**
     * Classe model
     * @var
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(ProdutoFornecedor $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Fornecedor",
            'titles' => "Fornecedor",
            'route' => 'admin/produto-fornecedor',
            'view_dir' => 'admin.fidelidade-prod-fornecedor'
        );
    }

}
