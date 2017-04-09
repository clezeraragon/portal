<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 12/11/2014
 * Time: 10:31
 */
class UsuarioFuncionalidadeTableSeeder extends Seeder
{

    public function run()
    {

        $dados = array(
            'id' => 1,
            'perfil_id' => 1,
            'funcionalidade_id' => 1
        );

        DB::table('usuario_funcionalidades_perfis')->insert($dados);
    }
}