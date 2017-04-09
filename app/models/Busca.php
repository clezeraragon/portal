<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 18/05/2015
 * Time: 09:31
 */
Class Busca extends BaseModel
{
    protected $conteudo;
    protected $anuncio;
    protected $produto;
    protected $empresa;

    public function __construct(Conteudo $conteudo, Anuncio $anuncio, Produto $produto, GuiaEmpresa $empresa)
    {
        $this->data = array(
            'view_dir' => 'portal.busca',
            'title_pag' => 'Resultados',
            'title_seo' => 'Resultados',
            'description' => 'Resultados',
            'keywords' => 'Resultados',
            'origem' => 'Busca com resultado'
        );
        $this->conteudo = $conteudo;
        $this->anuncio = $anuncio;
        $this->produto = $produto;
        $this->empresa = $empresa;

    }

    public function getConteudoByBusca($string)
    {
        $string = trim ($string);

        return $this->conteudo->where('conteudo.status_id', '=', 2) //RCO-015

            ->where('conteudo.titulo', 'like', "" . $string . " %")
            ->orWhere('conteudo.titulo', 'like', "% " . $string . "")
            ->orWhere('conteudo.titulo', 'like', "% " . $string . " %")
            ->orWhere('conteudo.conteudo', 'like', "" . $string . " %")
            ->orWhere('conteudo.conteudo', 'like', "% " . $string . "")
            ->orWhere('conteudo.conteudo', 'like', "% " . $string . " %")
            ->orWhere('conteudo.conteudo', 'like', "%>" . $string . "<%")
            ->orWhere('conteudo.conteudo', 'like', "%>" . $string . " %")
            ->orWhere('conteudo.conteudo', 'like', "% " . $string . "<%")

            ->orderBy('conteudo.created_at','DESC');
    }

    public function getAnuncio()
    {
        return $this->anuncio->BannersDinamicos();
    }

    public function getProdutoByBusca($string)
    {
        $string = trim ($string);

        return $this->produto->where('produto.status', '=', 1)

            ->where('produto.nome', 'like', "" . $string . " %")
            ->orWhere('produto.nome', 'like', "% " . $string . "")
            ->orWhere('produto.nome', 'like', "% " . $string . " %")
            ->orWhere('produto.descricao', 'like', "" . $string . " %")
            ->orWhere('produto.descricao', 'like', "% " . $string . "")
            ->orWhere('produto.descricao', 'like', "% " . $string . " %")
            ->orWhere('produto.descricao', 'like', "%>" . $string . "<%")
            ->orWhere('produto.descricao', 'like', "%>" . $string . " %")
            ->orWhere('produto.descricao', 'like', "% " . $string . "<%")

            ->orderBy('produto.created_at','DESC');
    }

    public function getGuiaEmpresaByBusca($string)
    {
        $string = trim ($string);

        return $this->empresa->join("cliente as cl", "guia_empresa.cliente_id", "=", "cl.id")
            ->join("guia_categoria as gc", "guia_empresa.categoria_id", "=", "gc.id")
            ->join("cliente_foto as cf", "guia_empresa.foto_id", "=", "cf.id")
            ->join("guia_plano", "guia_empresa.plano_id", "=", "guia_plano.id")
            ->where('guia_empresa.status', '=', 1)
            ->where('cl.status', '=', 1)
            ->where(function($query) use($string) {
                $query->where('cl.nm_nome_fantasia', 'like', "" . $string . " %")
                    ->orWhere('cl.nm_nome_fantasia', 'like', "% " . $string . "")
                    ->orWhere('cl.nm_nome_fantasia', 'like', "% " . $string . " %")
                    ->orWhere('guia_empresa.texto', 'like', "" . $string . " %")
                    ->orWhere('guia_empresa.texto', 'like', "% " . $string . "")
                    ->orWhere('guia_empresa.texto', 'like', "% " . $string . " %")
                    ->orWhere('guia_empresa.texto', 'like', "%>" . $string . "<%")
                    ->orWhere('guia_empresa.texto', 'like', "%>" . $string . " %")
                    ->orWhere('guia_empresa.texto', 'like', "% " . $string . "<%")
                    ->orWhere('guia_empresa.descricao', 'like', "" . $string . " %")
                    ->orWhere('guia_empresa.descricao', 'like', "% " . $string . "")
                    ->orWhere('guia_empresa.descricao', 'like', "% " . $string . " %");
            })

            ->select('gc.nome', 'guia_empresa.url', 'cf.path_img', 'cl.nm_nome_fantasia', 'guia_empresa.descricao')
            ->orderBy('guia_plano.ordem', 'ASC')
            ->orderBy('gc.created_at', 'DESC');
    }
}