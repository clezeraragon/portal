<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 06/05/2015
 * Time: 11:56
 */
class SiteMapController extends Controller
{


    protected $data;
    protected $model;

    public function __construct(SiteMap $model)
    {
        $this->model = $model;
        $this->data = array(
            'route' => 'sitemap',
            'view_dir' => 'xml',
        );
    }

    public function getSiteMap()
    {
        $rotasEstaticas = $this->model->getRotasEstaticas();
        $rotasConteudo = $this->model->getRotasConteudo();
        $rotasConteudoPaiEFilha = $this->model->getRotasConteudoPaiEFilha();
        $rotasGuiaEmpresa = $this->model->getRotasFiltroGuiaEmpresa();
        $rotasGuiaEmpresaConteudo = $this->model->getRotasGuiaEmpresaConteudo();
        $rotasProduto = $this->model->getProduto();
//        dd($rotasProduto);
        $data_atual = date('Y-m-d');

        $content = View::make($this->data['view_dir'] . '.site-map')
            ->with(array(
                'rotasEstaticas' => $rotasEstaticas,
                'data_atual' => $data_atual,
                'rotasConteudo' => $rotasConteudo,
                'rotasConteudoPaiEFilha' => $rotasConteudoPaiEFilha,
                'rotasGuiaEmpresa' => $rotasGuiaEmpresa,
                'rotasGuiaEmpresaConteudo' => $rotasGuiaEmpresaConteudo,
                'rotasProduto' => $rotasProduto
            ))->render();

        File::put(public_path() . '/sitemap/sitemap.xml', $content);
        return Response::make($content, 200)->header('Content-Type', 'application/xml');

    }
}