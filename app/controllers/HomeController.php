<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showPortal()
	{
		return View::make('portal.hello');
	}

    public function showAdmin()
    {
        if(Sentry::check())
            return View::make('admin/index');
        else
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
    }

}
