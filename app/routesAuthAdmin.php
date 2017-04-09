<?php

//Dashboard
Route::get('/', array('as' => 'dashboard', 'uses' => '\Admin\DashboardController@showAdmin'));


//Pagseguro
Route::get('/pagseguro/consulta-transacao/{id_pagseguro}', array('as' => 'pagseguro-consulta-transacao', 'uses' => 'PagseguroController@consultaTransacaoById'));


//Cliente
Route::resource('cliente', '\Admin\ClienteController');

//Route::get('/cliente-historico-contato/{cliente_id}', array('as' => 'cliente-historico-contato', 'uses' => '\Admin\ClienteHistoricoContatoController@index'));
//Route::get('/cliente-historico-contato/{cliente_id}/create', array('as' => 'form-cad-cliente-historico-contato', 'uses' => '\Admin\ClienteHistoricoContatoController@create'));
Route::post('/cliente-historico-contato', array('as' => 'cad-cliente-historico-contato', 'uses' => '\Admin\ClienteHistoricoContatoController@store'));


Route::resource('cliente-foto', '\Admin\ClienteFotoController', array('except' => array('show')));
Route::get('/relatorio-clientes-guia', array('as' => 'relatorio-clientes-guia', 'uses' => '\Admin\ClienteController@getRelatorioClientesGuia'));

//Grid Ajax
/* cliente ajax grid */
Route::get('cliente-ajax', array('as' => 'cliente-ajax', 'uses' => '\Admin\ClienteController@getClienteAjax'));

/* cliente-foto ajax grid */
Route::get('cliente-ajax-foto', array('as' => 'cliente-ajax-foto', 'uses' => '\Admin\ClienteFotoController@getFotoAjax'));

/* cliente-foto ajax grid */
Route::get('usuarios-ajax/{url?}', array('as' => 'users-ajax', 'uses' => '\Admin\UsuariosController@getAjaxUser'));



// Promotor
Route::resource('promotor', '\Admin\PromotorController');
Route::get('/relatorio-promotor', array('as' => 'relatorio-promotor', 'uses' => '\Admin\PromotorController@getRelatorioVendaMais'));


/*Modulo Cms */
Route::get('cms-bloco/', array('as' => 'Cms',  'uses' =>  '\Admin\CmsBlocoController@getIndex'));
Route::get('cms-bloco/{id}/edit-video', array('as' => 'Cms-edit-video',  'uses' =>  '\Admin\CmsBlocoController@getEditVideo'));
Route::put('cms-bloco-video/{id}', array('as' => 'post-cms-videos',  'uses' => '\Admin\CmsBlocoController@postUpdateVideo'));
Route::get('cms-bloco/{id}/edit-materia', array('as' => 'Cms-edit-materia',  'uses' =>  '\Admin\CmsBlocoController@getEditMateria'));
Route::put('cms-bloco-materia/{id}', array('as' => 'post-cms-materia',  'uses' => '\Admin\CmsBlocoController@postUpdateMateria'));


/* Modulo Resultado da Busca */
Route::get('/resultado-log-busca', array('as' => 'resultado-log-busca',  'uses' =>  '\Admin\LogBuscaController@getIndex'));


//Video
Route::resource('video', '\Admin\VideoController');


/*Grupo ACL*/
Route::resource('usuario', '\Admin\UsuariosController', array('except' => array('show')));
Route::get('usuario/{id}', array('as' => 'reenviar-email', 'uses' => '\Admin\UsuariosController@getReenviarEmail'));
Route::resource('perfil', '\Admin\PerfisController', array('except' => array('show')));


/*Modulo Conteudo*/
Route::resource('conteudo', '\Admin\ConteudoController', array('except' => array('show')));
Route::resource('conteudo-categoria', '\Admin\ConteudoCategoriaController', array('except' => array('show')));
Route::get('format-url/{string?}', array('as' => 'format-url', 'uses' => '\Admin\ConteudoCategoriaController@formatUrl'));
Route::get('/conteudo/{conteudo}/{preview}', array('as' => 'conteudo-preview', 'uses' => '\Portal\ConteudoController@getConteudoByURL'));


/*Modulo Guia de Empresa*/
Route::resource('guia-empresa', '\Admin\GuiaEmpresaController', array('except' => array('show')));
Route::resource('guia-categoria', '\Admin\GuiaCategoriaController', array('except' => array('show')));
Route::resource('guia-cidade', '\Admin\GuiaCidadeController', array('except' => array('show')));
Route::resource('guia-plano', '\Admin\GuiaPlanoController', array('except' => array('show')));

Route::get('config-plano/{plano?}', array('as' => 'config-plano', 'uses' => '\Admin\GuiaPlanoController@getConfigPlano'));
Route::get('guia-empresa/{id}/fotos', array('as' => 'guia-empresa-fotos',  'uses' =>  '\Admin\GuiaEmpresaController@getGaleriaFotos'));
Route::put('guia-empresa-fotos/{guia}', array('as' => 'post-guia-empresa-fotos',  'uses' => '\Admin\GuiaEmpresaController@postGaleriaFotos'));
Route::get('guia-empresa/{id}/videos', array('as' => 'guia-empresa-videos',  'uses' =>  '\Admin\GuiaEmpresaController@getGaleriaVideos'));
Route::put('guia-empresa-videos/{guia}', array('as' => 'post-guia-empresa-videos',  'uses' => '\Admin\GuiaEmpresaController@postGaleriaVideos'));

Route::get('guia-metrica/{dt_ini?}/{dt_fim?}/', array('as' => 'guia-metrica', 'uses' => '\Admin\GuiaMetricaController@getRelatorioMetrica'));
Route::get('anuncio-metrica/{dt_ini?}/{dt_fim?}/', array('as' => 'anuncio-metrica', 'uses' => '\Admin\AnuncioMetricaController@getRelatorioMetrica'));
Route::get('relatorio-guia-contato/', array('as' => 'relatorio-guia-contato', 'uses' => '\Admin\GuiaMetricaController@getRelatorioGuiaContato'));


/*Modulo Sonhador*/
Route::resource('site-plano', '\Admin\SitePlanoController', array('except' => array('show')));
Route::resource('site-tipo', '\Admin\SiteTipoController', array('except' => array('show')));
Route::resource('site', '\Admin\SiteSonhadorController', array('except' => array('create','show')));
Route::get('site-cotas/{id}', array('as' => 'site-cotas',  'uses' =>  '\Admin\SiteSonhadorController@getCotasSite'));
Route::get('site-pagseguro-consulta-transacao/{id_pagseguro}', array('as' => 'site-pagseguro-consulta-transacao', 'uses' => '\Admin\SiteSonhadorController@atualizaStatusPagamento'));


/* Modulo Fidelidade */
Route::resource('fidelidade-acao', '\Admin\FidelidadeAcaoController', array('except' => array('show')));
Route::resource('fidelidade-gamefication', '\Admin\GameficationController', array('except' => array('show')));
Route::resource('fidelidade-produto', '\Admin\ProdutoController', array('except' => array('show')));
Route::resource('produto-fornecedor', '\Admin\ProdutoFornecedorController', array('except' => array('show')));
Route::get('cadastra-estoque/{produto_id}', array('as' => 'get-cadastra-estoque', 'uses' => '\Admin\ProdutoEstoqueController@getCadastro'));
Route::post('cadastra-estoque', array('as' => 'post-cadastra-estoque', 'uses' => '\Admin\ProdutoEstoqueController@postCadastro'));
Route::resource('fidelidade-resgate', '\Admin\FidelidadeResgateController', array('except' => array('show')));
Route::resource('fidelidade-codigo', '\Admin\FidelidadeCodigoController', array('except' => array('show')));
Route::get('fidelidade-pontuacao/', array('as' => 'get-fidelidade-pontuacao', 'uses' => '\Admin\FidelidadeController@getPontuacao'));


/* Modulo CUPOM */
Route::resource('cupom', '\Admin\CupomController', array('except' => array('show')));
Route::get('cupom/get-anuncio-cliente/{cliente_id?}/', array('as' => 'get-anuncio-cliente-combobox', 'uses' => '\Admin\GuiaEmpresaController@getAnuncioComboboxByCliente'));
Route::get('/cupom-relatorio', array('as' => 'relatorio-cupom', 'uses' => '\Admin\CupomController@getRelatorioSolicitacoes'));


/*Modulo Financeiro*/
Route::resource('vendedor', '\Admin\VendedorController', array('except' => array('show')));


//Route::get('/script/10amigos', array('as' => 'script-10amigos', 'uses' => 'ScriptsController@getScript10Amigos'));
