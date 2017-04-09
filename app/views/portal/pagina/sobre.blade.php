{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('conteudo')

    <!-- conteudo Start -->
    <div class="container">

        @include('notifications')
        <div id="notification"></div>

        <!-- header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{$data['title_pag']}} </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">{{$data['title_pag']}}</li>
                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec start -->
                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                                <div class="col-md-16 col-sm-16 col-xs-16">
                                    <img src="{{asset('/portal/images/sobre/banner_sobre.jpg')}}" width="791" height="255" alt="" class="img-responsive"/>
                                </div>

                                <div class="col-md-16 col-sm-16 col-xs-16">
                                    <hr>
                                    <p>
                                        <strong>iSonhei é um portal inspirador de sonhos.</strong>
                                    </p>
                                    <p>
                                        Aqui você encontra matérias segmentadas para se manter atualizado e inspirado nos assuntos referentes a turismo, casamento, debutante, infantil,
                                        casa e decoração, além de contar com dicas de atrações para aproveitar os momentos de cultura e lazer.
                                    </p>

                                    <p>
                                        O portal disponibiliza um <strong><a href="{{Route('guia-de-empresas-categorias')}}" target="_blank">guia de fornecedores</a></strong> repleto de
                                        empresas que oferecem o que você precisa para realizar o sonho da sua festa de casamento ou debutante, viagens a qualquer lugar do mundo ou itens
                                        para o seu bebê, além de descontos especiais.
                                    </p>

                                    <p>
                                        No nosso clube de vantagens, <strong><a href="{{Route('page-fidelidade')}}" target="_blank">iSonhei Club</a></strong>, você acumula pontos de forma
                                        simples e divertida para trocar por diversos <strong><a href="{{Route('isonhei-club-loja')}}" target="_blank">produtos incríveis</a></strong>.
                                    </p>

                                    <p>
                                        Você também pode <strong><a href="{{Route('site-sonhador-cadastro')}}" target="_blank">criar um site gratuitamente</a></strong> para divulgar seus sonhos,
                                        arrecadar fundos com a ajuda dos seus amigos e assim realizar viagens, comprar um carro e muito mais.
                                    </p>

                                    <p>
                                        O portal oferece a <strong><a href="http://www.loja.isonhei.com.br" target="_blank">Loja iSonhei</a></strong>, que possui produtos selecionados
                                        especialmente para você, descontos imperdíveis e oportunidades incríveis de arrecadar recursos extras através da venda de produtos online,
                                        auxiliando ainda mais as suas conquistas.
                                    </p>

                                    <p>
                                        Todas as <strong><a href="{{Route("page-vantagens-cadastrado")}}" target="_blank">vantagens</a></strong> são gratuitas e exclusivas para os usuários cadastrados.
                                    </p>

                                    <p>
                                        Portal iSonhei ajuda a planejar, economizar e trilhar o caminho certo para as conquistas.
                                    </p>

                                </div>
                        </div>
                    </div>
                    <!-- right sec start -->
                    <div class="col-sm-5 hidden-xs right-sec">
                        <div class="bordered">
                            <div class="row ">
                                <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s"
                                     data-wow-offset="150">
                                    <div class="table-responsive">
                                        @include('elements.menu-lateral.facebook')
                                        @include('elements.menu-lateral.instagram')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left sec end -->


            </div>

        </section>
        <!-- data end -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop