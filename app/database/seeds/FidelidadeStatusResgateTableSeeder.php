<?php

class FidelidadeStatusResgateTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('fid_status_resgate')->insert(array('id' => 1, 'nome' => 'Em andamento'));
        DB::table('fid_status_resgate')->insert(array('id' => 2, 'nome' => 'Em trânsito'));
        DB::table('fid_status_resgate')->insert(array('id' => 3, 'nome' => 'Postado'));
        DB::table('fid_status_resgate')->insert(array('id' => 4, 'nome' => 'Entregue'));
    }
}
