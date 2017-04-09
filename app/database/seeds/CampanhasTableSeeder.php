<?php

class CampanhasTableSeeder extends Seeder {

    public function run()
    {
        DB::table('campanhas')->insert(array('id' => 1, 'nome' => 'Condomínio Shop Clube Guarulhos', 'status' => 1));
    }

}