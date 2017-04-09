<?php

namespace Admin;

use ProdutoEstoque; //Por CRUD
use Input, Redirect, Lang, View;

class ProdutoEstoqueController extends CrudController {

    /**
     * Classe model
     * @var
     */
    protected $model;

    /**
     * dados padrão das views
     * @var array
     */
    protected $data;

    public function __construct(ProdutoEstoque $model)
    {
        $this->model = $model;
        $this->data = array(
            'title' => "Estoque",
            'titles' => "Estoque",
            'route' => 'admin/fidelidade-produto',
            'view_dir' => 'admin.fidelidade-prod-estoque'
        );
    }


    public function getCadastro($produto_id)
    {
        try {
            $this->layout->content = View::make($this->data['view_dir'] . '.gerenciar', compact('produto_id'))->with(array('data' => $this->data));
        }
        catch(\ModelNotFoundException $e) {
            return Redirect::to($this->data['route'])
                ->with('error', Lang::get('crud.edit.error'));
        }
    }


    public function postCadastro()
    {
        $input = Input::all();
        //dd($input);

        $validator = $this->model->validate($input);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', Lang::get('crud.update.error'));
        } else {

            $estoque = $this->model->getEstoqueByProductId($input['produto_id']);
            //Se tiver registro Atualiza estoque
            if($estoque){

                //Verificação: se for saida verificar se a quantidade tem em estoque
                if(($input['tipo'] == "saida" && $estoque['estoque'] >= $input['quantidade']) || $input['tipo'] == "entrada")
                {
                    $new_estoque = $this->model->getNovoEstoque($estoque['estoque'], $input['tipo'], $input['quantidade']);

                    $dados = array(
                        "produto_id" => $input['produto_id'],
                        "estoque" => $new_estoque
                    );
                    $this->model->find($estoque['id'])->update($dados);
                }
                else{
                    return Redirect::back()
                        ->withInput()
                        ->withErrors($validator)
                        ->with('error', Lang::get('produto.estoque.quantidade_indisponivel'));
                }
            }
            //Se não tiver registro cadastra o estoque
            else{
                if($input['tipo'] == "entrada") {
                    $this->model->create(array(
                        "produto_id" => $input['produto_id'],
                        "estoque" => $input['quantidade']
                    ));
                }
                else{
                    return Redirect::back()
                        ->withInput()
                        ->withErrors($validator)
                        ->with('error', Lang::get('produto.estoque.lancamento_saida'));
                }
            }

            $this->model->registraMovimentacaoEstoque($input['produto_id'], $input['tipo'], $input['quantidade'], $input['descricao']);

            return Redirect::to($this->data['route'])
                ->with('success', Lang::get('crud.update.success'));
        }
    }

}
