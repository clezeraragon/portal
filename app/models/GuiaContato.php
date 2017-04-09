<?php

/**
 * Created by PhpStorm.
 * User: Ramos
 * Date: 15/01/2015
 * Time: 17:06
 */
class GuiaContato extends BaseModel
{


    protected $table = 'guia_contato';

    protected $guarded = array('id');
    protected $fillable = array('guia_empresa_id', 'user_id', 'nome', 'email', 'assunto', 'mensagem', 'telefone', 'utm_campaign', 'utm_content', 'utm_term', 'utm_medium', 'utm_source');

    public static $rules = array(
        'guia_empresa_id' => 'required|numeric',
        'user_id' => 'numeric|numeric',
        'nome' => 'required|min:3|max:255',
        'email' => 'required|email',
        'assunto' => 'required|min:5|max:255',
        'mensagem' => 'required|min:5',
        'telefone' => 'min:13|max:14',
    );

    /**
     * Consulta para o Grid da pagina de listagem
     * @return resultset
     */
    public function getRelatorioGuiaContato()
    {
        $user = Sentry::getUser()->perfil->perfil;

        $get = ["cliente.nm_nome_fantasia as cliente",
                "guia_categoria.nome as categoria",
                "guia_cidade.nome as guia_cidade",
                "users.email as usuario", "guia_contato.*"];

          $results = $this->join("guia_empresa", 'guia_contato.guia_empresa_id', '=', 'guia_empresa.id')
            ->leftjoin("users", 'guia_contato.user_id', '=', 'users.id')
            ->join("cliente", 'guia_empresa.cliente_id', '=', 'cliente.id')
            ->join("guia_categoria", "guia_empresa.categoria_id", "=", "guia_categoria.id")
            ->join("guia_cidade", "guia_empresa.cidade_id", "=", "guia_cidade.id");

            if ($user === "Vendedor") {
                $results->join("vendedor", 'cliente.vendedor_id', '=', 'vendedor.id')->where('vendedor.user_id', Sentry::getUser()->id);
            }

            return $results->get($get);


    }

    public function getGuiaContatoByTime($tempo = null)
    {
        if ($tempo == "*") {
            return $this->count();
        } else if (isset($tempo)) {
            return $this->whereBetween("created_at", array(date('Y-m-d', strtotime('-' . $tempo . ' days')) . " 00:00:01", date('Y-m-d 23:59:59')))
                ->count();
        } else {
            return $this->whereBetween("created_at", array(date("Y-m-d 00:00:01"), date("Y-m-d 23:59:59")))
                ->count();
        }
    }
}