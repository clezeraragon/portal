<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 05/02/2015
 * Time: 11:24
 */
class CmsBlocoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cms_bloco')->insert(array('id' => 1, 'nome' => 'business',
            'identificacao' => 'bloco-1x3',
            'tipo' => 'materia',
            'descricao' => 'bloco com fotos de 1x3',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-1x3.JPG',
            'qtd_itens' => '4'

        ));
        DB::table('cms_bloco')->insert(array('id' => 2, 'nome' => 'videos ',
            'identificacao' => 'bloco-video-3p',
            'tipo' => 'video',
            'descricao' => 'bloco de video com 3 videos',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-video-3p.JPG',
            'qtd_itens' => '3'

        ));

        DB::table('cms_bloco')->insert(array('id' => 3, 'nome' => 'travel',
            'identificacao' => 'bloco-1x2d',
            'tipo' => 'materia',
            'descricao' => 'bloco com fotos 1x2 lado direito',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-1x2d.JPG',
            'qtd_itens' => '3'

        ));
        DB::table('cms_bloco')->insert(array('id' => 4, 'nome' => 'science',
            'identificacao' => 'bloco-1x2e',
            'tipo' => 'materia',
            'descricao' => 'bloco com fotos 1x2 lado esquerdo',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-1x2e.JPG',
            'qtd_itens' => '3'

        ));
        DB::table('cms_bloco')->insert(array('id' => 10, 'nome' => 'travel',
            'identificacao' => 'bloco-superior-1x2d',
            'tipo' => 'materia',
            'descricao' => 'bloco com fotos 1x2 lado direito',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-1x2d.JPG',
            'qtd_itens' => '3'

        ));
        DB::table('cms_bloco')->insert(array('id' => 11, 'nome' => 'science',
            'identificacao' => 'bloco-superior-1x2e',
            'tipo' => 'materia',
            'descricao' => 'bloco com fotos 1x2 lado esquerdo',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-1x2e.JPG',
            'qtd_itens' => '3'

        ));
        DB::table('cms_bloco')->insert(array('id' => 5, 'nome' => 'mini carrossel',
            'identificacao' => 'mini-carrossel-3p',
            'tipo' => 'materia',
            'descricao' => 'bloco com exibição de 3 fotos por paginação',
            'path_img_referencia' => '/assets/imagens/cms-imagem/mini-carrossel-3p.JPG',
            'qtd_itens' => '6'

        ));
        DB::table('cms_bloco')->insert(array('id' => 6, 'nome' => 'noticia destaque',
            'identificacao' => 'noticia-destaque',
            'tipo' => 'materia',
            'descricao' => 'bloco com exibição de destaque no topo do site',
            'path_img_referencia' => '/assets/imagens/cms-imagem/noticia-destaque.JPG',
            'qtd_itens' => '2'

        ));
        DB::table('cms_bloco')->insert(array('id' => 7, 'nome' => 'mini-tab-video',
            'identificacao' => 'bloco-video-tab-2p',
            'tipo' => 'video',
            'descricao' => 'bloco com exibição de destaque do lado direto do bloco business',
            'path_img_referencia' => '/assets/imagens/cms-imagem/bloco-video-2p.JPG',
            'qtd_itens' => '6'

        ));
        DB::table('cms_bloco')->insert(array('id' => 8, 'nome' => 'carrossel',
            'identificacao' => 'carrossel-4p',
            'tipo' => 'materia',
            'descricao' => 'bloco carrossel principal',
            'path_img_referencia' => '/assets/imagens/cms-imagem/carrossel-4p.JPG',
            'qtd_itens' => '4'

        ));


    }
}
