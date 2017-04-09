<?php

namespace Admin;

use Sentry, View, Redirect;

class DashboardController extends BaseController {

    public function showAdmin()
    {
        if(Sentry::check()) {

            $user = new \User();
            $acesso = new \LogAcesso();
            $guiaContato = new \GuiaContato();
            $logMetrica = new \LogMetrica();

            return View::make('admin/index')->with(array(
                "m_cadastro" => array(
                    "total" => $user->getCadastroUsuarioByTime("*"),
                    "hoje" => $user->getCadastroUsuarioByTime(),
                    "semana" => $user->getCadastroUsuarioByTime(7),
                    "mes" => $user->getCadastroUsuarioByTime(30)
                ),
                "m_ativacao" => array(
                    "total" => $user->getAtivacaoUsuarioByTime("*"),
                    "hoje" => $user->getAtivacaoUsuarioByTime(),
                    "semana" => $user->getAtivacaoUsuarioByTime(7),
                    "mes" => $user->getAtivacaoUsuarioByTime(30)
                ),
                "m_login" => array(
                    "total" => $acesso->getLoginUsuarioByTime("*"),
                    "hoje" => $acesso->getLoginUsuarioByTime(),
                    "semana" => $acesso->getLoginUsuarioByTime(7),
                    "mes" => $acesso->getLoginUsuarioByTime(30)
                ),
                "m_guiacontato" => array(
                    "total" => $guiaContato->getGuiaContatoByTime("*"),
                    "hoje" => $guiaContato->getGuiaContatoByTime(),
                    "semana" => $guiaContato->getGuiaContatoByTime(7),
                    "mes" => $guiaContato->getGuiaContatoByTime(30)
                ),
                "m_indicacao_link_fidelidade" => array(
                    "total" => $logMetrica->getAcessoLinkIndicacaoByTime("*"),
                    "hoje" => $logMetrica->getAcessoLinkIndicacaoByTime(),
                    "semana" => $logMetrica->getAcessoLinkIndicacaoByTime(7),
                    "mes" => $logMetrica->getAcessoLinkIndicacaoByTime(30)
                ),
                "m_cadastro_fidelidade" => array(
                    "total" => $user->getCadastroFidelidadeByTime("*"),
                    "hoje" => $user->getCadastroFidelidadeByTime(),
                    "semana" => $user->getCadastroFidelidadeByTime(7),
                    "mes" => $user->getCadastroFidelidadeByTime(30)
                )
            ));
        }
        else{
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
        }
    }

}
