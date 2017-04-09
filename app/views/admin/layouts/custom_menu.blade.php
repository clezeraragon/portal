@if(Sentry::getUser()->perfil_id == 1)
    <li {{ (Request::is('admin/usuario') || Request::is('admin/perfil')||Request::is('admin/promotor') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Usuário</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/usuario') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/usuario') }}">
                    <i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Usuário</span>
                </a>
            </li>
            <li {{ (Request::is('admin/perfil') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/perfil') }}">
                    <i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Perfil</span>
                </a>
            </li>
            <li {{ (Request::is('admin/promotor') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/promotor') }}">
                    <i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Promotor</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/cliente') || Request::is('admin/cliente-foto') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Cliente</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/cliente') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/cliente') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Cliente</span>
                </a>
            </li>
            <li {{ (Request::is('admin/cliente-foto') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/cliente-foto') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Fotos</span>
                </a>
            </li>
            <li {{ (Request::is('admin/relatorio-clientes-guia') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/relatorio-clientes-guia') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Rel. Clientes X Guia</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/conteudo-categoria') || Request::is('admin/conteudo')  ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Conteúdo</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/conteudo-categoria') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/conteudo-categoria') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Categoria</span>
                </a>
            </li>
            <li {{ (Request::is('admin/conteudo') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/conteudo') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Conteúdo</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/video') ? 'class="active"' : '') }}>
           <a href="{{ URL::to('admin/video') }}">
               <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
               <span class="title">Videos</span>
               {{--<span class="fa arrow"></span>--}}
           </a>

    </li>

    <li {{ (Request::is('admin/guia-empresa') || Request::is('admin/guia-categoria') || Request::is('admin/guia-cidade') || Request::is('admin/guia-plano') || Request::is('admin/guia-metrica')
            || Request::is('admin/anuncio-metrica') || Request::is('admin/relatorio-guia-contato') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Guia de Empresa</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/guia-empresa') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/guia-empresa') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Anunciantes</span>
                </a>
            </li>
            <li {{ (Request::is('admin/guia-categoria') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/guia-categoria') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Categorias</span>
                </a>
            </li>
            <li {{ (Request::is('admin/guia-cidade') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/guia-cidade') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Cidades</span>
                </a>
            </li>
            <li {{ (Request::is('admin/guia-plano') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/guia-plano') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Planos</span>
                </a>
            </li>
            <li {{ (Request::is('admin/guia-metrica') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/guia-metrica') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Métrica</span>
                </a>
            </li>
            <li {{ (Request::is('admin/anuncio-metrica') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/anuncio-metrica') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Anúncio Métrica</span>
                </a>
            </li>
            <li {{ (Request::is('admin/relatorio-guia-contato') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/relatorio-guia-contato') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Rel. Guia Contato</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/site-plano') || Request::is('admin/site-tipo') || Request::is('admin/site')  ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Sonhador</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/site') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/site') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Site</span>
                </a>
            </li>
            <li {{ (Request::is('admin/site-plano') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/site-plano') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Plano</span>
                </a>
            </li>
            <li {{ (Request::is('admin/site-tipo') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/site-tipo') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Tipo de Evento</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/fidelidade-acao') || Request::is('admin/fidelidade-gamefication') || Request::is('admin/fidelidade-produto') || Request::is('admin/fidelidade-pontuacao')
     || Request::is('admin/fidelidade-resgate') || Request::is('admin/fidelidade-codigo') || Request::is('admin/produto-fornecedor')  ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Fidelidade</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/fidelidade-acao') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-acao') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Ações</span>
                </a>
            </li>
            <li {{ (Request::is('admin/fidelidade-gamefication') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-gamefication') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Níveis Gamefication</span>
                </a>
            </li>
            <li {{ (Request::is('admin/fidelidade-produto') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-produto') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Produtos</span>
                </a>
            </li>
            <li {{ (Request::is('admin/produto-fornecedor') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/produto-fornecedor') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Fornecedores</span>
                </a>
            </li>
            <li {{ (Request::is('admin/fidelidade-resgate') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-resgate') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Resgates</span>
                </a>
            </li>
            <li {{ (Request::is('admin/fidelidade-codigo') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-codigo') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Código</span>
                </a>
            </li>
            <li {{ (Request::is('admin/fidelidade-pontuacao') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/fidelidade-pontuacao') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Pontuação</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/cms-bloco') ? 'class="active"' : '') }}>
        <a href="{{ URL::to('admin/cms-bloco') }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Cms-Bloco</span>
        </a>
    </li>

    <li {{ (Request::is('admin/cupom') || Request::is('admin/cupom-relatorio') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Cupom</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/cupom') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/cupom') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Cupom</span>
                </a>
            </li>
            <li {{ (Request::is('admin/cupom-relatorio') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/cupom-relatorio') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Relatório</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/resultado-log-busca') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Log's</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/resultado-log-busca') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/resultado-log-busca') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Log de Busca</span>
                </a>
            </li>
        </ul>
    </li>

    <li {{ (Request::is('admin/vendedor') ? 'class="active"' : '') }}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Financeiro</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {{ (Request::is('admin/vendedor') ? 'class="active"' : '') }}>
                <a href="{{ URL::to('admin/vendedor') }}">
                    <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title">Vendedor</span>
                </a>
            </li>
        </ul>
    </li>
@endif

@if(Sentry::getUser()->perfil_id == 3)

    <li {{ (Request::is('admin/cliente') ? 'class="active"' : '') }}>
        <a href="{{ URL::to('admin/cliente') }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Cliente</span>
        </a>
    </li>
    <li {{ (Request::is('admin/guia-metrica') ? 'class="active"' : '') }}>
        <a href="{{ Route("guia-metrica") }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Métricas Guia</span>
        </a>
    </li>
    <li {{ (Request::is('admin/relatorio-guia-contato') ? 'class="active"' : '') }}>
        <a href="{{ URL::to('admin/relatorio-guia-contato') }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Relatório Contato Guia</span>
        </a>
    </li>
    <li {{ (Request::is('admin/cupom-relatorio') ? 'class="active"' : '') }}>
        <a href="{{ URL::to('admin/cupom-relatorio') }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Relatório Cupom</span>
        </a>
    </li>
    <li {{ (Request::is('admin/relatorio-promotor') ? 'class="active"' : '') }}>
        <a href="{{ Route("relatorio-promotor") }}">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Relatório Promotor</span>
        </a>
    </li>

@endif


