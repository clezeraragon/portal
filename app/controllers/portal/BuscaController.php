<?php

namespace Portal;

use View, Input, Redirect, Validator, Busca ,LogBusca;

class BuscaController extends BaseController
{

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Busca $busca,LogBusca $logBusca)
    {
        $this->data = array(
            'view_dir' => 'portal.busca',
            'title_pag' => 'Resultados',
            'title_seo' => 'Resultados',
            'description' => 'Resultados',
            'keywords' => 'Resultados',
            'origem' => 'Busca com resultado'
        );
        $this->busca = $busca;
        $this->logbusca = $logBusca;
    }

    public function getBusca()
    {
        //Regras de formulario
        $rules = array('s' => 'required|min:3');

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', "Para realizar a busca, informa uma palavra de no mínimo 3 letras.");
        } else {

            $conteudos = $this->busca->getConteudoByBusca(Input::get("s"))->paginate();
            $produto = $this->busca->getProdutoByBusca(Input::get("s"))->paginate();
            $guiaEmpresa = $this->busca->getGuiaEmpresaByBusca(Input::get("s"))->paginate();

            $total = ["contents"=> $conteudos,"isonheiclub"=>$produto,"Empresas"=>$guiaEmpresa];

            if ($conteudos->getTotal() == 0 && $produto->getTotal() == 0 && $guiaEmpresa->getTotal()) {
                $rota = "sem-resultado";
                $this->data['origem'] = 'Busca sem resultado';
            }
            $this->logbusca->savarLogBusca(Input::get("s"),$conteudos->getTotal(),$produto->getTotal(),$guiaEmpresa->getTotal());

            $bannersDinamicos = $this->busca->getAnuncio();

            $this->layout->content = View::make($this->data['view_dir'] . "." . 'busca')
                ->with(array(
                    'data' => $this->data,
                    'conteudos' => $conteudos,
                    'bannersDinamicos' => $bannersDinamicos,
                    'stringBusca' => Input::get("s"),
                    'produtoBusca' => $produto,
                    'guiaEmpresa' => $guiaEmpresa,
                    'totalBusca' => $total
                ));
        }

    }

}
