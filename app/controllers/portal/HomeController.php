<?php

namespace Portal;

use View;
use ConteudoCategoria, CmsBloco, Anuncio;

class HomeController extends BaseController
{


    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct()
    {

        $this->data = array(
            'title' => "Conteúdo",
            'titles' => "Conteúdos",
            'view_dir' => 'portal.home',
            'origem' => 'Home'
        );
    }

    public function getHome()
    {
        $bloco = null;
        $videos2p = null;
        $menu = ConteudoCategoria::getMenuCategorias();
        $cmsBloco = new CmsBloco;
        $banners = new Anuncio();
        $carrossel = $cmsBloco->getBlocoMateriaCarrossel('carrossel-4p');
        $noticia = $cmsBloco->getBlocoMateriaNoticiaDestaque('bloco-1x2');
        $bannerDestaque = $cmsBloco->getBlocoMateriaBannerDestaque('banner-destaque');
//        $bloco = $cmsBloco->getBlocoMateria1x3('bloco-1x4');
        $bloco_superior_e = $cmsBloco->getBlocoMateriaBlocoSuperiorE('bloco-superior-1x2e');
        $bloco_superior_d = $cmsBloco->getBlocoMateriaBlocoSuperiorD('bloco-superior-1x2d');
        $bloco_e = $cmsBloco->getBlocoMateriaBlocoE('bloco-1x2e');
        $bloco_d = $cmsBloco->getBlocoMateriaBlocoD('bloco-1x2d');
        $miniCarrosselMateria = $cmsBloco->getBlocoMiniCarrosselMateria('mini-carrossel-3p');
        $videos3p = $cmsBloco->getBlocoVideo3p('bloco-video-3p');
//        $videos2p = $cmsBloco->getBlocoVideo2p('bloco-video-tab-2p');
        $bannersDinamicos = $banners->BannersDinamicos();
        $banners200x400 = $cmsBloco->Banners200x400();


        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'menu' => $menu,
                'carrossel' => $carrossel,
                'bannerDestaque' => $bannerDestaque,
                'noticia' => $noticia,
                'bloco' => $bloco,
                'bloco_e' => $bloco_e, # desativado
                'bloco_d' => $bloco_d, # desativado
                'bloco_superior_e' => $bloco_superior_e,
                'bloco_superior_d' => $bloco_superior_d,
                'miniCarrosselMateria' => $miniCarrosselMateria,
                'videos3p' => $videos3p,
                'videos2p' => $videos2p,
                'bannersDinamicos' => $bannersDinamicos,
                'banners200x400' => $banners200x400


            ));
    }

}
