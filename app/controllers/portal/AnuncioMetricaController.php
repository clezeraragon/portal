<?php
namespace Portal;

use Controller, AnuncioMetrica, Redirect,Anuncio,MetricaPagina;
use Illuminate\Support\Facades\Input;


class AnuncioMetricaController extends Controller
{

    protected $data;
    protected $model;

    public function __construct(AnuncioMetrica $model)
    {
        $this->model = $model;
        $this->data = array(
            'route' => 'metrica-banners/',
        );
    }

    public function getLinkBanner($page, $id)
    {

        $anuncio = Anuncio::find($id);
        $pagina_id = MetricaPagina::where('metrica_pagina.pagina','=',$page)->first()->toArray();
        $metrica_tipo_id = 11; // este id é referente ao click no banner
        $posicao = null;
        $this->model->saveMetrica($id, $metrica_tipo_id, $pagina_id['id'], $posicao);
        return Redirect::intended($anuncio['link']);

    }


}