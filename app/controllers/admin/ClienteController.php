<?php
namespace Admin;

use Bllim\Datatables\Datatables;
use View, Redirect, Input, Exception, Lang, Validator, HTML, Form, Util;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cliente, Sentry, ClienteHistoricoContato;

class ClienteController extends BaseController
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

    public function __construct(Cliente $model)
    {
        $this->model = $model;
        $this->per_page = 10;
        $this->data = array(
            'title' => "Cliente",
            'titles' => "Clientes",
            'route' => 'admin/cliente',
            'view_dir' => 'admin.clientes'
        );
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $clientes = $this->model->all();
        $this->layout->content = View::make($this->data['view_dir'] . '.index')
            ->with(array(
                'data' => $this->data,
//                'clientes' => $clientes
            ));

    }

    public function create()
    {
        $this->layout->content = View::make($this->data['view_dir'] . '.create')->with(array('data' => $this->data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if (isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        }

        $input = $this->model->setnull($input);

        $validator = $this->model->validate($input);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.create.error'));
        } else {

            $this->model->create($input);
            if (isset($input['path_img'])) {
                $this->model->upload_img($input['path_img']);
            }
            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.create.success'));
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function Show($id)
    {
        $cliente = $this->model->find($id);

        $clienteHis = new ClienteHistoricoContato();
        $msgs_historico = $clienteHis->getGrid($cliente->id);
        $mensagens = null;
        foreach ($msgs_historico as $msg) {

            $mensagens .= "#" . $msg->id . " - " . $msg->mensagem . " - " . $msg->usuario . " - " . Util::toTimestamps($msg->created_at) . "\n";
        }


        if (!$cliente) {

            return Redirect::to($this->data['route']);
        }
        $this->layout->content = View::make($this->data['view_dir'] . '.show', compact('cliente'))
            ->with(array(
                'data' => $this->data,
                'cliente_id' => $id,
                'mensagens' => $mensagens
            ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */

    public function edit($id)
    {

        try {
            $rs = $this->model->findOrFail($id);

            $this->layout->content = View::make($this->data['view_dir'] . '.edit', compact('rs'))->with(array('data' => $this->data));
        } catch (ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();

        if (isset($input['path_img'])) {
            $this->model->setImg($input['path_img']);
            $input['path_img'] = $this->model->getImgPath();
        } else {
            unset($input['path_img']);
        }

        $input = $this->model->setnull($input);
        $validator = $this->model->validate($input);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {

            $this->model->find($id)->update($input);

            if (isset($input['path_img'])) {
                $this->model->upload_img($input['path_img']); //move o arquivo
            }

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        try {
            $this->model->find($id)->delete();
            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.destroy.success'));
        } catch (Exception $e) {

            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.destroy.error'));
        }
    }


    public function getRelatorioClientesGuia()
    {
        $clientes = $this->model->relatorioClientesGuia();
        $this->layout->content = View::make($this->data['view_dir'] . '.relatorio-cliente-guia')
            ->with(array(
                'data' => $this->data,
                'result' => $clientes
            ));

    }

    public function getClienteAjax()
    {

        $user = Sentry::getUser()->perfil->perfil;

        $select = ['cliente.id',
                    'cliente.nm_nome_fantasia',
                    'cliente.nm_cnpj',
                    'cliente.nm_responsavel',
                    'cliente.nm_email_responsavel',
                    'cliente.nm_telefone1',
                    'cliente.status'];

        $clientes = $this->model->select($select);

        if ($user === "Vendedor") {
            $clientes = $this->model->join("vendedor", 'vendedor_id', '=', 'vendedor.id')->where('vendedor.user_id',Sentry::getUser()->id)->select($select);

        }


        return Datatables::of($clientes)
            ->set_index_column('id')
            ->remove_column('id')
            ->edit_column('status', '{{ $status ? "Ativo" : "Inativo" }}')
            ->add_column('show', function ($model) {
                $link = link_to($this->data['route'] . '/' . $model->id, 'Visualizar', array('class' => 'btn btn-effect btn-purple', 'title' => 'Visualizar'));
                return $link;
            })
            ->add_column('editar', function ($model) {
                $link = link_to($this->data['route'] . '/' . $model->id . '/edit', 'Editar', array('class' => 'btn btn-warning btn-sm', 'title' => 'Editar'));
                return $link;
            })
            ->addColumn('excluir', function ($model) {
                $link = HTML::decode(Form::open(array('url' => $this->data['route'] . '/' . $model->id, 'method' => 'delete')) .
                    Form::button('Excluir', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Excluir')) . Form::close());
                return $link;

            })
            ->make(true);

    }

}
