<?php

class SiteLayoutTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('site_layout')->insert(array('id' => 1, 'nome' => 'Básico', 'path' => 'basico', 'status' => 1));
    }
}
