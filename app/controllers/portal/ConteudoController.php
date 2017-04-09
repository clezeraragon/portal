<?php

namespace Portal;

use Illuminate\Support\Facades\Session;
use View, Redirect; // Padrao
use Conteudo, ConteudoCategoria,Anuncio;

class ConteudoController extends BaseController {

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

    public function __construct(Conteudo $model)
    {
        $this->model = $model;
        $this->data = array(
            'view_dir' => 'portal.conteudo',
            'origem' =>  'Conteúdo'
        );
    }

	public function getConteudosCategoria($pai, $filha = null)
	{
        $dadosCategoria = ConteudoCategoria::getDadosCategoriaByUrl($pai, $filha);
        if(!$dadosCategoria){
            return $this->get404(); //RCO-019
        }

        $url = ($filha) ? $filha : $pai;

        $conteudos = $this->model->getConteudosByUrlCategoria($url);

        $this->data += array(
            'title_pag' => $dadosCategoria['categoria'],
            'title_seo' => $dadosCategoria['titulo_pag'],
            'description' => $dadosCategoria['descricao_pag'],
            'keywords' => $dadosCategoria['palavras_pag']
        );
        if(!isset($dadosCategoria['categoria_pai_id'])){
            $this->data += array(
                'cat_pai_nome' => $dadosCategoria['categoria'],
                'cat_pai_url' => "categoria/" . $dadosCategoria['url']
            );
        }
        else{
            $this->data += array(
                'cat_pai_nome' => $dadosCategoria['categoria_pai'],
                'cat_pai_url' => "categoria/" . $dadosCategoria['url_pai'],
                'cat_filha_nome' => $dadosCategoria['categoria'],
                'cat_filha_url' => $dadosCategoria['url']
            );
        }
        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();
        $conteudos = $conteudos->paginate(12, array('conteudo.*', 'conteudo.url as url_conteudo'));

        $this->layout->content = View::make($this->data['view_dir'] . '.categoria')
            ->with(array(
                'data' => $this->data,
                'conteudos' => $conteudos,
                'bannersDinamicos' => $bannersDinamicos
            ));
	}

    /**
     * metodo responsavel por seleciona os dados de um conteudo apartir de sua URL
     * Nivel 1 - categoria vinculada em 1ª nivel ao conteudo
     * Nivel 2 - categoria vinculada a categoria Nivel 1
     * @param $url - url do conteudo
     */
    public function getConteudoByURL($url, $preview = 0)
    {
        $conteudo =  $this->model->getConteudoByUrl($url, $preview);
        if(!$conteudo){
            return $this->get404(); //RCO-019
        }

        $conteudos_relacionado = $this->model->getConteudosRelacionadoByCategoria($conteudo['categoria_id'], $conteudo['id']);

        $this->data += array(
            'title_pag' => $conteudo['titulo'],
            'title_seo' => $conteudo['titulo_pag'],
            'description' => $conteudo['descricao_pag'],
            'keywords' => $conteudo['palavras_pag'],
            'cat_nivel1_nome' => $conteudo['categoria_nivel1'],
            'cat_nivel1_url' => "categoria/" . $conteudo['categoria_nivel1_url'],
            'cat_nivel2_nome' => $conteudo['categoria_nivel2'],
            'cat_nivel2_url' => "categoria/" . $conteudo['categoria_nivel2_url']
        );

        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();
        $this->layout->content = View::make($this->data['view_dir'] . '.conteudo')
            ->with(array(
                'data' => $this->data,
                'conteudo' => $conteudo,
                'conteudos_relacionado' => $conteudos_relacionado,
                'bannersDinamicos' => $bannersDinamicos
            ));
    }

}
