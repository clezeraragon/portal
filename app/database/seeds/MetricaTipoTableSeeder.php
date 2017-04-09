<?php

class MetricaTipoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('metrica_tipo')->insert(array('id' => 1, 'metrica' => 'Plano', 'descricao' => 'Box do Plano'));
        DB::table('metrica_tipo')->insert(array('id' => 2, 'metrica' => 'Endereço', 'descricao' => 'Endereço'));
        DB::table('metrica_tipo')->insert(array('id' => 3, 'metrica' => 'Telefone', 'descricao' => 'Telefone'));
        DB::table('metrica_tipo')->insert(array('id' => 4, 'metrica' => 'Site', 'descricao' => 'Site'));
        DB::table('metrica_tipo')->insert(array('id' => 5, 'metrica' => 'Contato por formulário', 'descricao' => 'Contato por formulário'));
        DB::table('metrica_tipo')->insert(array('id' => 6, 'metrica' => 'Compartilhar no facebook', 'descricao' => 'Compartilhar no facebook'));
        DB::table('metrica_tipo')->insert(array('id' => 7, 'metrica' => 'Compartilhar no twiter', 'descricao' => 'Compartilhar no twiter'));
        DB::table('metrica_tipo')->insert(array('id' => 8, 'metrica' => 'Compartilhar por e-mail', 'descricao' => 'Compartilhar por e-mail'));
        DB::table('metrica_tipo')->insert(array('id' => 9, 'metrica' => 'Assistir vídeo', 'descricao' => 'Assistir vídeo'));
        DB::table('metrica_tipo')->insert(array('id' => 10,'metrica' => 'Visualização Guia', 'descricao' => 'Visualização no Guia de empresa, página interna'));
        DB::table('metrica_tipo')->insert(array('id' => 11,'metrica' => 'Click em Banner', 'descricao' => 'Click em Banner'));
        DB::table('metrica_tipo')->insert(array('id' => 12,'metrica' => 'Redes Sociais', 'descricao' => 'Click para ativar redes sociais'));
        DB::table('metrica_tipo')->insert(array('id' => 13,'metrica' => 'Click Facebook', 'descricao' => 'Click Facebook'));
        DB::table('metrica_tipo')->insert(array('id' => 14,'metrica' => 'Click Instagram', 'descricao' => 'Click Instagram'));
        DB::table('metrica_tipo')->insert(array('id' => 15,'metrica' => 'Click Twitter', 'descricao' => 'Click Twitter'));
        DB::table('metrica_tipo')->insert(array('id' => 16,'metrica' => 'Click Foto', 'descricao' => 'Click Foto'));
    }
}
