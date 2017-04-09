<?php

class GuiaPaisTableSeeder extends Seeder {

    public function run()
    {
        GuiaPais::create(array('id' => 1, 'nome' => 'Brasil', 'status' => 1));
    }

}