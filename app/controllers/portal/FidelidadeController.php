<?php

namespace Portal;

use Fidelidade, Produto, Anuncio, FidelidadeResgate, ProdutoEstoque, LogMetrica;

use View, Redirect, Session, Sentry, Lang, Input, Route, Mail, Paginator;

class FidelidadeController extends BaseController {

    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Fidelidade $model)
    {
        $this->model = $model;
    }

    /**
     * @param $remetente_id - Id criptografado do usuario que indicou o cadastrado
     * @return home com o popup de cadastro
     */
	public function getLinkIndicacao($indicador)
	{
        //limpar sessão indicacao fidelidade
        Session::forget('fidelidade_indicador');

        $user_id = $this->model->decriptografaCodigoIndicacao($indicador);

        $user = \User::find($user_id);
        if(isset($user->id)) {

            Session::put('fidelidade_indicador.id', $user_id);
            Session::put('fidelidade_indicador.nome', $user->first_name . " " . $user->last_name);

            //Salva log de acesso ao portal pelo link de indicação
            LogMetrica::savarLogLinkIndicacaoFidelidade($user_id, true);

            return Redirect::route("portal")
                ->withInput()
                ->with(array('create-account' => true));
        }
        else{

            //Salva log de acesso ao portal pelo link de indicação
            LogMetrica::savarLogLinkIndicacaoFidelidade($user_id, false);

            return Redirect::route("portal")
                ->with('warning', "O link utilizado não é válido para cadastro por indicação. Verifique se possui a informação correta para conclusão do seu cadastro.");
        }


	}

    public function getPrateleiraProdutos($url = 'default')
    {
        $this->data = array(
            'view_dir' => 'portal.fidelidade',
            'title_pag' => 'Troque seus Pontos',
            'title_seo' => 'Troque seus Pontos',
            'description' => 'No iSonhei você pode trocar seus pontos por prêmios como, celulares, tablets, perfumes e até diárias em um Resort na Disney.',
            'keywords' => 'iSonhei, loja, prêmios, produtos',
            'origem' => 'Prateleira'
        );
        $produtos = new Produto();

            if ($url == 'menor-pontuacao') {
                $campo = 'por_pontos';
                $order = "ASC";
                $produtos = $produtos->getPrateleiraProdutos($campo, $order);
            }
            if ($url == 'ordem-alfabetica') {
                $campo = 'nome';
                $order = "ASC";
                $produtos = $produtos->getPrateleiraProdutos($campo, $order);
            }
            if ($url == 'mais-recentes' || $url == 'default') {
                $campo = 'created_at';
                $order = "DESC";
                $produtos = $produtos->getPrateleiraProdutos($campo, $order);
            }

            //Paginacao
            $page = Input::get('page', 1);
            $slice = array_slice($produtos, 10 * ($page - 1), 10);
            $produtos = Paginator::make($slice, count($produtos), 10);


            $banners = new Anuncio();
            $bannersDinamicos = $banners->BannersDinamicos();

            $this->layout->content = View::make($this->data['view_dir'] . ".prateleira")
                ->with(array(
                    'data' => $this->data,
                    'produtos' => $produtos,
                    'bannersDinamicos' => $bannersDinamicos
                ));

    }


    public function getProduto($url)
    {
        $this->data = array(
            'view_dir' => 'portal.fidelidade',
            'title_pag' => 'iSonhei Store',
            'title_seo' => 'iSonhei Store',
            'description' => 'Loja iSonhei',
            'keywords' => 'Loja iSonhei',
            'origem' => 'Produto'
        );

        $produto = new Produto();
        $produto = $produto->getProdutoByUrl($url);
        if(!$produto){

            if(is_numeric($url) && $url > 0 && $url <=24){

                return Redirect::to(Route('isonhei-club-produto', array(\Produto::find($url)->url)), 301);
            }

            return Redirect::route("isonhei-club-loja");
        }

        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();
        $this->layout->content = View::make($this->data['view_dir'] . ".produto")
            ->with(array(
                'data' => $this->data,
                'produto' => $produto,
                'bannersDinamicos' => $bannersDinamicos
            ));
    }

    public function getProdutoResgate($produto_url)
    {
        //Verificação se o usuario esta logado
        if(!Sentry::check()){
            return Redirect::to(Route('isonhei-club-produto', $produto_url))
                ->withInput()
                ->with(array(
                    'warning' => Lang::get('fidelidade.resgate.login'),
                    'login' => true));
        }

        $produto = new Produto();
        $produto = $produto->getProdutoByUrl($produto_url);
        if(!$produto){
            return $this->get404();
        }

        //Verificação se o usuario tem ponto suficiente
        $saldo_pontos = $this->model->getSaldoPontosByUser(Sentry::getUser()->id);
        if($saldo_pontos < $produto->por_pontos){
            return Redirect::to(Route('isonhei-club-produto', $produto_url))
                ->withInput()
                ->with(array('resgatar' => true));
        }

        //Verificação se o produto esta em estoque
        if($produto->estoque < 1){
            return Redirect::to(Route('isonhei-club-produto', $produto_url))
                ->withInput()
                ->with(array('warning' => Lang::get('fidelidade.resgate.sem-estoque')));
        }

        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();

        $this->data = array(
            'view_dir' => 'portal.fidelidade',
            'title_pag' => 'iSonhei Store - Dados de Resgate',
            'title_seo' => 'iSonhei Store - Resgate',
            'description' => 'iSonhei Store - Resgate',
            'keywords' => 'Loja iSonhei',
            'origem' => 'Produto'
        );

        $this->layout->content = View::make($this->data['view_dir'] . ".resgate")
            ->with(array(
                'data' => $this->data,
                'produto' => $produto,
                'bannersDinamicos' => $bannersDinamicos
            ));
    }

    public function postProdutoResgate()
    {
        $input = Input::all();
        //dd($input);

        $input['frete'] = \Util::numberToMySQL($input['frete']);

        $produto = new Produto();
        $produto = $produto->getProdutoById($input['produto_id']);
        if(!$produto){
            return Redirect::route("404");
        }

        //Verificação se o usuario esta logado
        if(!Sentry::check()){
            return Redirect::to(Route('isonhei-club-produto', $produto->url))
                ->withInput()
                ->with(array(
                    'warning' => Lang::get('fidelidade.resgate.login'),
                    'login' => true));
        }

        //Verificação se o usuario tem ponto suficiente
        $saldo_pontos = $this->model->getSaldoPontosByUser(Sentry::getUser()->id);
        if($saldo_pontos < $produto->por_pontos){
            return Redirect::to(Route('isonhei-club-produto', $produto->url))
                ->withInput()
                ->with(array('resgatar' => true));
        }

        //Verificação se o produto esta em estoque
        if($produto->estoque < 1){
            return Redirect::to(Route('isonhei-club-produto', $produto->url))
                ->withInput()
                ->with(array('warning' => Lang::get('fidelidade.resgate.sem-estoque')));
        }

        $resgate = new FidelidadeResgate();
        $input = $resgate->completaInput($input); //Regras

        if($produto['produto_tipo_id'] == 2){
            $input['status_resgate_id'] = 4; //ID - Entregue
        }

        $validator = $resgate->validate($input);
        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            //cadastra resgate
            $resgate_cadastrado = $resgate->create($input);

            //lança resgate no fidelidade
            $this->model->processaResgateProduto(Sentry::getUser()->id, $produto['por_pontos'], $resgate_cadastrado->id);

            //atualiza estoque
            $produto_estoque = new ProdutoEstoque();
            $produto_estoque->atualizaEstoqueResgate($input['produto_id'], 1);

            $dados = $resgate->getDadosResgateToEmail($resgate_cadastrado->id);
            //dd($dados);

            Mail::send('emails.fidelidade.resgate', $dados, function ($message) use ($dados){
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->to(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->subject("Solicitação de Resgate");
            });

            return Redirect::to(Route('painel-resgate'))
                ->with(array('success' => Lang::get('fidelidade.resgate.sucesso')));
        }
    }

}
