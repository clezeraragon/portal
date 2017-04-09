<?php

namespace Portal;

use Input, Mail, Redirect, LogCompartilha, Request, LogContato, Session,Cookie;
use View, Lang; // Padrao

class PagesController extends BaseController
{

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct()
    {
        $this->data = array(
            'view_dir' => 'portal.pagina',
        );
    }
    public function getModalAtivarConta()
    {
        return Redirect::route("portal")
            ->withInput()
            ->with(array('ativar' => true));
    }

    public function getPageSobre()
    {
        $this->data += array(
            'title_pag' => "Sobre",
            'title_seo' => "Conheça o iSonhei",
            'description' => "O iSonhei foi criado para ser um Portal onde as pessoas podem encontrar meios para realizar seus sonhos.",
            'keywords' => "iSonhei, portal, realizar, sonhos"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.sobre')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function getPageAnuncie()
    {
        $this->data += array(
            'title_pag' => "Anuncie no iSonhei",
            'title_seo' => "Anuncie no iSonhei",
            'description' => "Amplie a visibilidade de seus negócios com o iSonhei, através de anúncios e campanhas exclusivas para um público segmentado.",
            'keywords' => "Anuncie,iSonhei,visibilidade,campanhas"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.anuncie')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function getPageContato()
    {
        $this->data += array(
            'title_pag' => "Contato – iSonhei",
            'title_seo' => "Contato – iSonhei",
            'description' => "Se você possuí alguma dúvida sobre o portal ou algum serviço oferecido pelo iSonhei, entre em contato pelo e-mail: isonhei@isonhei.com.br",
            'keywords' => "Contato,iSonhei, fale conosco",
            'route' => "contato"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.contato')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function postPageContato()
    {
        $input = Input::all();

        $input['ip'] = Request::getClientIp();
        $input['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $contato = new LogContato();
        $validator = $contato->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $contato->create($input);

            Mail::send('emails.contato.contato', array('nome' => Input::get('nome'), 'mensagem' => Input::get('mensagem')), function ($message) {
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))->subject(Input::get('assunto'))
                    ->to(Lang::get('general.empresa_email_geral'), Input::get('nome'))->subject(Input::get('assunto'))
                    ->cc(Input::get('email'), Input::get('nome'))->subject(Input::get('assunto'));

            });

            return Redirect::back()
                ->with('success', Lang::get('contato.success'));
        }
    }

    public function getPageTermo()
    {
        $this->data += array(
            'title_pag' => "TERMOS E POLÍTICAS",
            'title_seo' => "TERMOS E POLÍTICAS",
            'description' => "Conheça todos os detalhes dos termos e política de todos os serviços oferecidos pelo Portal iSonhei.",
            'keywords' => "TERMOS E POLÍTICAS,iSonhei"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.termos')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function getPageFidelidade()
    {
        $this->data += array(
            'title_pag' => "iSonhei Club",
            'title_seo' => "iSonhei Club",
            'description' => "Cadastre-se gratuitamente e acumule pontos no iSonhei Club. Sua pontuação pode ser trocada por prêmios incríveis.",
            'keywords' => "iSonhei, programa de fidelidade, club, prêmios"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.fidelidade')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function postPageCompartilhe()
    {
        $input = Input::all();

        //Metrica para compartilhamento de página do guia de empresa
        if(isset($input['idEmpresa'])){
            $metrica = new \GuiaMetrica();
            $metrica->saveMetrica($input['idEmpresa'], 2, 8, null, null);
        }

        $input['ip'] = Request::getClientIp();
        $input['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $compartilhe = new LogCompartilha();

        $validator = $compartilhe->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $compartilhe->create($input);

            $dados_to_form = array(
                'assunto' => 'Seu amigo ' . Input::get('from_nome') . ' indicou uma página no Portal iSonhei.',
                'assuntoCopia' => 'Copia da sua indicação no Portal iSonhei.',
                'from_nome' => Input::get('from_nome'),
                'mensagem' => Input::get('mensagem'),
                'nomeEmpresa' => Input::get('nomeEmpresa'),
                'to_nome' => Input::get('to_nome'),
                'urlPortal' => Input::get('link')
            );

            Mail::send('emails.compartilhe.compartilhe', $dados_to_form, function ($message) use ($dados_to_form) {
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->subject($dados_to_form['assunto'])
                    ->to(Input::get('to_email'), Input::get('to_nome'));
            });

            Mail::send('emails.compartilhe.compartilhe', $dados_to_form, function ($message) use ($dados_to_form) {
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->to(Input::get('from_email'), Input::get('from_nome'))
                    ->subject($dados_to_form['assuntoCopia']);

            });

            return Redirect::back()
                ->with('success', Lang::get('Sua mensagem foi enviada com sucesso'));
        }
    }

    public function getCadastroFacebook()
    {
        // Ativar o poupup do cadastro apos acessar a URL (cadastro/facebook)

        return Redirect::route("portal")
            ->withInput()
            ->with(array('create-account' => true));

    }

    public function getPageApresentacao()
    {
        $this->data += array(
            'title_pag' => "Faça parte do iSonhei",
            'title_seo' => "Faça parte do iSonhei",
            'description' => "Faça parte do iSonhei",
            'keywords' => "iSonhei, portal, realizar, sonhos"
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.apresentacao')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function getPageChequeTeatro()
    {
        $this->data += array(
            'title_pag' => "Cheque Teatro",
            'title_seo' => "Cheque Teatro",
            'description' => "Cheque Teatro",
            'keywords' => ""
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.cheque-teatro')
            ->with(array(
                'data' => $this->data
            ));
    }

    public function getPageEmpresasConveniadas()
    {
        $this->data += array(
            'title_pag' => "Empresas Conveniadas",
            'title_seo' => "Empresas Conveniadas",
            'description' => "Empresas Conveniadas",
            'keywords' => ""
        );

        $files = \File::files("portal/images/empresas-conveniadas");

        $this->layout->content = View::make($this->data['view_dir'] . '.empresas-conveniadas')
            ->with(array(
                'data' => $this->data,
                'path_empresas' => $files
            ));
    }

    public function getPageVantagensCadastrado()
    {
        $this->data += array(
            'title_pag' => "Cadastrado",
            'title_seo' => "Cadastrado",
            'description' => "Cadastrado",
            'keywords' => ""
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.vantagens-cadastrado')
            ->with(array(
                'data' => $this->data
            ));
    }


}
