<?php

class SitePeriodoTableSeeder extends Seeder {

    public function run()
    {
        SitePeriodo::create(array('id' => 1, 'periodo' => '3 meses', 'qtd_dias' => 90));
        SitePeriodo::create(array('id' => 1, 'periodo' => '6 meses', 'qtd_dias' => 180));
        SitePeriodo::create(array('id' => 1, 'periodo' => '12 meses', 'qtd_dias' => 360));
    }

}