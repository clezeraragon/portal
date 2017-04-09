<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 14/04/2015
 * Time: 10:00
 */
namespace Portal;

use Input, Mail, Redirect, Request, Response, Session, Sentry, User, Cartalyst\Sentry\Users, Validator;
use View, Lang, Util, Gamefication, URL, UserDados; // Padrao


class ExpoNoivasController extends BaseController
{
    /**
     * Metodo continua ativo, caso alguma noiva acesso o link divulgado no evento.
     * @return mixed
     */
    public function getPageExpo()
    {
//        Session::set('portal_isonhei', 'exponoivas2015');
        return Redirect::to("/categoria/fica-a-dica/casamento");
    }


    /**
     * Metodo desativado após exponoivas
     * @return mixed
     */
    public function postPageExpo()
    {

//        if (Sentry::check()) {  // verica se está logado para evitar recadastro
//            return Redirect::route('portal-painel');
//        }
//
//        Session::set('utm.source', 'portal_isonhei');
//        Session::set('utm.medium', 'exponoivas2015');
//        Session::set('utm.content', 'pagina_cadastro');
//        Session::set('utm.campaign', 'ebook12erros');
//
//        $perfil = Input::get('perfil_exponoiva');
//
//        if ($perfil == "Parente" || $perfil == "Madrinha" || $perfil == "Outro") {
//            $regras = array(
//                'local_cerimonia_exponoiva' => '',
//                'local_festa_exponoiva' => '',
//                'perfil_exponoiva' => 'required',
//                'dt_evento_exponoiva' => '',
//            );
//
//        } else {
//            $regras = array(
//                'local_cerimonia_exponoiva' => 'required|min:3',
//                'local_festa_exponoiva' => 'required|min:3',
//                'perfil_exponoiva' => 'required',
//                'dt_evento_exponoiva' => 'required|date_format:d/m/Y|after:17/04/2015',
//            );
//        }
//
//        User::addRules($regras); // adiciona novas regras para os inputs dinamicamente
//
//        // Create a new validator instance from our validation rules
//        $validator = Validator::make(Input::all(), User::getRules()); //User::getRules() centralização das rules na classe User
//
//        // If validation fails, we'll exit the operation now.
//        if ($validator->fails()) {
//            // Ooops.. something went wrong
////            return Redirect::to(URL::previous() . '#create-account')->withInput()->withErrors($validator);
//            if (Request::ajax()) {
//                # caso seja uma requisição por ajax retornar resposta dos erros por json
//                return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
//            }
//        }
//
//        try {
//            $dados = array(
//                'first_name' => Input::get('first_name'),
//                'last_name' => Input::get('last_name'),
//                'email' => Input::get('email'),
//                'password' => Input::get('password'),
//                'activated' => 0, // make it 0 if you don't want to activate user on registration
//                'dt_nascimento' => Util::toMySQL(Input::get('dt_nascimento')),
//                'cpf' => Input::get('cpf'),
//                'telefone' => Input::get('telefone'),
//                'st_newsletter' => (Input::get('st_newsletter') == 1) ? Input::get('st_newsletter') : 0,
//                'genero' => Input::get('genero'),
//                'perfil_id' => User::getPerfilPadrao(),
//                'gamefication_id' => Gamefication::getNivelPadrao()
//            );
//
//            if (Session::has('utm.source')) {
//                $dados['utm_source'] = Session::get('utm.source');
//            }
//            if (Session::has('utm.medium')) {
//                $dados['utm_medium'] = Session::get('utm.medium');
//            }
//            if (Session::has('utm.term')) {
//                $dados['utm_term'] = Session::get('utm.term');
//            }
//            if (Session::has('utm.content')) {
//                $dados['utm_content'] = Session::get('utm.content');
//            }
//            if (Session::has('utm.campaign')) {
//                $dados['utm_campaign'] = Session::get('utm.campaign');
//            }
//
//
//            //FIDELIDADE
//            if (Session::has('fidelidade_indicador')) {
//                $dados['fidelidade_indicador_id'] = Session::get('fidelidade_indicador');
//            }
//
//            // Register the user
//            $user = Sentry::register($dados);
//            $dados_extras = array(
//                'user_id' => Sentry::getUser()->id,
//                'perfil_exponoiva' => Input::get('perfil_exponoiva'),
//                'local_cerimonia_exponoiva' => (Input::get('local_cerimonia_exponoiva') == 'null') ? null : Input::get('local_cerimonia_exponoiva'),
//                'local_festa_exponoiva' => (Input::get('local_festa_exponoiva') == 'null') ? null : Input::get('local_festa_exponoiva'),
//                'dt_evento_exponoiva' => (Input::get('dt_evento_exponoiva') == '20/04/2014' ? null : Util::toMySQL(Input::get('dt_evento_exponoiva')))
//            );
//            UserDados::create($dados_extras);
//
//            // Data to be used on the email view
//            $data = array(
//                'user' => $user,
//                'activationUrl' => URL::route('activate', $user->getActivationCode()),
//            );
//
//            // Send the activation code through email
//            Mail::send('emails.auth.register-activate', $data, function ($m) use ($user) {
//                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
//                $m->subject('Bem Vindo ' . $user->first_name);
//            });
//
//            //limpar sessão RUS-012
//            Session::forget('utm');
//
//            //limpar sessão indicacao fidelidade
//            Session::forget('fidelidade_indicador');
//
//            //Redirect
//            return Response::json(['success' => true, Lang::get('auth/message.signup.success')]);
////            return Redirect::route("portal")->with('success', Lang::get('auth/message.signup.success'));
//
//
//        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
//            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
//        }
//
//        // Ooops.. something went wrong
////        return Redirect::back()->withInput()->withErrors($this->messageBag);
//        return Response::json(array('success' => false, 'errors' => $this->messageBag->toArray()));

    }

}


