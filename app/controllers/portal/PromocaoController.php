<?php

namespace Portal;

use Session, Redirect, Sentry, PDF, View;
use LogMetrica;

class PromocaoController extends BaseController
{

    public function getCadastroPromocao($promocao)
    {
        //limpar sessões
        Session::forget('fidelidade_indicador');
        Session::forget('promocao');

        if($promocao == "condominio")
        {
            //retirando a promocao do ar
            return $this->get404();

            Session::put('utm.campaign', "condominio");
            Session::put('utm.source', "source");
            Session::put('utm.medium', "medium");
            Session::put('utm.term', "term");
            Session::put('utm.content', "content");

            Session::put('promocao', $promocao);

            //Salva log de acesso ao portal pelo link de indicação
            LogMetrica::savarLogLinkIndicacaoFidelidade("promocao", true, "Promoção:Condomínio Shop Club Guarulhos");

            if(Sentry::check()){
                return Redirect::route("portal-painel");
            }
            else {
                return Redirect::route("portal")
                    ->withInput()
                    ->with(array('create-account' => true));
            }
        }

        return Redirect::route("portal");
    }

    public function getPromoCupom()
    {
        $html_voucher = View::make('portal.promocao.cupom_condominio', array());

        return PDF::load($html_voucher, 'A4', 'landscape')
            ->download('iSonhei');

        return Redirect::route("portal-painel");
    }

}


