<?php

class FidelidadeAcaoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fid_acoes')->insert(array('id' => 1,  'nome' => 'Cadastro Portal Antigo'                                 , 'pontos' => 50    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 2,  'nome' => 'Cadastro Orgânico'                                      , 'pontos' => 50    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 3,  'nome' => 'Cadastro Indicação'                                     , 'pontos' => 50    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 4,  'nome' => 'Indicação de Cadastro'                                  , 'pontos' => 10    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 5,  'nome' => 'Resgate'                                                , 'pontos' => 0     , 'st_editar' => 0, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 6,  'nome' => 'Pedir Orçamento'                                        , 'pontos' => 20    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 7,  'nome' => 'Visita ao Parceiro'                                     , 'pontos' => 30    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 8,  'nome' => 'Fechamento com o Parceiro'                              , 'pontos' => 40    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 9,  'nome' => 'Cadastro por Indicação Promotor'                        , 'pontos' => 200   , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 10, 'nome' => 'Indicação de cadastro Promotor'                         , 'pontos' => 100   , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 11, 'nome' => 'Bônus por indicação de cadastro Promotor'               , 'pontos' => 50    , 'st_editar' => 1, 'st_excluir' => 0));
        DB::table('fid_acoes')->insert(array('id' => 12, 'nome' => 'Fechamento com o Parceiro por indicação de Promotor'    , 'pontos' => 500   , 'st_editar' => 1, 'st_excluir' => 0));
    }
}
