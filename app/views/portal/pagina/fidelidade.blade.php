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
                {{--<h1>CONHEÇA AS VANTAGENS DE SER UM CADASTRADO ISONHEI </h1>--}}
                <h1>{{$data['title_pag']}}</h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active"><span style="text-transform:lowercase !important;">i</span>Sonhei Club</li>
                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data Start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec Start -->
                    <div class="col-sm-11">
                        <div class="row">
                            <p class="mini-font">
                                Cadastre-se e faça parte do <strong>iSonhei Club</strong>, um programa de relacionamento exclusivo, com ofertas especiais. Basta juntar pontos e depois trocá-los por diversos produtos.
                                Acesse os botões abaixo e conheça os produtos disponíveis.
                            </p>
                            <br>

                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-push-1">
                                <a href="{{route('isonhei-club-loja')}}">
                                    {{HTML::image('portal/images/fidelidade/prod_eletronicos.jpg', 'Loja de produtos', array('class'=>'match-height img-responsive','width'=>'192','height'=>'192'))}}
                                </a>
                            </div>
                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-push-1">
                                <a href="{{route('isonhei-club-loja')}}">
                                    {{HTML::image('portal/images/fidelidade/prod_roupas.jpg','Loja de produtos' , array('class'=>'match-height img-responsive','width'=>'192','height'=>'192'))}}
                                </a>
                            </div>
                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-push-1">
                                <a href="{{route('isonhei-club-loja')}}">
                                    {{HTML::image('portal/images/fidelidade/prod_perfumes.jpg', 'Loja de produtos', array('class'=>'match-height img-responsive','width'=>'192','height'=>'192'))}}
                                </a>
                            </div>
                        </div>
                        <br>
                        <br>

                        <p class="mini-font">É fácil! Pontue, acumule e troque! </p>
                        <br>

                        <div class="row">
                            <div class="text-center" style="text-align: center;margin-bottom: 20px;">
                                <h3 class="mini-font"><strong>VEJA COMO É SIMPLES PARTICIPAR:</strong></h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-4  hidden-xs col-md-2 ">
                                    {{HTML::image('portal/images/fidelidade/checkbox.jpg','',array('class'=>'match-height img-responsive','width'=>'51','height'=>'51'))}}

                                </div>
                                <div class="col-sm-12 col-xs-16 col-md-12">
                                    <p class="mini-font"><strong> CADASTRE-SE</strong></p>

                                    <p class="mini-font">Faça seu cadastro. É rápido e grátis.</p>
                                </div>

                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-sm-4  hidden-xs col-md-2">
                                    {{HTML::image('portal/images/fidelidade/checkbox.jpg','',array('class'=>'match-height img-responsive','width'=>'51','height'=>'51'))}}

                                </div>
                                <div class="col-sm-12 col-xs-16 col-md-14">
                                    <p class="mini-font"><strong>PONTUE</strong></p>

                                    <p class="mini-font">
                                        A cada indicação que efetive um novo cadastro você ganha 10 pontos. Para que seja possível vincular um cadastro a sua indicação é necessário
                                        utilizar o link disponível dentro do painel do usuário (hiperlink). Basta encaminhá-lo por e-mail ou rede sociais.
                                        A vantagem é que seus amigos vão ganhar 100 pontos ao se cadastrar.
                                    </p>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-4  hidden-xs col-md-2">
                                    {{HTML::image('portal/images/fidelidade/checkbox.jpg','',array('class'=>'match-height img-responsive','width'=>'51','height'=>'51'))}}

                                </div>
                                <div class="col-sm-12 col-xs-16 col-md-14">
                                    <p class="mini-font"><strong>BUSQUE E PONTUE</strong></p>

                                    <p class="mini-font">
                                        No iSonhei você pode ganhar até 605 pontos por interagir com um dos parceiros do Guia de Empresas. Veja como é simples:
                                        <br>

                                    </p>
                                    <p class="mini-font"><span  style="color: #00a4e4; font-weight: bold;">&bull;</span> A cada contato através do formulário do Guia de Empresas com um prestador de serviço você receberá 5 pontos.</p>
                                    <p class="mini-font"><span  style="color: #00a4e4; font-weight: bold;">&bull;</span> Ao realizar uma vista para conhecer o serviço de nossos parceiros você receberá 100 pontos. Para isso será necessário solicitar um código especial, entregue pelo prestador de serviço, que deve ser inserido no seu painel do usuário.</p>
                                    <p class="mini-font"><span  style="color: #00a4e4; font-weight: bold;">&bull;</span> Caso você feche um contrato, após a visita, você pode ganhar mais 500 pontos. Novamente será entregue pelo prestador de serviço um código especial que deve ser inserido dentro do seu painel.</p>
                                    <p class="mini-font"><span  style="color: #00a4e4; font-weight: bold;">&bull;</span> Para ganhar os 605 pontos é necessário seguir todos os passos: solicitar um orçamento – realizar uma visita – fechar um contrato.</p>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-sm-4  hidden-xs col-md-2">
                                    {{HTML::image('portal/images/fidelidade/checkbox.jpg','',array('class'=>'match-height img-responsive','width'=>'51','height'=>'51'))}}

                                </div>
                                <div class="col-sm-12 col-xs-16 col-md-14">
                                    <p class="mini-font"><strong>ACUMULE E TROQUE!</strong></p>

                                    <p class="mini-font">
                                        Você acumula seus pontos e depois pode trocá-los por diversos produtos.
                                    </p>
                                </div>
                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-sm-4  hidden-xs col-md-2">
                                    {{HTML::image('portal/images/fidelidade/checkbox.jpg','',array('class'=>'match-height img-responsive','width'=>'51','height'=>'51'))}}

                                </div>
                                <div class="col-sm-12 col-xs-16 col-md-14">
                                    <p class="mini-font"><strong>SUBA DE NÍVEL</strong></p>

                                    <p class="mini-font">Os pontos acumulados também farão com que você suba de nível e agregue uma série
                                        de vantagens, além de contribuir com acúmulo de mais pontos – graças ao
                                        multiplicador de pontos.</p>
                                </div>
                            </div>
                            <br><br>

                        </div>
                        <div class="text-center mini-font" style="text-align: center;margin-bottom: 20px;">
                            <h3 class="mini-font"><strong>COMO FUNCIONA:</strong></h3>
                        </div>
                        <div class="row">
                            <p class="mini-font">Os pontos adquiridos determinarão a sua classificação e podem ser multiplicados por até
                                2, de acordo com o seu nível.
                            </p>

                            <p class="mini-font"><strong>Veja o cálculo:</strong> com a indicação de 3 novos cadastros você ganhará 30
                                pontos, estando no nível 3, deve-se multiplicar por 2, então você passará a ter 60
                                pontos.

                            </p>
                        </div>
                        <br><br>
                        <div class="text-center" style="text-align: center;margin-bottom: 20px;">
                            <h3><strong>CONHEÇA OS NÍVEIS:</strong></h3>
                        </div>
                        <div class="row ">

                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-pull-1 col-xs-push-5" style="left: 15px;">
                                {{HTML::image('portal/images/fidelidade/nivel_sonhador.jpg','',array('class'=>'match-height img-responsive','width'=>'224','height'=>'205'))}}
                                <br>

                                <h4 class="text-center mini-font" style="text-align: center;margin-bottom: 20px;"><strong>NÍVEL 1</strong></h4>

                                <p class="text-center mini-font" style="text-align: center;margin-bottom: 20px;">Até 4.999 pontos.<br><strong>Multiplicador 1</strong></p>



                            </div>
                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-push-1" style="left: 25px;">
                                {{HTML::image('portal/images/fidelidade/nivel_navegador.jpg','',array('class'=>'match-height img-responsive','width'=>'224','height'=>'205'))}}
                                <br>

                                <h4 class="text-center mini-font" style="text-align: center;margin-bottom: 20px;"><strong>NÍVEL 2</strong></h4>

                                <p class="text-center mini-font" style="text-align: center;margin-bottom: 20px;">Até 9.999 pontos.<br><strong>Multiplicador 1.5</strong></p>



                            </div>
                            <div class="col-sm-5 col-xs-5 col-md-5 col-md-push-1" style="left: 35px;">
                                {{HTML::image('portal/images/fidelidade/nivel_descobridor.jpg','',array('class'=>'match-height img-responsive','width'=>'224','height'=>'205'))}}
                                <br>

                                <h4 class="text-center mini-font" style="text-align: center;margin-bottom: 20px;"><strong>NÍVEL 3</strong></h4>

                                <p class="text-center mini-font" style="text-align: center;margin-bottom: 20px;">10.000 pontos em diante.<br><strong>Multiplicador 2</strong></p>



                            </div>

                        </div>
                        <br><br>

                        <div class="row">
                            <div class="text-center mini-font" style="text-align: center;margin-bottom: 20px;">

                                <a class="open-popup-link btn btn-primary btn-lg mini-font" href="#create-account" data-effect="mfp-zoom-in" role="button" rel="nofollow">CADASTRE-SE E BONS SONHOS!</a>

                            </div>
                        </div>
                        <br>
                        <br>
                    </div>

                    <!-- left sec End -->
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
            </div>
        </section>
        <!-- Data End -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop

