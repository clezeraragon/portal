<?php

class MetricaPaginaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('metrica_pagina')->insert(array('id' => 1, 'pagina' => 'Guia - Filtro', 'descricao' => 'Pagina do guia com filtro de categoria e cidade'));
        DB::table('metrica_pagina')->insert(array('id' => 2, 'pagina' => 'Guia - Anuncio', 'descricao' => 'Pagina do anunciantes no guia de empresas'));

        DB::table('metrica_pagina')->insert(array('id' => 3, 'pagina' => 'Home', 'descricao' => 'Home do portal'));
        DB::table('metrica_pagina')->insert(array('id' => 4, 'pagina' => 'Busca com resultado', 'descricao' => 'Busca com resultado'));
        DB::table('metrica_pagina')->insert(array('id' => 5, 'pagina' => 'Busca sem resultado', 'descricao' => 'Busca sem resultado'));
        DB::table('metrica_pagina')->insert(array('id' => 6, 'pagina' => 'Categoria de conteúdo', 'descricao' => 'Categoria de conteúdo'));
        DB::table('metrica_pagina')->insert(array('id' => 7, 'pagina' => 'Conteúdo', 'descricao' => 'Conteúdo'));
        DB::table('metrica_pagina')->insert(array('id' => 8, 'pagina' => 'Sonhador', 'descricao' => 'Sonhador'));
        DB::table('metrica_pagina')->insert(array('id' => 9, 'pagina' => 'Prateleira', 'descricao' => 'Prateleira do iSonhei Store'));
        DB::table('metrica_pagina')->insert(array('id' => 10, 'pagina' => 'Produto', 'descricao' => 'Produto iSonhei Store'));
        DB::table('metrica_pagina')->insert(array('id' => 11, 'pagina' => 'Cupom', 'descricao' => 'Cupom de desconto'));
    }
}
