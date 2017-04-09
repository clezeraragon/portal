<?php

namespace Portal;

use Controller, View;

class BaseController extends Controller {

    protected $layout = 'portal.layouts.default';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * Message bag.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct()
    {
        // CSRF Protection
        $this->beforeFilter('csrf', array('on' => 'post'));

        //
        $this->messageBag = new \Illuminate\Support\MessageBag;
    }

    protected function get404()
    {
        $this->data = array(
            'title_pag' => "Página não encontrada",
            'title_seo' => "Página não encontrada",
            'description' => "Página não encontrada",
            'keywords' => "Página não encontrada"
        );

        $this->layout->content = View::make('portal.404')
            ->with(array(
                'data' => $this->data
            ));

        return \Response::make($this->layout, 404);
    }

}
