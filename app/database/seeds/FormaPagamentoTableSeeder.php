<?php

class FormaPagamentoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('forma_pagamento')->insert(array('id' => 1, 'nome' => 'PagSeguro', 'status' => 1));
    }
}
