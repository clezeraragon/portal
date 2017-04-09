<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 21/01/2015
 * Time: 16:40
 */


namespace Portal;

use View, Redirect, Input, Lang, Mail, URL, Request; // Padrao
use NewsLetter, Sentry;

class NewsletterController extends BaseController
{


    /**
     * Classe model
     * @var
     */
    protected $model;

    /**
     * dados padr�o das views
     * @var array
     */
    protected $data;


    public function __construct(NewsLetter $model)
    {
        $this->model = $model;
        $this->data = array(
            'title_pag' => "NewsLetter",
            'title_seo' => "NewsLetter",
            'description' => "NewsLetter",
            'keywords' => "NewsLetter",
            'view_dir' => 'portal.newsletter',
            'route' => 'newsletter'
        );
    }

    public function getNewsletter()
    {

        $this->layout->content = View::make($this->data['view_dir'] . '.newsletter')->with(array(
            'data' => $this->data));


    }


    public function postNewsletter()
    {
        $input["email"] = Input::get("email");
        $input = $this->model->completaInput($input);

        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::route('newsletter')
                ->withInput(array('email'=>Lang::get('Seu e-mail já está cadastrado!')))
                ->withErrors($validator)
                ->with('error', Lang::get('O registro não pode ser salvo.'));
        } else {

            $this->model->create($input);

            return Redirect::route('newsletter')
                ->with('success', Lang::get('Seu e-mail foi salvo!'));
        }


    }

}