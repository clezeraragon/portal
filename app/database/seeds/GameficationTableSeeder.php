<?php

class GameficationTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('gamefication')->insert(array('id' => 1, 'nome' => 'Nível 1', 'fator' => 1, 'pontos' => 100, 'nivel' => 1));
        DB::table('gamefication')->insert(array('id' => 2, 'nome' => 'Nível 2', 'fator' => 1.5, 'pontos' => 200, 'nivel' => 2));
        DB::table('gamefication')->insert(array('id' => 3, 'nome' => 'Nível 3', 'fator' => 2, 'pontos' => 300, 'nivel' => 3));
    }
}
