<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('PerfilTableSeeder');
//        $this->call('AdminSeeder');
        $this->call('FuncionalidadeTableSeeder');
//        $this->call('ConteudoStatusTableSeeder');
//        $this->call('UsuarioFuncionalidadeTableSeeder');
//        $this->call('GuiaPaisTableSeeder');
//        $this->call('GuiaEstadoTableSeeder');
//        $this->call('SitePeriodoTableSeeder');
//        $this->call('MetricaPaginaTableSeeder');
//        $this->call('MetricaTipoTableSeeder');
//        $this->call('FormaPagamentoTableSeeder');
//        $this->call('CmsBlocoTableSeeder');
//        $this->call('FidelidadeAcaoTableSeeder');
//        $this->call('GameficationTableSeeder');
//        $this->call('SiteLayoutTableSeeder');
//        $this->call('ProdutoTipoTableSeeder');
//        $this->call('FidelidadeStatusResgateTableSeeder');
//        $this->call('UsuarioAssuntosInteresseTableSeeder');
//        $this->call('CampanhasTableSeeder');

	}
}
