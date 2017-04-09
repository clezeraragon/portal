<?php

namespace Admin;

use Illuminate\Support\Facades\Config;
use View, Redirect, Input, Lang; // Padrao
use GuiaMetrica, GuiaContato;

class GuiaMetricaController extends BaseController
{

    /**
     * Classe model GuiaMetrica
     * @var GuiaMetrica
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(GuiaMetrica $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Métrica Guia",
            'titles' => "Métrica Guia",
            'route' => 'admin/guia-metrica',
            'view_dir' => 'admin.guia-metrica'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getRelatorioMetrica($dt_ini = null, $dt_fim = null)
    {

        if (Input::all()) {
            $dt_ini = Input::get('dt_inicial');
            $dt_fim = Input::get('dt_final');
        } else {
            $dt_ini = date('Y-m-01'); // * RGE-017
            $dt_fim = date('Y-m-d');
        }

        $result = $this->model->getRelatorioMetricaByEmpresa($dt_ini, $dt_fim);

        $periodo = $dt_ini . " a " . $dt_fim;

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'result' => $result,
                'periodo' => $periodo
            ));
    }


    public function getRelatorioGuiaContato()
    {
        $guiaContato = new GuiaContato();
        $result = $guiaContato->getRelatorioGuiaContato();

        $this->layout->content = View::make($this->data['view_dir'] . '.guia-contato')
            ->with(array(
                'data' => $this->data,
                'result' => $result
            ));
    }

}
