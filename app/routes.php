<?php


include "routesOld.php";


// Validação CSRF
Route::when('*', 'csrf', array('post'));

//Portal
Route::get('/', array('as' => 'portal', 'uses' => '\Portal\HomeController@getHome'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
Route::get('/404/', array('as' => '404', 'uses' => '\Portal\BaseController@get404'));

//Promoção
Route::get('/promo/{promocao}', array('as' => 'promocao-evento', 'uses' => '\Portal\PromocaoController@getCadastroPromocao'));
Route::get('/exponoivas2015', array('as' => 'expo-noivas-2015', 'uses' => '\Portal\ExpoNoivasController@getPageExpo'));
//Route::post('/exponoivas2015', array('as' => 'signup-noivas', 'uses' => '\Portal\ExpoNoivasController@postPageExpo'));

// Link para abrir o modal ativar conta
Route::get('ativar-conta', array('as' => 'ativar-conta', 'uses' => '\Portal\PagesController@getModalAtivarConta'));

// Rota para SiteMap
Route::get('gerar-sitemap', array('as' => 'site-map', 'uses' => 'SiteMapController@getSiteMap'));

// URL para ativar o cadastro pelo facebook
Route::get('/cadastro/facebook', array('as' => 'cadastro-facebook', 'uses' => '\Portal\PagesController@getCadastroFacebook'));
Route::get('/cadastro-guia', array('as' => 'cadastro-guia', 'uses' => '\Portal\PagesController@getCadastroFacebook'));

// Rota promoção venda mais
Route::get('/action/{hash}', array('as' => 'action-promotor', 'uses' => '\Admin\PromotorController@getActionPromotor'));

//Rotas após logar e com acesso de permissão
Route::group(array('before' => 'auth'), function ()
{

    Route::group(array('before' => 'acl'), function () {

        //Routas do Sistema Admin
        Route::group(array('prefix' => 'admin'), function () {

            include "routesAuthAdmin.php";

        });
    });

    /*Painel usuário*/
    Route::get('/painel', array('as' => 'portal-painel', 'uses' => '\Portal\PainelController@index'));
    Route::get('/usuario', array('as' => 'editar-usuario', 'uses' => '\Portal\PainelController@editUser'));
    Route::put('/usuario', array('as' => 'post-editar-usuario', 'uses' => '\Portal\PainelController@updateUser'));
    Route::get('/painel/resgate', array('as' => 'painel-resgate', 'uses' => '\Portal\PainelController@getResgatesFidelidade'));
    Route::get('/painel/isonhei-club', array('as' => 'painel-fidelidade', 'uses' => '\Portal\PainelController@getExtratoFidelidade'));
    Route::get('/painel/sites', array('as' => 'painel-site', 'uses' => '\Portal\PainelController@getSitesSonhador'));
    Route::get('/painel/cotas', array('as' => 'painel-cotas', 'uses' => '\Portal\PainelController@getCotasSonhador'));
    Route::get('/painel/recados', array('as' => 'painel-recados', 'uses' => '\Portal\PainelController@getRecadosSonhador'));
    Route::get('/painel/ranking', array('as' => 'painel-ranking', 'uses' => '\Portal\PainelController@getRanking'));
    Route::get('/painel/registre-seus-pontos', array('as' => 'get-registre-de-pontos', 'uses' => '\Portal\PainelController@getRegistroDePontos'));
    Route::post('/painel/registre-seus-pontos', array('as' => 'post-registre-de-pontos', 'uses' => '\Portal\PainelController@postRegistroDePontos'));

    Route::get('/painel/convidar-amigo', array('as' => 'get-convidar-amigo', 'uses' => '\Portal\PainelController@getConvidarAmigo'));
    Route::post('/painel/convidar-amigo', array('as' => 'post-convidar-amigo', 'uses' => '\Portal\PainelController@postConvidarAmigo'));

    Route::get('/painel/expo-noivas', array('as' => 'expo-noivas-2015', 'uses' => '\Portal\PainelController@getExpoNoivas'));

    Route::get('/painel/enquete', array('as' => 'promo-enquete', 'uses' => '\Portal\PainelController@getPromoEnquete'));
    Route::post('/painel/enquete', array('as' => 'post-promo-enquete', 'uses' => '\Portal\PainelController@postPromoEnquete'));
    Route::get('/promo-cupom/download', array('as' => 'download-promo-cupom', 'uses' => '\Portal\PromocaoController@getPromoCupom'));

    Route::put('/completa-cadastro', array('as' => 'completa-cadastro', 'uses' => '\Portal\PainelController@completaCadastroFidelidade'));


    Route::group(array('before' => 'permissao_sonhador:3'), function () {

            /*Modulo Sonhador - Portal*/
            Route::get('site-sonhador/construtor/{siteid}', array('as' => 'site-sonhador-construtor', 'uses' => '\Portal\SonhadorController@getConstrutorSite'));
            Route::put('site-sonhador/construtor/{siteid}', array('as' => 'site-sonhador-construtor', 'uses' => '\Portal\SonhadorController@postConstrutorSite'));
    });

    Route::group(array('before' => 'permissao_sonhador:4'), function () {

            /* Fotos do Site do sonhador */
            Route::get('site-sonhador/construtor/fotos/{siteid}', array('as' => 'list-site-sonhador-construtor-fotos', 'uses' => '\Portal\SonhadorFotosController@index'));
            Route::get('site-sonhador/construtor/fotos/{siteid}/create', array('as' => 'get-site-sonhador-construtor-fotos', 'uses' => '\Portal\SonhadorFotosController@create'));
            Route::post('site-sonhador/construtor/fotos/{siteid}/', array('as' => 'post-site-sonhador-construtor-fotos', 'uses' => '\Portal\SonhadorFotosController@store'));
            Route::get('site-sonhador/construtor/fotos/{siteid}/{fotoid}/edit', array('as' => 'get-site-sonhador-construtor-fotos-edit', 'uses' => '\Portal\SonhadorFotosController@edit'));
            Route::put('site-sonhador/construtor/fotos/{siteid}/{fotoid}', array('as' => 'put-site-sonhador-construtor-fotos-edit', 'uses' => '\Portal\SonhadorFotosController@update'));
            Route::delete('site-sonhador/construtor/fotos/{siteid}/{fotoid}', array('as' => 'delete-site-sonhador-construtor-fotos', 'uses' => '\Portal\SonhadorFotosController@destroy'));

            /* Recados do Site do sonhador */
            Route::put('site-sonhador/construtor/recado/{siteid}/{recadoid}', array('as' => 'put-site-sonhador-recado-edit', 'uses' => '\Portal\SonhadorRecadosController@update'));
            Route::delete('site-sonhador/construtor/recado/{siteid}/{recadoid}', array('as' => 'delete-site-sonhador-recado', 'uses' => '\Portal\SonhadorRecadosController@destroy'));

            /* Cotas do Site do sonhador */
            Route::get('site-sonhador/construtor/cotas/{siteid}', array('as' => 'list-site-sonhador-construtor-cotas', 'uses' => '\Portal\SonhadorCotasController@index'));
            Route::get('site-sonhador/construtor/cotas/{siteid}/create', array('as' => 'get-site-sonhador-construtor-cotas', 'uses' => '\Portal\SonhadorCotasController@create'));
            Route::post('site-sonhador/construtor/cotas/{siteid}/', array('as' => 'post-site-sonhador-construtor-cotas', 'uses' => '\Portal\SonhadorCotasController@store'));
            Route::get('site-sonhador/construtor/cotas/{siteid}/{fotoid}/edit', array('as' => 'get-site-sonhador-construtor-cotas-edit', 'uses' => '\Portal\SonhadorCotasController@edit'));
            Route::put('site-sonhador/construtor/cotas/{siteid}/{fotoid}', array('as' => 'put-site-sonhador-construtor-cotas-edit', 'uses' => '\Portal\SonhadorCotasController@update'));
            Route::delete('site-sonhador/construtor/cotas/{siteid}/{fotoid}', array('as' => 'delete-site-sonhador-construtor-cotas', 'uses' => '\Portal\SonhadorCotasController@destroy'));

    });

    //CUPOM de desconto
    Route::get('desconto/get-cupom/{id}', array('as' => 'get-cupom', 'uses' => '\Portal\CupomController@getCupom'));

});

/* Recados do Site do sonhador */
Route::post('site-sonhador/construtor/recado/{siteid}/', array('as' => 'post-site-sonhador-recado', 'uses' => '\Portal\SonhadorRecadosController@store'));


/*Modulo Sonhador - Portal*/
Route::get('site-sonhador', array('as' => 'site-sonhador-cadastro', 'uses' => '\Portal\SonhadorController@getCadastroSite'));
Route::post('site-sonhador', array('as' => 'site-sonhador-cadastro', 'uses' => '\Portal\SonhadorController@postCadastroSite'));


/* Banner Metrica */
Route::get('/metrica/banners/{page}/{id}',array('as' => 'metrica-banners','uses' => '\Portal\AnuncioMetricaController@getLinkBanner'));


/*Fidelidade*/
Route::get('club/{indicador}', array('as' => 'link_indicacao', 'uses' => '\Portal\FidelidadeController@getLinkIndicacao'));
Route::get('isonhei-club/loja/{url?}/', array('as' => 'isonhei-club-loja', 'uses' => '\Portal\FidelidadeController@getPrateleiraProdutos'));

//Route::get('isonhei-club/loja/{url}', array('as' => 'isonhei-club-loja-filtro', 'uses' => '\Portal\FidelidadeController@getFiltroPrateleira'));
Route::get('isonhei-club/produto/{url}', array('as' => 'isonhei-club-produto', 'uses' => '\Portal\FidelidadeController@getProduto'));
Route::get('isonhei-club/produto/{url}/resgate', array('as' => 'get-isonhei-club-resgate', 'uses' => '\Portal\FidelidadeController@getProdutoResgate'));
Route::post('isonhei-club/produto/resgate', array('as' => 'post-isonhei-club-resgate', 'uses' => '\Portal\FidelidadeController@postProdutoResgate'));


/*Correio*/
Route::get('correio-frete/{cepDestino?}/{produtoId?}', array('as' => 'correio-frete', 'uses' => '\Portal\CorreioController@getPrazoValor'));
Route::get('correio-cep/{cep?}', array('as' => 'correio-cep', 'uses' => '\Portal\CorreioController@getDadosCep'));


/*Busca Portal*/
Route::get('busca', array('as' => 'busca', 'uses' => '\Portal\BuscaController@getBusca'));


/*Cupom de desconto*/
Route::get('desconto/cupons-de-desconto', array('as' => 'lista-cupons-de-desconto', 'uses' => '\Portal\CupomController@getListaCupons'));
Route::get('desconto/cupons-de-desconto/{url}', array('as' => 'lista-cupons-de-desconto-empresa', 'uses' => '\Portal\CupomController@getListaCuponsEmpresa'));


//Rotas Usuario e Login
Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
Route::post('signin', array('as' => 'signin', 'uses' => 'AuthController@postSignin'));
Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword')); //Validar
Route::post('ativar-conta', array('as' => 'ativar-conta', 'uses' => 'AuthController@postVerificarExistenciaUsuario')); // disparar email de ativação caso solicitado


#ACTIVE account
Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

# Forgot Password Confirmation
Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
Route::post('forgot-password/{passwordResetCode}', array('as' => 'post-forgot-password-confirm', 'uses' => 'AuthController@postForgotPasswordConfirm'));


/*Modulo Sonhador - Site do usuario - Portal*/
Route::get('/sonhador/confirmar-pedido-cota/{cotaid}', array('as' => 'sonhador-confirmar-pedido-cota', 'uses' => '\Sonhador\SiteSonhadorController@getConfirmacaoPedidoCota'));
Route::post('/sonhador/criar-pedido-cota/', array('as' => 'post-sonhador-pedido-cota', 'uses' => '\Sonhador\SiteSonhadorController@postPedidoCota'));
Route::get('/sonhador/pedido-cota-obrigado/{codpedidopagseguro?}/{codtransacao?}', array('as' => 'sonhador-pedido-cota-obrigado', 'uses' => '\Sonhador\SiteSonhadorController@getPedidoObrigado'));

Route::get('/sonhador/{id?}/', array('as' => 'site-do-sonhador', 'uses' => '\Sonhador\SiteSonhadorController@getSite'));


/* Paginas Estaticas - Portal */
Route::get('/sobre/', array('as' => 'page-sobre', 'uses' => '\Portal\PagesController@getPageSobre'));
Route::get('/anuncie/', array('as' => 'page-anuncie', 'uses' => '\Portal\PagesController@getPageAnuncie'));
Route::get('/contato/', array('as' => 'page-contato', 'uses' => '\Portal\PagesController@getPageContato'));
Route::post('/contato/', array('as' => 'page-contato', 'uses' => '\Portal\PagesController@postPageContato'));
Route::get('/termo-e-politica/', array('as' => 'page-termo', 'uses' => '\Portal\PagesController@getPageTermo'));
Route::get('/isonhei-club/', array('as' => 'page-fidelidade', 'uses' => '\Portal\PagesController@getPageFidelidade'));
Route::post('/compartilhe/', array('as' => 'compartilhe', 'uses' => '\Portal\PagesController@postPageCompartilhe'));
//Route::get('/conheca-isonhei/turismo', array('as' => 'page-apresentacao-turismo', 'uses' => '\Portal\PagesController@getPageApresentacao'));
Route::get('/vantagens/cheque-teatro', array('as' => 'page-cheque-teatro', 'uses' => '\Portal\PagesController@getPageChequeTeatro'));
//Route::get('/vantagens-cadastrado', array('as' => 'page-vantagens-cadastrado', 'uses' => '\Portal\PagesController@getPageVantagensCadastrado'));
Route::get('/empresas-conveniadas', array('as' => 'page-empresas-conveniadas', 'uses' => '\Portal\PagesController@getPageEmpresasConveniadas'));


/* Guia de Empresa */
Route::get('/fornecedores/categorias', array('as' => 'guia-de-empresas-categorias', 'uses' => '\Portal\GuiaDeEmpresasController@getCategorias'));
Route::get('/fornecedores/filtro/{categoria}/{cidade}', array('as' => 'get-guia-de-empresas-filtro', 'uses' => '\Portal\GuiaDeEmpresasController@getAnunciosByFiltro'));
Route::get('/fornecedores/{url}', array('as' => 'guia-de-empresas-anuncio', 'uses' => '\Portal\GuiaDeEmpresasController@getAnuncio'));
Route::post('/fornecedores', array('as' => 'guia-de-empresas-form-contato', 'uses' => '\Portal\GuiaDeEmpresasController@postContato'));


/* Metrica */
Route::get('/metrica/guia-de-empresas-metrica/{anuncioid}/{paginaid}/{tipoid}/{posicao}/{chave}', array('as' => 'guia-de-empresas-metrica', 'uses' => '\Portal\GuiaMetricaController@metrica'));
Route::get('/metrica/guia-de-empresas-telefone/{clienteid}', array('as' => '/metrica/guia-de-empresas-telefone/', 'uses' => '\Portal\GuiaMetricaController@getTelefone'));
Route::get('/metrica/guia-de-empresas-endereco/{clienteid}', array('as' => '/metrica/guia-de-empresas-endereco/', 'uses' => '\Portal\GuiaMetricaController@getEndereco'));
Route::get('/metrica/guia-de-empresas-site/{clienteid}', array('as' => '/metrica/guia-de-empresas-site/', 'uses' => '\Portal\GuiaMetricaController@getSite'));
Route::get('/metrica/guia-de-empresas-redesocial/{clienteid}', array('as' => '/metrica/guia-de-empresas-redesocial/', 'uses' => '\Portal\GuiaMetricaController@getRedesSociais'));

Route::get('/metrica/site', function(){ LogMetrica::savarLogMetricaSite($_GET['pagina'], $_GET['metrica']); });


/* NewsLetter */
Route::get('/newsletter', array('as' => 'newsletter', 'uses' => '\Portal\NewsletterController@getNewsletter'));
Route::post('/newsletter', array('as' => 'newsletter', 'uses' => '\Portal\NewsletterController@postNewsletter'));


/* Modulo Conteudo - Portal */
Route::get('/categoria/{pai}', array('as' => 'conteudo-categoria-pai', 'uses' => '\Portal\ConteudoController@getConteudosCategoria'));
Route::get('/categoria/{pai}/{filha}/', array('as' => 'conteudo-categoria-filha', 'uses' => '\Portal\ConteudoController@getConteudosCategoria'));
Route::get('/{conteudo}/', array('as' => 'conteudo', 'uses' => '\Portal\ConteudoController@getConteudoByURL'));





