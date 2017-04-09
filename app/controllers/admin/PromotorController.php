<?php
/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 23/04/2015
 * Time: 15:34
 */

namespace Admin;

use View, Redirect, Input, Exception, Lang, Validator, Mail, Hash, Request;
use Promotor, Fidelidade, LogPromotor, User;

class PromotorController extends CrudController
{

    protected $model;

    /**
     * Numero de itens por pagina
     * @var int
     */
    protected $per_page;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Promotor $model, Fidelidade $fidelidade, LogPromotor $logPromotor)
    {
        $this->model = $model;
        $this->LogPromotor = $logPromotor;
        $this->fidelidade = $fidelidade;
        $this->data = array(
            'title' => "Promotor",
            'titles' => "Promotor",
            'route' => 'admin/promotor',
            'view_dir' => 'admin.promotor'
        );
    }

    public function getActionPromotor($hash)
    {
        $promotorId = $this->fidelidade->decriptografaCodigoIndicacao($hash);
        $promotorId = $this->model->where("user_id", $promotorId)->first();

        if($promotorId->user_id) {

            if ($promotorId->st_aceite_termo == 0) {

                $promotorId->update(['st_aceite_termo' => 1]);

                $input['usuario_promotor_id'] = $promotorId->id;
                $input['ip'] = Request::getClientIp();
                $input['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
                $this->LogPromotor->create($input);

                return Redirect::to('/')
                    ->with('success', 'Parabéns, a partir de agora você está participando da ação' . '<strong>' . ' Venda Mais!' . '</strong>');

            } else {

                return Redirect::to('/')
                    ->with('info', 'Sua ativação já foi realizada, obrigado por participar! ' . '<span class="glyphicon glyphicon-thumbs-up">' . '</span>');
            }
        }
    }

    public function store()
    {
        $input = Input::all();
        $input = $this->model->setnull($input);
        $input['st_aceite_termo'] = 0; //Padrao

        $validator = $this->model->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);

            $hash = $this->fidelidade->encriptografaCodigoIndicacao(Input::get('user_id'));

            $url = route('action-promotor', $hash);

            $PromotorMail = User::find(Input::get('user_id'));

            $dadosPromotor = ['url' => $url, 'PromotorEmail' => $PromotorMail->email];

            Mail::send('emails.promotor.promotor', array('responsavel' => $PromotorMail->first_name, 'url' => $url),
                function ($message) use ($dadosPromotor) {
                    $message->from(Lang::get('general.empresa_email_geral'), Lang::get('general.empresa_nome'))
                        ->to($dadosPromotor['PromotorEmail'], Input::get('responsavel_id'))
                        ->subject("Ativação da ação: Venda Mais.");
                });

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }
    }


    public function getRelatorioVendaMais()
    {
        $dados = $this->model->relatorioVendaMais();
        $this->layout->content = View::make($this->data['view_dir'] . '.relatorio-venda-mais')
            ->with(array(
                'data' => $this->data,
                'result' => $dados
            ));
    }

}