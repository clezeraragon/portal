<?php

namespace Portal;

use Sentry;
use View, Input, Redirect, Lang, Util; // Padrao
use Sonhador,Anuncio;

class SonhadorController extends BaseController {

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    /**
     * Classe model
     * @var
     */
    protected $model;

    public function __construct(Sonhador $model)
    {
        $this->model = $model;
        $this->data = array(
            'view_dir' => 'portal.sonhador',
            'route' => 'site-sonhador',
            'origem' => 'Sonhador'
        );
    }

   public function getCadastroSite()
   {
       $this->data += array(
           'title_pag' => "Crie seu site grátis",
           'title_seo' => "Crie seu site grátis",
           'description_seo' => "Compartilhe com seus amigos e familiares o seu sonho e arrecade fundos para conseguir realiza-los.",
           'keywords_seo' => "sonho,realizar, site, isonhei"
       );

       $banners = new Anuncio();
       $bannersDinamicos = $banners->BannersDinamicos();

       $this->layout->content = View::make($this->data['view_dir'] . '.cadastro')->with(array('data' => $this->data,'bannersDinamicos'=>$bannersDinamicos));
   }

    public function postCadastroSite()
    {
        //RSO-011
        if(!Sentry::check()){
            return Redirect::back()
                ->withInput()
                ->with(array(
                    'error' => Lang::get('sonhador.cadastro.login'),
                    'login' => true));
        }

        $input = Input::all();
        $input = $this->model->completaInput($input);

        $validator = $this->model->validate($input);
        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error',  Lang::get('crud.create.error'));
        } else {

            //Verifica Regra de 1 site free por usuário
            $sites = $this->model->getSitesByUser($input['user_id']);
            if(count($sites) >= 1) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error',  Lang::get('sonhador.cadastro.limite'));
            } else {

                $site = $this->model->create($input);
                return Redirect::to("/sonhador/" . $site->id); //RSO-013
            }
        }
    }

    public function getConstrutorSite($siteid)
    {
        $config = Sonhador::getConfigSite($siteid, true);
        if(!$config){
            return Redirect::route("404");
        }

        $this->data += array(
            'title_pag' => "Construtor De Site",
            'title_seo' => "Construtor De Site",
            'description_seo' => "Construtor De Site",
            'keywords_seo' => ""
        );

        $this->layout->content = View::make($this->data['view_dir'] . '.construtor')->with(array(
            'data' => $this->data,
            'config' => $config));
    }

    public function postConstrutorSite($siteid)
    {
        $input = Input::all();

        //validação de imagem
        $validatorImage = $this->model->validateImage($input);
        if($validatorImage->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validatorImage)
                ->with('error',  Lang::get('crud.create.error'));
        }
        else {

            if(isset($input['path_img_topo'])) {
                $this->model->setImg($input['path_img_topo']);
                $this->model->setDirModelImg($siteid);
                $input['path_img_topo'] = $this->model->getImgPath();
            }
            else{
                unset($input['path_img_topo']);
            }

            $validator = $this->model->validate($input);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', Lang::get('crud.update.error'));
            } else {

                $this->model->find($siteid)->update($input);

                if(isset($input['path_img_topo'])) {
                    $this->model->upload_img($input['path_img_topo']);
                }

                return Redirect::to("/sonhador/" . $siteid)
                    ->with('success', Lang::get('crud.update.success'));
            }
        }
    }

}
