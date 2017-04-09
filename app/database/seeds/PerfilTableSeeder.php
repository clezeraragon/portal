<?php

class PerfilTableSeeder extends Seeder {

    public function run()
    {
//        Perfil::create(array('id' => 1, 'perfil' => 'Admin', 'descricao' => 'Administrador', 'st_admin' => 1));
//        Perfil::create(array('id' => 2, 'perfil' => 'Usuário', 'descricao' => 'Usuário site', 'st_admin' => 0));
        Perfil::create(array('id' => 3, 'perfil' => 'Vendedor', 'descricao' => 'Acesso dos Vendedores', 'st_admin' => 1));
    }

}