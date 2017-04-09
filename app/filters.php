<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    /* RUS-011 */
    if(isset($_GET['utm_source'])) {
        Session::put('utm.source', $_GET['utm_source']);
    }
    if(isset($_GET['utm_medium'])) {
        Session::put('utm.medium', $_GET['utm_medium']);
    }
    if(isset($_GET['utm_term'])) {
        Session::put('utm.term', $_GET['utm_term']);
    }
    if(isset($_GET['utm_content'])) {
        Session::put('utm.content', $_GET['utm_content']);
    }
    if(isset($_GET['utm_campaign'])) {
        Session::put('utm.campaign', $_GET['utm_campaign']);
    }

});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/*
Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});
*/

Route::filter('auth', function()
{
    if (!Sentry::check()) return Redirect::guest('/');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    # verificar o tipo de requisi��o e pegar o _token
    $token = Request::ajax() ? Request::header('X-CSRF-Token') : Input::get('_token');
	if (Session::token() != $token)
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| ACL Filter
|--------------------------------------------------------------------------
|
| ACL Filter
| RUS-010
|
*/

Route::filter('acl', function()
{
    $permission = array('dashboard', 'format-url', 'config-plano');
    $routeName = Route::currentRouteName();
//    dd($routeName);

    $cache = Cache::get('funcionalidades' . Sentry::getUser()->id);

    if($cache) {
        /* RUS-010 */
        if (!in_array($routeName, $permission) && !in_array($routeName, $cache) && !in_array('*', $cache)) {
            return Redirect::back()
                ->with('warning', Lang::get('auth/message.acl.without_access'));
        }
    }
    else{
        Sentry::logout();
        return Redirect::to('/');
    }

});

Route::filter('permissao_sonhador', function($route, $request, $value)
{
    $siteid = Request::segment($value);

    $sonhador = new \Sonhador();
    $siteOwner = $sonhador->getSiteOwner($siteid);

    if(Sentry::getUser()->id != $siteOwner){

        Sentry::logout();
        return Redirect::to('/');
    }

});