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

                                <h3>Descontos garantidos para sua diversão</h3>
                                <p>
                                    O <strong>iSonhei</strong> em parceria com o <strong>Cheque Teatro</strong> proporciona benefícios exclusivos para o cadastrado!
                                </p>
                                <p>
                                    Adquira agora mesmo o seu Kit Cheque Teatro pelo preço promocional de R$ 210,00 por <strong>R$ 99,00</strong>.
                                </p>
                                <p>
                                    <strong>Conteúdo do Kit:</strong>
                                </p>
                                <ul>
                                    <li>
                                        <p>
                                            12 folhas Cheque Teatro, que garantem entradas VIP no teatro ao levar um ou mais acompanhantes que ganham até 50% de desconto;
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            12 folhas Cheque Vantagem, com benefícios em diversos estabelecimentos pelo Brasil, como Cinemark, Hopi Hari, Wet’n Wild, Parque da Mônica, Cidade da Criança, Aquário de São Paulo, Hotéis, Pousadas e muito mais;
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            01 Cartão Vale Mais que representa o Clube de Benefícios do Cheque Teatro;
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Revista Guia de Benefícios com empresas parceiras e descontos exclusivos para usuários do Cheque Teatro.
                                        </p>
                                    </li>
                                </ul>

                                <br>
                                {{HTML::image(asset('/portal/images/pages/novo-kit-cheque-teatro.jpg'), 'Atrações Cheque Teatro', array('class'=>'img-thumbnail'))}}
                                <br><br>

                                <p>
                                    Para ter acesso a esses benefícios exclusivos basta você adquirir o <strong>“Kit do Cheque Teatro”.</strong>
                                    O cadastrado do iSonhei tem desconto especial e pode optar por comprar ou trocar seus pontos pelo produto.
                                </p>
                                <p>
                                    <strong>Compra:</strong> De R$ 210,00 por R$ 99,00 reais, com pagamento via PagSeguro.
                                </p>
                                <p>
                                    <strong>Troca por pontos:</strong> 4.500 pontos no
                                    <a href="{{Route("page-fidelidade")}}" target="_blank" style="color:#357ebd;">iSonhei Club</a>
                                    (período promocional).
                                </p>
                                <p>
                                    Aproveite essas vantagens, adquira seu “Kit do Cheque Teatro” agora mesmo e receba em sua casa, via correio, após confirmação do cadastro, pagamento ou resgate de pontos*.
                                </p>
                                <p>
                                    Para consultar as peças e atrações disponíveis acesse:
                                    <a href="http://www.chequeteatro.com.br?utm_campaign=isonhei&utm_source=isonhei" target="_blank" rel="nofollow" style="color:#357ebd;">Cheque Teatro</a>
                                </p>
                                <p>
                                    Escolha um dos botões abaixo para ter acesso à compra ou resgate do produto.
                                </p>
                                <p style="font-size: 12px;">
                                    <i>
                                        * Envio do Kit pelo correio é responsabilidade da empresa Cheque Teatro.
                                    </i>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            @if(Sentry::check())

                                <div class="col-md-6 col-sm-6">

                                    <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                                    <form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post">
                                        <!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                                        <input type="hidden" name="itemCode" value="2FC067862222AB51143EEF97CECD72A3" />
                                        <input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                                    </form>
                                    <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{Route("isonhei-club-produto", "cheque-teatro")}}" target="_blank" class="btn" style="background:#00a5e5;">
                                        <span style="color:white;">Trocar por pontos</span>
                                    </a>
                                </div>

                            @else

                                <a rel="nofollow" class="open-popup-link btn" href="#log-in" data-effect="mfp-zoom-in" style="background:#00a5e5;"  id="ct-login">
                                    <span style="color:white;">Faça seu login</span>
                                </a>
                                &nbsp;&nbsp;
                                <a rel="nofollow" class="open-popup-link btn" href="{{'#create-account'}}" data-effect="mfp-zoom-in" style="background:green;" id="ct-cadastro">
                                    <span style="color:white;">Cadastre-se</span>
                                </a>

                            @endif

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

    <script>

        $('#ct-login').click(function () {
            $.get("/metrica/site", { pagina:"cheque-teatro", metrica: "login" });
        });

        $('#ct-cadastro').click(function () {
            $.get("/metrica/site", { pagina:"cheque-teatro", metrica: "cadastro" });
        });

    </script>

@stop