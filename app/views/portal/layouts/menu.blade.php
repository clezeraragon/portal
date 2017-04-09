
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-16"><a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search" style="width:10px;"></span></a>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav text-uppercase main-nav">
                        <li><a href="{{Route("conteudo-categoria-pai", array("turismo"))}}">Turismo</a></li>
                        <li><a href="{{Route("conteudo-categoria-pai", array("casamento"))}}">Casamento</a></li>
                        <li><a href="{{Route("conteudo-categoria-pai", array("debutante"))}}">Debutante</a></li>
                        <li><a href="{{Route("conteudo-categoria-pai", array("infantil"))}}">Infantil</a></li>

                        <?php $menu = ConteudoCategoria::getMenuInspiracoes(); ?>
                        {{--{{dd($menu)}}--}}
                        @if(isset($menu))

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" rel="nofollow">
                                    Inspirações<span class="ion-ios7-arrow-down nav-icn"></span>
                                </a>
                                <ul class="dropdown-menu text-capitalize" role="menu">
                                    @foreach($menu as $menu_item)
                                        <li>
                                            <a href="{{Route("conteudo-categoria-filha", array($menu_item->url_pai, $menu_item->url))}}">
                                                {{($menu_item->nome)}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        <li><a href="{{Route('guia-de-empresas-categorias')}}">Fornecedores</a></li>
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" rel="nofollow">--}}
                                {{--Vantagens<span class="ion-ios7-arrow-down nav-icn"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu text-capitalize" role="menu">--}}
                                {{--<li><a href="{{Route("lista-cupons-de-desconto")}}">Descontos</a></li>--}}
                                {{--<li><a href="{{Route('page-fidelidade')}}">iSonhei Club</a></li>--}}
                                {{--<li><a href="{{Route('site-sonhador-cadastro')}}">Crie seu site Grátis</a></li>--}}
                                {{--<li><a href="{{Route('page-vantagens-cadastrado')}}">Exclusividade</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{Route("page-empresas-conveniadas")}}">Conveniadas</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- nav end -->

    <!-- search start -->
    <div class="search-container ">
        <div class="container">
            <form action="/busca" method="get" role="search">
                <input id="busca" name="s" placeholder="O que está procurando?" autocomplete="off">
            </form>
        </div>
    </div>
    <!-- search end -->
</nav>