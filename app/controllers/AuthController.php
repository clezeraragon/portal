<?php

class AuthController extends BaseController
{
    /**
     * Account sign in.
     *
     * @return View
     */


    public function getSignin()
    {
        // Is the user logged in?
        if (Sentry::check()) {
            return Redirect::route('dashboard');
        }

        // Show the page
//        return View::make('admin.login');
//        return View::make('portal.layouts.login');
//        return Redirect::to('#log-in');

        return Redirect::to('/')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
//
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postSignin()
    {
        // Declare the rules for the form validation
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|between:3,32',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {

            if (Request::ajax()) {
                # caso seja uma requisição por ajax retornar resposta dos erros por json
                return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
            }
        }

        try {

            $user = Sentry::getUserProvider()->findByLogin(Input::get('email'));
            if ($user->st_portal_antigo == 1) {

                $this->processaUsuarioPortalAntigo($user);

                $this->messageBag->add('email', "A senha desta conta precisa ser redefinida, foi enviado um e-mail com novas instruções de acesso.");
                return Response::json(array('success' => false, 'errors' => $this->messageBag->toArray()));
            }

            // Try to log the user in
            Sentry::authenticate(Input::only('email', 'password'), Input::get('remember-me', 0));

            // Get the page we were before
            $redirect = Session::get('loginRedirect', 'account');

            // Unset the page we were before from the session
            Session::forget('loginRedirect');

            /* RUS-010 */
            if (!Cache::has('funcionalidades' . Sentry::getUser()->id)) {
                $funcionalidades = null;
                foreach (Sentry::getUser()->perfil->funcionalidades as $funcionalidade) {
                    $funcionalidades[] = $funcionalidade->metodo;
                }
                Cache::put('funcionalidades' . Sentry::getUser()->id, $funcionalidades, 600);
            }

            //registrar log de acesso
            $log = new LogAcesso();
            $log->savarLogAcesso(Sentry::getUser()->id);

            // Redirect to the users page

//            return Redirect::to("portal-painel")->with('success', Lang::get('auth/message.signin.success'));

            return Redirect::route("portal-painel")->with('success', Lang::get('auth/message.signin.success')); //RUS-007

        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_banned'));
        }

        // Ooops.. something went wrong
        # retornar as exceções e os erros de acesso do login
        return Response::json(array('success' => false, 'errors' => $this->messageBag->toArray()));

    }


    public function processaUsuarioPortalAntigo($user)
    {
        // Data to be used on the email view
        $data = array(
            'user' => $user,
            'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
        );

        // Send the activation code through email
        Mail::send('emails.auth.forgot-antigo-portal', $data, function ($m) use ($user) {
            $m->to($user->email, $user->first_name . ' ' . $user->last_name);
            $m->subject('Redefinição de senha Novo Portal');
        });
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup()
    {
        if (Sentry::check()){// verifica se está logado para evitar recadastro
            return Redirect::route('portal-painel');
        }

        //Validação do Código de indicação do Fidelidade - Verifica se o código é de algum cadastrado
        if(Input::get('codigo_fidelidade') && !User::find(Input::get('codigo_fidelidade'))){
            return Response::json(array('success' => false, 'errors' => array("codigo_fidelidade" => Lang::get('fidelidade.cadastro.cod-invalido'))));
        }

        //Refatorar -> merge vars input e dados

        $input = Input::all();
        $input['first_name']    = User::formataNome(Input::get('first_name'));
        $input['last_name']     = User::formataNome(Input::get('last_name'));
        $input['email']         = User::formataEmail(Input::get('email'));
        $input['email_confirm'] = User::formataEmail(Input::get('email_confirm'));


        $validator = Validator::make($input, User::getRules()); //User::getRules() centralização das rules na classe User
        if ($validator->fails()) {
//            return Redirect::to(URL::previous() . '#create-account')->withInput()->withErrors($validator);
            if (Request::ajax()) {
                # caso seja uma requisição por ajax retornar resposta dos erros por json
                return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
            }
        }

        try {
            $dados = array(
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'password' => Input::get('password'),
                'activated' => 0, // make it 0 if you don't want to activate user on registration
                'dt_nascimento' => Util::toMySQL(Input::get('dt_nascimento')),
//                'cpf' => Input::get('cpf'),
//                'telefone' => Input::get('telefone'),
                'st_newsletter' => (Input::get('st_newsletter') == 1) ? Input::get('st_newsletter') : 0,
                'genero' => Input::get('genero'),
                'perfil_id' => User::getPerfilPadrao(),
                'gamefication_id' => Gamefication::getNivelPadrao(),
                'st_email_boasvindas' => 0 //Padrão
            );

            if (Session::has('utm.source')) {
                $dados['utm_source'] = Session::get('utm.source');
            }
            if (Session::has('utm.medium')) {
                $dados['utm_medium'] = Session::get('utm.medium');
            }
            if (Session::has('utm.term')) {
                $dados['utm_term'] = Session::get('utm.term');
            }
            if (Session::has('utm.content')) {
                $dados['utm_content'] = Session::get('utm.content');
            }
            if (Session::has('utm.campaign')) {
                $dados['utm_campaign'] = Session::get('utm.campaign');
            }

//            //FIDELIDADE
            if (Input::get('codigo_fidelidade')) {
                $dados['fidelidade_indicador_id'] = Input::get('codigo_fidelidade');
            }

            // Register the user
            $user = Sentry::register($dados);

            // Data to be used on the email view
            $data = array(
                'user' => $user,
                'activationUrl' => URL::route('activate', $user->getActivationCode()),
            );

            // Send the activation code through email
            Mail::send('emails.auth.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Bem Vindo ' . $user->first_name);
            });

            //limpar sessão RUS-012
            Session::forget('utm');

            //limpar sessão indicacao fidelidade
            Session::forget('fidelidade_indicador');

            //Redirect
            return Response::json(['success' => true, Lang::get('auth/message.signup.success')]);
//            return Redirect::route("portal")->with('success', Lang::get('auth/message.signup.success'));

        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
//        return Redirect::back()->withInput()->withErrors($this->messageBag);
        return Response::json(array('success' => false, 'errors' => $this->messageBag->toArray()));
    }

    /**
     * User account activation page.
     *
     * @param string $actvationCode
     * @return
     */
    public function getActivate($activationCode = null)
    {
        // Is the user logged in?

        if (Sentry::check()) {
            return Redirect::route('portal-painel');
        }

        try {
            // Get the user we are trying to activate
            $user = Sentry::getUserProvider()->findByActivationCode($activationCode);

            // Try to activate this user account
            if ($user->attemptActivation($activationCode)) {

                //Programa de Fidelidade
                $indicador = null;
                if (isset($user->fidelidade_indicador_id)) {
                    $indicador = $user->fidelidade_indicador_id;
                }
                $fidelidade = new \Fidelidade();
                $fidelidade->processaCadastroPortal($user, $indicador);


                //Envio do E-mail de Boas Vindas
                if($user->st_email_boasvindas == 5){ #dispara de email de boas vindas inativado para ativar dexa '0'
                    $this->enviarEmailBoasVindas($user->email, $user->first_name . ' ' . $user->last_name);

                    $user->update(array("st_email_boasvindas" => 1));
                }

                // Redirect to the login page
                return Redirect::route('portal')->with('success', Lang::get('auth/message.activate.success'));
            }

            // The activation failed.
            $error = Lang::get('auth/message.activate.error');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('portal')->with('info',  Lang::get('auth/message.activate.info'));
            //$error = Lang::get('auth/message.activate.error');
        }

        // Ooops.. something went wrong
        return Redirect::route('signin')->with('error', $error);
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        // Show the page
        return View::make('portal.layouts.forgot-confirm');
    }

    /**
     * Forgot password form processing page.
     *
     * @return Redirect
     */
    public function postForgotPassword()
    {
        // Declare the rules for the validator
        $rules = array(
            'email' => 'required|email',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
//            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
            if (Request::ajax()) {
                # caso seja uma requisição por ajax retornar resposta dos erros por json
                return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
            }

        }

        try {
            // Get the user password recovery code
            $user = Sentry::getUserProvider()->findByLogin(Input::get('email'));

            // Data to be used on the email view
            $data = array(
                'user' => $user,
                'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
            );

            // Send the activation code through email
            Mail::send('emails.auth.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Nova solicitação de senha');
            });
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
//          Redirect::to('/')->with('success', Lang::get('auth/message.forgot-password.success'));
        return Response::json(['success' => true, Lang::get('auth/message.forgot-password.success')]);

//        return Redirect::to(URL::previous() . '#toforgot')->with('success', Lang::get('auth/message.forgot-password.success'));
//        return Redirect::to('/')->with('success', Lang::get('auth/message.forgot-password.success'));

    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($passwordResetCode = null)
    {

        try {
            // Find the user using the password reset code
            $user = Sentry::getUserProvider()->findByResetPasswordCode($passwordResetCode);
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_error_token'));
        }

        // Show the page
        return View::make('portal.layouts.forgot-confirm')->with(array('passwordResetCode' => $passwordResetCode, 'user' => $user));
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm($passwordResetCode = null)
    {
        $passwordResetCode = Input::get('passwordResetCode');

        // Declare the rules for the form validation
        $rules = array(
            'password' => 'required|between:5,32', //RUS-003
            'password_confirm' => 'required|same:password',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::route('forgot-password-confirm', $passwordResetCode)->withInput()->withErrors($validator);
        }

        try {
            // Find the user using the password reset code
            $user = Sentry::getUserProvider()->findByResetPasswordCode($passwordResetCode);

            // Attempt to reset the user password
            if ($user->attemptResetPassword($passwordResetCode, Input::get('password'))) {

                if ($user->st_portal_antigo == 1) {
                    $user->update(array("st_portal_antigo" => 0));
                }

                // Password successfully reseted
                return Redirect::route('signin')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
            } else {
                // Ooops.. something went wrong
                return Redirect::route('signin')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
        }
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        if (Sentry::check()) {
            //ACL
            if (Cache::has('funcionalidades' . Sentry::getUser()->id)) {
                Cache::forget('funcionalidades' . Sentry::getUser()->id);
            }

            //limpa sessão promoção
            Session::forget('promocao');

            // Log the user out
            Sentry::logout();
            // Remover todas as sessões posiveis
            Session::flush();
        }

        // Redirect to the users page
        return Redirect::route('portal')->with('success', Lang::get('auth/message.logout.success'));
    }


    public function postReenviarEamil($id, $route = '/')
    {
        // caso o route seja null será direcionado para home

        $user = User::find($id);

        if ($user) {
            $data = array(
                'user' => $user,
                'activationUrl' => URL::route('activate', $user->getActivationCode()),
            );

            Mail::send('emails.auth.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Bem Vindo ' . $user->first_name);
            });

            return Redirect::to($route)
                   ->with('success', 'E-mail enviado com sucesso');

        } else {
            return Redirect::to($route)
                   ->with('error', 'Usuario inexistente');
        }
    }

    public function postVerificarExistenciaUsuario()
    {
        $rules = array(
            'email'=> 'required|email',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {

            if (Request::ajax()) {
                return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
            }
        }
        try{

            $user = Sentry::getUserProvider()->findByLogin(Input::get('email'));

            if ($user->activated == 0) {
                $data = array(
                    'user' => $user,
                    'activationUrl' => URL::route('activate', $user->getActivationCode()),
                );

                Mail::send('emails.auth.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Bem Vindo ' . $user->first_name);
                });

                return Response::json(array(
                    'success' => true,Lang::get('auth/message.ativator.success')

                ));

            } else {
                return Response::json(array(
                    'success' => true,Lang::get('auth/message.ativator.success')

                ));
            }
        }catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
            return Response::json(array(
                'success' => true,Lang::get('auth/message.ativator.success')

            ));
        }

    }

    public function enviarEmailBoasVindas($email, $nome)
    {
        // Send the activation code through email
        Mail::send('emails.usuario.boas-vindas', array(), function ($m) use($email, $nome){
            $m->to($email, $nome);
            $m->subject('Comece agora a trilhar o caminho para os seus sonhos.');
        });

    }

}
