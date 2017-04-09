<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 06/05/2015
 * Time: 11:52
 */
class SiteMap extends BaseModel
{
    protected $conteudo;
    protected $categoria;
    protected $guiaEmpresa;
    protected $produto;

    public function __construct(\Conteudo $conteudo, \ConteudoCategoria $categoria, \GuiaEmpresa $guiaEmpresa, \Produto $produto
    )
    {
        $this->produto = $produto;
        $this->guiaEmpresa = $guiaEmpresa;
        $this->conteudo = $conteudo;
        $this->categoria = $categoria;

    }


    public function getRotasEstaticas()

    {
        $rotas =
            ['sobre' => route('page-sobre'),
                'anuncie' => route('page-anuncie'),
                'contato' => route('page-contato'),
                'termo-e-politica' => route('page-termo'),
                'isonhei-club' => route('page-fidelidade')
            ];

        return $rotas;
    }

    public function getRotasConteudo()
    {
        $conteudos = $this->conteudo->where('conteudo.status_id', '=', 2)->get(array('conteudo.url'))->toArray();

        foreach ($conteudos as $key => $conteudo) {
            $rotas[] = route('conteudo', [$conteudo['url']]);

        }

        return $rotas;
    }

    public function getRotasConteudoPaiEFilha()
    {
        $rotas = array();

        $categorias = $this->categoria->where('conteudo_categoria.status', '=', '1')
            ->leftJoin('conteudo_categoria as cc', 'conteudo_categoria.categoria_pai_id', '=', 'cc.id')
            ->get(array('conteudo_categoria.*', 'cc.categoria as categoria_pai', 'cc.url as url_pai'));

        foreach ($categorias as $categoria) {
            if (!isset($categoria->categoria_pai_id)) {
                $rotas[$categoria->id]['url'] = route('conteudo-categoria-pai', [$categoria->url]);

            } else {
                $rotas[$categoria->id]['url'] = route('conteudo-categoria-filha', [$categoria->url_pai . "/" . $categoria->url]);

            }
        }

        return $rotas;
    }

    public function  getRotasFiltroGuiaEmpresa()
    {

        $result = $this->guiaEmpresa->distinct()->select('guia_categoria.url as ca.url', 'guia_cidade.url as ci.url')
            ->join('guia_categoria', 'guia_categoria.id', '=', 'guia_empresa.categoria_id')
            ->join('guia_cidade', 'guia_cidade.id', '=', 'guia_empresa.cidade_id')
            ->where('guia_empresa.status', '=', '1')
            ->orderBy('guia_empresa.url')->get()
            ->toArray();
        foreach ($result as $route) {

            $rotas[] = route('get-guia-de-empresas-filtro', [$route['ca.url'] . "/" . $route['ci.url']]);
        }
        return $rotas;
    }

    public function getRotasGuiaEmpresaConteudo()
    {
        $result = $this->guiaEmpresa->select('guia_empresa.url')
            ->where('guia_empresa.status', '=', '1')
            ->get()
            ->toArray();

        foreach ($result as $route) {

            $rotas[] = route('guia-de-empresas-anuncio', [$route['url']]);
        }

        return $rotas;
    }
    public function getProduto()
    {
        $result = $this->produto->select('produto.url')
            ->where('produto.status','=','1')
            ->get()
            ->toArray();

        foreach($result as $route){
            $rotas[] = route('isonhei-club-produto',[$route['url']]);
        }

        return $rotas;
    }



}