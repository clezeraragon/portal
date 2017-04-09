<?php

namespace Portal;

use GuiaMetrica, Cliente, Input;

class GuiaMetricaController extends \Controller {

    /**
     * Classe model
     * @var
     */
    protected $model;

    public function __construct(GuiaMetrica $model)
    {
        $this->model = $model;
    }

    public function metrica($anuncio_id, $pagina_id, $tipo_id, $posicao = null, $chave = null)
    {
        $this->model->saveMetrica($anuncio_id, $pagina_id, $tipo_id, $posicao, $chave);
    }

    public function getTelefone($cliente_id)
    {
        return Cliente::getTelefoneMetrica($cliente_id);
    }

    public function getEndereco($cliente_id)
    {
        return Cliente::getEnderecoMetrica($cliente_id);
    }

    public function getSite($cliente_id)
    {
        return Cliente::getSiteMetrica($cliente_id);
    }

}
