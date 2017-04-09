<?php

namespace Portal;

use User, Fidelidade, UserDados, UsuarioCampanhas, UsuarioConvidado, FidelidadeAcao;
use View, Input, Redirect, ModelNotFoundException, Util, Lang, Sentry, Mail;

class PainelController extends BaseController {

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    protected $user_id;

    public function __construct()
    {
        $this->user_id = \Sentry::getUser()->id;

        $this->data = array(
            'title_seo' => "Painel",
            'description_seo' => "Painel",
            'keywords_seo' => "painel",
            'title_pag' => "Painel de Controle",
            'view_dir' => 'portal.painel'
        );
    }

    public function index()
    {
        $fidelidade = new Fidelidade();

        $saldo_pontos = $fidelidade->getSaldoPontosByUser($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
                'link_fidelidade' => Fidelidade::getLinkIndicacao($this->user_id),
                'pontos' => $saldo_pontos
            ));
    }

    public function editUser()
    {
        try {

            $this->data['route'] = 'usuario';

            $user = new User();
            $usuario = $user->findOrFail($this->user_id);

            $this->layout->content = View::make($this->data['view_dir'] . '.editar_usuario', compact('usuario'))->with(array('data' => $this->data));

        } catch(ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }

    }

    public function updateUser()
    {
        $user = new User();

        $input = Input::all();
        $input['first_name'] = User::formataNome($input['first_name']);
        $input['last_name']  = User::formataNome($input['last_name']);

        //elimina este campos por seguranca, caso algum usuario retire a tag disable do formulario
        if(Sentry::getUser()->cpf) {
            unset($input['cpf']);
        }
        unset($input['email']);

        $validator = $user->validateUserPortal($input);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {

            $input['dt_nascimento'] = Util::toMySQL(Input::get('dt_nascimento'));

            if($input['password'] === '') {
                unset($input['password']);
            }
            unset($input['password_confirm']);

            $input = $user->setnull($input);

            $user = Sentry::getUserProvider()->findById($this->user_id);
            $user->update($input);

            return Redirect::to(Route('editar-usuario'))
                ->with('success', Lang::get('crud.update.success'));
        }
    }


    public function completaCadastroFidelidade()
    {
        $user = new User();
        $input = Input::all();

        $dados = array("telefone" => $input['telefone']);

        if(!Sentry::getUser()->cpf) {
            $dados += array("cpf" => $input['cpf']);
        }

//        dd($dados);

        $validator = $user->validateDadosFidelidade($dados);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', "Verifique os erros e tente novamente. ");
        } else {

            $user = Sentry::getUserProvider()->findById($this->user_id);
            $user->update($dados);

            $movFid  = new Fidelidade();
            $movFid->liberaMovimentacaoEntradaByUser($this->user_id);

            return Redirect::back()
                ->with('success', "Dados revisados com sucesso! Seus pontos foram liberados.");
        }
    }


    public function getResgatesFidelidade()
    {
        $fidelidade = new \Fidelidade();

        $resgates = $fidelidade->getResgatesByUser($this->user_id);

        $saldo_pontos = $fidelidade->getSaldoPontosByUser($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.fidelidade_resgate')
            ->with(array(
                'data' => $this->data,
                'pontos' => $saldo_pontos,
                'resgates' => $resgates
            ));
    }


    public function getExtratoFidelidade()
    {
        $fidelidade = new \Fidelidade();

        $saldo_pontos = $fidelidade->getSaldoPontosByUser($this->user_id);

        $movimentacaoEntradaPendente = $fidelidade->getMovimentacaoEntradaPendenteByUser($this->user_id);
        $movimentacaoEntradaLiberada = $fidelidade->getMovimentacaoEntradaLiberadaByUser($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.fidelidade_acumulo')
            ->with(array(
                'data' => $this->data,
                'pontos' => $saldo_pontos,
                'movimentacaoEntradaPendente' => $movimentacaoEntradaPendente,
                'movimentacaoEntradaLiberada' => $movimentacaoEntradaLiberada
            ));
    }


    public function getSitesSonhador()
    {
        $sonhador = new \Sonhador();
        $sites = $sonhador->getGridSitesByUser($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.sites')
            ->with(array(
                'data' => $this->data,
                'sites' => $sites
            ));
    }

    public function getCotasSonhador()
    {
        $cota_pedido = new \SiteCotaPedido();
        $cotas = $cota_pedido->getPedidosLiberadosBySonhador($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.cotas')
            ->with(array(
                'data' => $this->data,
                'cotas' => $cotas
            ));
    }

    public function getRecadosSonhador()
    {
        $recado = new \SiteRecado();
        $recados = $recado->getRecadosByUser($this->user_id);

        $this->layout->content = View::make($this->data['view_dir'] . '.recados')
            ->with(array(
                'data' => $this->data,
                'recados' => $recados
            ));
    }

    public function getRanking()
    {
        $fidelidade      = new \Fidelidade();
        $saldo_pontos    = $fidelidade->getSaldoPontosByUser($this->user_id);
        $total_acumulado = $fidelidade->getTotalPontosByTipoAndUser("entrada", $this->user_id);

        $gamefication = new \Gamefication();
        $nivelAtual    = $gamefication->getNivelAtual(\Sentry::getUser()->gamefication_id);
        $proximoNivel  = $gamefication->getProximoNivel(\Sentry::getUser()->gamefication_id);

        if(isset($proximoNivel->pontos)) {
            $pontos_proximo_nivel = $proximoNivel->pontos - $total_acumulado;
        }
        else{
            $pontos_proximo_nivel = "N/D";
        }

        if(!isset($proximoNivel->nome)){
            $proximoNivel = null;
        }

        $this->layout->content = View::make($this->data['view_dir'] . '.ranking')
            ->with(array(
                'data' => $this->data,
                'pontos' => $saldo_pontos,
                'pontos_proximo_nivel' => $pontos_proximo_nivel,
                'nivel_atual' => $nivelAtual,
                'nivel_seguinte' => $proximoNivel
            ));
    }

    public function getExpoNoivas()
    {
        $this->layout->content = View::make($this->data['view_dir'] . '.expo_noivas')->with(array('data' => $this->data));

    }

    public function getRegistroDePontos()
    {
        $this->data['route'] = 'post-registre-de-pontos';

        $this->layout->content = View::make($this->data['view_dir'] . '.registro-pontos')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function postRegistroDePontos()
    {
        $input = Input::all();

        $fid_codigo = new \FidelidadeCodigo();
        $retorno = $fid_codigo->verificaCodigo(Sentry::getUser()->id, $input['codigo']);
        //dd($retorno);

        //1 = passo nos requisitos
        if($retorno['cod'] == 1)
        {
            $codigo = $retorno["retorno"]; //array com os dados do codigo salvos no banco
            $fidelidade = new Fidelidade();
            $fidelidade->processaCodigo(Sentry::getUser()->id, $codigo);

            return Redirect::back()
                ->with('success', Lang::get('crud.create.success'));
        }
        else {

            return Redirect::back()
                ->withInput()
                ->with('error', $retorno["retorno"]);
        }
    }

    public function getPromoEnquete()
    {
        $this->data['route'] = '/painel/enquete';

        $this->layout->content = View::make($this->data['view_dir'] . '.enquete')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function postPromoEnquete()
    {
        $user_id     = Sentry::getUser()->id;
        $campanha_id = 1;

        $input = Input::all();

        if($input['pergunta1'] == "Outros"){
            if($input['p1_outros']) {
                $input['pergunta1'] = $input['p1_outros'];
            }
        }

        $dados_enquete = array(
            "user_id" => $user_id,
            "maior_sonho" => $input['pergunta1'],
            "principal_meio_comunicacao" => $input['pergunta3']
        );

        $usuario = new User();
        $usuario = $usuario->findOrFail($user_id);

        //Sincroniza interesses
        if(isset($input['pergunta2'])) {
            $usuario->interesses()->sync($input['pergunta2']);
        }

        //Dados Extra do Usuário
        $userDados = new UserDados();
        $usuario_dados = $userDados->getDadosByUserId($user_id);
        if(isset($usuario_dados->id)){

            $usuario_dados_update = $userDados->findOrFail($usuario_dados->id);

            $usuario_dados_update->update($dados_enquete);
        }
        else{
            $userDados->create($dados_enquete);
        }

        $user_campanha = new UsuarioCampanhas();
        $user_campanha->cadastraUsuarioCampanha($user_id, $campanha_id);

        return Redirect::route("portal-painel");
    }

    public function getConvidarAmigo()
    {
        $this->data['route'] = 'post-convidar-amigo';

        $fidelidade = new Fidelidade();
        $indicacoes_pendente = $fidelidade->getIndicacoesPendentesAceitacao($this->user_id);

        $mensagem_padrao =
            "Olá, amigo.<br>
            Estou te enviando este convite para se cadastrar no iSonhei, o portal inspirador de sonhos. Além de matérias interessantes e vários fornecedores que oferecem descontos, você pode contar com o iSonhei Club, um clube de vantagens onde você soma pontos e pode trocar por produtos dentro do iSonhei Store. Tem também o Site do Sonhador, com ele é possível divulgar os sonhos para os amigos e se você quiser, arrecadar fundos para ajudar na realização.
            <br>
            O melhor de tudo é que os benefícios são gratuitos e exclusivos para os usuários cadastrados, então aproveite e cadastre-se agora mesmo.";

        $this->layout->content = View::make($this->data['view_dir'] . '.convidar-amigo')
            ->with(array(
                'data' => $this->data,
                'msg' => $mensagem_padrao,
                'pontos_indicacao' => FidelidadeAcao::getPontosByAcaoId(4)->pontos,
                'pontos_cadastro_indicacao' => FidelidadeAcao::getPontosByAcaoId(3)->pontos,
                'indicacoes_pendente' => $indicacoes_pendente
            ));
    }

    public function postConvidarAmigo()
    {
        $convite = new UsuarioConvidado();

        $input = Input::all();
        $input['from_user_id'] = $this->user_id;
        $input['nome']         = User::formataNome($input['nome']);
        $input['email']        = User::formataEmail($input['email']);

        $validator = $convite->validate($input);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', "O convite não pode ser enviado. Verifique os erros e tente novamente. ");
        } else {

            $input = $convite->setnull($input);
            $convite->create($input);

            //envio de e-mail
            $data = array(
                'remetente' => Sentry::getUser()->first_name . " " . Sentry::getUser()->last_name,
                'link' => Fidelidade::getLinkIndicacao($this->user_id),
                'mensagem' => $input['mensagem']
            );

            Mail::send('emails.fidelidade.convidar-amigos', $data, function ($m) use ($input) {
                $m->to($input['email'], $input['nome']);
                $m->subject('Convite para fazer parte do iSonhei');
            });

            return Redirect::back()
                ->with('success', "Convite enviado com sucesso!");
        }
    }
}
