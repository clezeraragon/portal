<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 16/10/2014
 * Time: 14:35
 */
class ClienteTipoTableSeed extends Seeder
{


    public function run()
    {


        $dados = array(

            array('id' => 1,
                'cliente_tipo_id' => 1,
                'nm_razao_social' => 'iSonhei ltda',
                'nm_responsavel' => 'Vanessa',
                'nm_email_responsavel' => 'vanessa@isonhei.com.br',
            ),
            array('id' => 2,
                'cliente_tipo_id' => 2,
                'nm_razao_social' => 'ML Comercio ',
                'nm_responsavel' => 'Fernando Ramos',
                'nm_email_responsavel' => 'Fernando Ramos',
            ),

        );
        DB::table('cliente')->insert($dados);
        $dados = array(

            array('id' => 1,
                'nm_tipo_cliente' => 'Fisico',
            ),
            array('id' => 2,
                'nm_tipo_cliente' => 'Juridico',
            ),
            array('id' => 3,
                'nm_tipo_cliente' => 'Neutro',
            )
        );
        DB::table('cliente_tipo')->insert($dados);


    }

}