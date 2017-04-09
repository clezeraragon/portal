<?php

namespace Portal;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use View, Redirect, Input, Lang, Mail, Response, Sentry; // Padrao
use GuiaEmpresa, GuiaCategoria, GuiaCidade, GuiaContato, Cliente, Fidelidade, GuiaMetrica;

class GuiaDeEmpresasController extends BaseController
{

    /**
     * Classe model
     * @var
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(GuiaEmpresa $model)
    {
        $this->model = $model;
        $this->data = array(
            'view_dir' => 'portal.guia-empresa',
            'route' => 'guia-de-empresas'
        );
    }

    public function getCategorias()
    {
        $this->data += array(
            'title_pag' => "Guia de Fornecedores",
            'title_seo' => "Guia de Fornecedores",
            'description' => "Encontre prestadores de serviços que podem ajudar a realizar seus sonhos, como: bandas, buffets, resorts e doces personalizados.",
            'keywords' => "Guia de fornecedores, categorias, sonhos, produtos, serviços, bandas, buffets, resorts"
        );

        $categorias = GuiaCategoria::getCategorias();

        $this->layout->content = View::make($this->data['view_dir'] . '.categorias')
            ->with(array(
                'data' => $this->data,
                'categorias' => $categorias
            ));
    }

    public function getAnunciosByFiltro($categoria = "todas-categorias", $cidade = "todas-cidades")
    {
        $this->data += array(
            'description' => "Encontre de uma forma rápida e simples fornecedores",
            'keywords' => "Guia de empresa, sonhos, produtos, serviços, fornecedores,"
        );

        if($categoria != "todas-categorias"){
            $guia_categoria = new GuiaCategoria();
            $dados_categoria = $guia_categoria->getCategoriaByUrl($categoria);
            if(!$dados_categoria){
                return $this->get404();
            }

            $this->data["title_pag"]    = $dados_categoria->nome;
            $this->data["title_seo"]    = $dados_categoria->nome;
            $this->data["description"] .= " de " . $dados_categoria->nome;
            $this->data["path_img"]     = $dados_categoria->path_img;
        }else{
            $this->data["title_pag"] = "Empresas";
            $this->data["title_seo"] = "Empresas";
        }

        if($cidade != "todas-cidades"){
            $guia_cidade = new GuiaCidade();
            $dados_cidade = $guia_cidade->getCidadeByUrl($cidade);
            if(!$dados_cidade){
                return $this->get404();
            }

            $this->data["title_pag"]   .= " em " . $dados_cidade->nome;
            $this->data["title_seo"]   .= " em " . $dados_cidade->nome;
            $this->data["description"] .= " em " . $dados_cidade->nome;

        }

        $this->data["description"] .= " para realizar seus sonhos.";

        $anuncios = $this->model->getAnunciosByFiltro($categoria, $cidade);
//        dd($anuncios);

        $this->layout->content = View::make($this->data['view_dir'] . '.filtro')
            ->with(array(
                'data' => $this->data,
                'anuncios' => $anuncios,
                'categoria' => $categoria,
                'cidade' => $cidade
            ));
    }


    public function getAnuncio($url)
    {
        $anuncio = $this->model->getAnuncioById($url);
        if(!$anuncio){
            return $this->get404();
        }

        $fotos = $this->model->getFotosByAnuncioId($anuncio["guia_empresa_id"]);

        $fotoDestaque = $this->model->getFotoDestaque($anuncio["foto_id"]);

        $videos = $this->model->getVideosByAnuncioId($anuncio["guia_empresa_id"]);

        //Salva Metrica
        $metrica = new GuiaMetrica();
        $metrica->saveMetrica($anuncio["guia_empresa_id"], 2, 10, null, null);

        $this->data += array(
            'title_seo' => $anuncio['nm_nome_fantasia'] . " - " . $anuncio['categoria'],
            'description' => $anuncio['nm_nome_fantasia'] . " - " . $anuncio['descricao'],
            'keywords' => "guia de empresa, sonhos, produtos, serviços," . $anuncio['nm_nome_fantasia']
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.anuncio')
            ->with(array(
                'fotodestaque' => $fotoDestaque,
                'data' => $this->data,
                'anuncio' => $anuncio,
                'fotos' => $fotos,
                'videos' => $videos
            ));
    }

    public function postContato()
    {
        $input = Input::all();
        $guia_contato = new GuiaContato();

        if(Sentry::check()) {
            $input['user_id'] = Sentry::getUser()->id;
        }

        $validator = $guia_contato->validate($input);
        if ($validator->fails()) {

            return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));

        } else {

            if (Session::has('utm.source')) {
                $input['utm_source'] = Session::get('utm.source');
            }
            if (Session::has('utm.medium')) {
                $input['utm_medium'] = Session::get('utm.medium');
            }
            if (Session::has('utm.term')) {
                $input['utm_term'] = Session::get('utm.term');
            }
            if (Session::has('utm.content')) {
                $input['utm_content'] = Session::get('utm.content');
            }
            if (Session::has('utm.campaign')) {
                $input['utm_campaign'] = Session::get('utm.campaign');
            }


            $guia_contato = $guia_contato->create($input);

            //Fidelidade
            $dados_user_fidelidade = null;
            if(Sentry::check()){
                $fidelidade = new Fidelidade();
                $dados_user_fidelidade = $fidelidade->processaPedidoOrcamento(Sentry::getUser()->id, $input['nome'], $input['guia_empresa_id'], $guia_contato->id);
            }

            //Salva Metrica
            $metrica = new GuiaMetrica();
            $metrica->saveMetrica($input['guia_empresa_id'], 2, 5, null, null);


           // E-mail para o anunciante
            $dados_cliente = $this->model->getDadosGuiaClienteToEmail($input['guia_empresa_id']);
//            dd($dados_cliente);
            Mail::send('emails.guia-de-empresas.guia-empresas', array('cliente' => $dados_cliente['nm_nome_fantasia'], 'anuncio_cat' => $dados_cliente['categoria'],
                'dados_user_fidelidade' => $dados_user_fidelidade), function ($message) use ($dados_cliente) {
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->subject(Input::get('nome') . " entrou em contato com a sua empresa pelo Portal iSonhei")
                    ->to($dados_cliente['nm_email_responsavel'], $dados_cliente['nm_nome_fantasia'])
                    ->cc(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'));
            });

            // E-mail para o usuario do site
            Mail::send('emails.guia-de-empresas.copia-usuario', array('cliente' => $dados_cliente['nm_nome_fantasia'], 'anuncio_cat' => $dados_cliente['categoria'],
                'dados_user_fidelidade' => $dados_user_fidelidade), function ($message) use ($dados_cliente){
                $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                    ->to(Input::get('email'), Input::get('nome'))
                    ->subject("Contato com " . $dados_cliente['nm_nome_fantasia'] . " pelo Portal iSonhei");
            });

            return Response::json(array('check' => 'logado','success' => true, 'message' => Lang::get('guiaempresa.contato.success')));
        }
    }

}
