<?php

namespace Portal;

use View, Input, Redirect, Validator, PDF, Mail, Lang, Cupom, Anuncio;
use Carbon\Carbon,Cache;

class CupomController extends BaseController {

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

    public function __construct(Cupom $model)
    {
        $this->model = $model;

        $this->data = array(
            'view_dir' => 'portal.cupom',
            'title_pag' => 'Cupons de Desconto',
            'title_seo' => 'Cupons de Desconto',
            'description' => 'Cupom de Desconto',
            'keywords' => 'Cupom de Desconto',
            'origem' => 'Cupom'
        );
    }

	public function getListaCupons()
	{
        $cupons = $this->model->getCupons();

        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();

        $this->layout->content = View::make($this->data['view_dir'] . ".index")
            ->with(array(
                'data' => $this->data,
                'cupons' => $cupons,
                'bannersDinamicos' => $bannersDinamicos,
            ));
	}

    public function getCupom($id)
    {
        $retorno = $this->model->verificaRegrasDownloadByCupomId($id);
        if($retorno['cod'] == 1)
        {
            $dados_cliente = \Cliente::find($retorno["retorno"]["cliente_id"]);
//            dd($dados_cliente);

            $cupom_log = new \CupomSolicitacoes();
            $cupom_log->cadastraSolicitacao($retorno["retorno"]["id"]);

            //envia e-mail para parceiro
            Mail::send('emails.cupom-de-desconto.cliente', array("titulo_desconto" => $retorno["retorno"]["titulo"], "voucher_desconto" => $retorno["retorno"]["voucher"],
                    "cliente" => $dados_cliente->nm_nome_fantasia),
                    function ($message) use($dados_cliente){
                    $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                        ->to($dados_cliente->nm_email_responsavel , $dados_cliente->nm_nome_fantasia)
                        ->cc(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                        ->subject("Portal iSonhei - Solicitação de Desconto");
            });

            $html_voucher = $this->model->getHtmlVoucher($retorno["retorno"], $dados_cliente);

            return PDF::load($html_voucher, 'A4', 'portrait')
                ->download('iSonhei - Cupom de Desconto');

        }
        else {

            return Redirect::back()
                ->with('error', $retorno["retorno"]);
        }

    }
    public function getListaCuponsEmpresa($url)
    {
        $cupons = $this->model->getCuponsEmpresa($url);

        $banners = new Anuncio();
        $bannersDinamicos = $banners->BannersDinamicos();
        $botton = "ok";

        $this->layout->content = View::make($this->data['view_dir'] . ".index")
            ->with(array(
                'data' => $this->data,
                'cupons' => $cupons,
                'botton' => $botton,
                'bannersDinamicos' => $bannersDinamicos,
            ));
    }

}
