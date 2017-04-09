<?php

class UsuarioAssuntosInteresseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 1,  'assunto' => 'Carro'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 2,  'assunto' => 'Casamento'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 3,  'assunto' => 'Tecnologia'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 4,  'assunto' => 'Debutante e/ou aniversários'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 5,  'assunto' => 'Viagem e turismo'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 6,  'assunto' => 'Casa e decoração'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 7,  'assunto' => 'Bebê, gestante e infantil'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 8,  'assunto' => 'Estudo e carreira'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 9,  'assunto' => 'Gastronomia'));
        DB::table('usuario_assuntos_interesse')->insert(array('id' => 10, 'assunto' => 'Saúde, beleza e estética'));
    }
}
