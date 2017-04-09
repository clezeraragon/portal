<?php

class ConteudoStatusTableSeeder extends Seeder {

    public function run()
    {
        ConteudoStatus::create(array('status' => 'Rascunho'));
        ConteudoStatus::create(array('status' => 'Aprovado'));
    }

}