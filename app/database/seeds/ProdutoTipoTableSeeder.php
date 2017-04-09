<?php

class ProdutoTipoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('produto_tipo')->insert(array('id' => 1, 'nome' => 'Físico'));
        DB::table('produto_tipo')->insert(array('id' => 2, 'nome' => 'Digital'));
    }
}
