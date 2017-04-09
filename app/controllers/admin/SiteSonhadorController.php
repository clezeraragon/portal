<?php

namespace Admin;

use Sonhador, SiteCotaPedido, PagSeguro, SiteCotaPagamento; //Por CRUD

use View, Redirect;

class SiteSonhadorController extends CrudController {

    /**
     * Classe model Sonhador
     * @var Sonhador
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(Sonhador $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Site",
            'titles' => "Sites",
            'route' => 'admin/site',
            'view_dir' => 'admin.site'
        );
    }

    public function getCotasSite($id)
    {
        $site = $this->model->find($id);

        $cotaPedido = new SiteCotaPedido();
        $pedido_cotas = $cotaPedido->getGridAdmin($id);

        $this->layout->content = View::make($this->data['view_dir'] . '.cotas')
             ->with(array(
                    'data' => $this->data,
                    'site' => $site,
                    'pedido_cotas' => $pedido_cotas
             ));
    }

    public function atualizaStatusPagamento($transaction_code)
    {
        $pagseguro = new PagSeguro();
        $transaction = $pagseguro->consultaPagamentoByTransactionId($transaction_code);

        $status = $transaction->getStatus()->getTypeFromValue();

        $cotaPagamento = new SiteCotaPagamento();
        $pagamento = $cotaPagamento->getPagamentoByPsTrasationCode($transaction_code);

        $dados = array();
        if($pagamento['ps_status'] != "PAID" && $status == "PAID" ) {
            $dados['ps_data_liberacao'] = date('Y-m-d', strtotime("+30 days"));
        }
        $dados['ps_status'] = $status;

        $cotaPagamento->find($pagamento['id'])->update($dados);

        Redirect::to("admin/site");
    }
}
