{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

    {{HTML::style('portal/fonts/vantagens/stylesheet.css')}}

@stop

{{-- Page content --}}
@section('conteudo')

    <!-- conteudo Start -->
    <div class="container">

        @include('notifications')
        <div id="notification"></div>

        <!-- data start -->

        <style>
            .vantagens-box h2{
                font-family: 'ubunturegular';
            }
            .vantagens-box p{
                font-family: ubunturegular;
                font-size: 14px;
                color: #444a4f;
            }
        </style>

        <section>
            <div class="container vantagens-box">

                <style>
                    .blocoVantagens h2{ font-family: 'ubuntu_condensedregular'; font-size: 38px; color: #056073; text-align: center;  margin-bottom: 34px;  margin-top: 25px;  font-weight: 300;}
                    .blocoVantagens{background-color: #dff3fd;}
                    .blocoVantagens p{border: 0px solid;font-size:14px;color:#444a4f;}
                    @media (max-width: 1024px) {
                        .blocoVantagens h2{ font-size: 25px; }
                        .blocoVantagens p{font-size:12px;}
                    }
                    @media (max-width: 768px) {
                        .blocoVantagens{
                            padding-bottom: 20px;
                        }
                    }
                </style>
                <div class="row blocoVantagens" >
                    <div class="col-xs-16 col-sm-16 col-md-8 " style="border: 0px solid;    padding-left: 0px;">
                        {{HTML::image('/portal/images/vantagens/mundo-vantagens.jpg','cheque-teatro',array("class"=>"match-height img-responsive"))}}
                    </div>
                    <div class="col-xs-16 col-sm-16 col-md-8  ">
                        <div class="col-xs-14 col-sm-14 col-md-14 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                            <h2>UM MUNDO DE VANTAGENS PARA VOCÊ E SUA FAMÍLIA</h2>
                            <p> Faça seu cadastro e veja as vantagens que preparamos para você.</p>
                            <p> Aqui você encontra matérias segmentadas para se manter atualizado nos assuntos referentes a turismo, casamento, debutante, infantil, além de contar com dicas de atrações para aproveitar os momentos de cultura e lazer.</p>
                            <p> Confira abaixo tudo que preparamos para você poder trilhar o caminho de suas realizações.</p>
                            <p>Todos os benefícios são gratuitos e exclusivos para os cadastrados.</p>
                        </div>
                    </div>

                </div>

                <style>
                    .linha-desconto{
                        background: #f2f2d4;
                        min-height: 430px;
                    }
                    .linha-desconto-titulo{
                        text-align: center;
                    }
                    .linha-desconto-titulo h2{
                        text-transform: uppercase;
                        padding-top: 10px;
                        font-size: 30px;
                        color: #c9a54c;
                        font-weight: normal;
                        font-family: ubuntu_condensedregular;
                    }
                    .linha-desconto-conteudo{
                        margin-top: 30px;
                    }
                    .linha-desconto-conteudo h3{
                        font-family: 'ubuntu_condensedregular';
                        font-size: 23px;
                        color: #ff4545;
                        padding-top: 18px;
                        padding-bottom: 18px;
                    }
                    .linha-desconto-conteudo p{
                        font-size: 14px;
                    }
                    .linha-desconto-box-img, .linha-desconto-box-texto{
                    }
                    .linha-desconto-box-img{
                        text-align: center;
                    }
                    .linha-desconto-img{
                        margin-left: 20px;
                    }
                    .linha-desconto-box-texto{
                    }
                    .linha-desconto-botao{
                        padding-left: 20px;
                        padding-right: 20px;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        font-weight: bold; font-family: ubuntu_condensedregular; font-size: 18px;
                    }
                    .botao_descontos{
                        background:#faab02;
                        color:#FFFFFF;
                        border-radius: 4px !important;
                    }
                    .botao_produtos{
                        background:#00a453;
                        color:#FFFFFF;
                        border-radius: 4px !important;
                    }
                    .linha-desconto a:hover{
                        color:#FFFFFF;
                    }
                    @media (max-width: 768px) {
                        .linha-desconto-box-texto{
                            text-align: center;
                        }
                        .linha-desconto-conteudo-direita{
                            margin-top: 50px;
                            margin-bottom: 50px;
                        }
                    }
                </style>

                <div class="row linha-desconto">
                    <div class="row linha-desconto-titulo">
                        <div class="col-md-16">
                            <h2>Tudo mais barato e divertido</h2>
                        </div>
                    </div>
                    <div class="row linha-desconto-conteudo">
                        <div class="col-md-8">
                            <div class="col-md-6 linha-desconto-box-img">
                                {{HTML::image("/portal/images/vantagens/cumpo-desconto-lad-esq.jpg",'',array('class'=>'img-responsive1 linha-desconto-img'))}}
                            </div>
                            <div class="col-md-10 linha-desconto-box-texto">
                                <h3>Cupons de descontos</h3>
                                <p>
                                    Ganhe descontos para auxiliar na realização dos seus sonhos.
                                </p>
                                <p>
                                    No iSonhei você adquire quantos cupons precisar de diversos produtos e serviços.
                                </p>
                                <br>
                                <a href="{{Route("lista-cupons-de-desconto")}}" target="_blank" class="linha-desconto-botao botao_descontos" id="btn-descontos">ACESSE OS DESCONTOS</a>
                            </div>
                        </div>
                        <div class="col-md-8 linha-desconto-conteudo-direita">
                            <div class="col-md-6 linha-desconto-box-img">
                                {{HTML::image("/portal/images/vantagens/troca-pontos-por-produtos-lad-dir.jpg",'',array('class'=>'img-responsive1'))}}
                            </div>
                            <div class="col-md-10 linha-desconto-box-texto">
                                <h3>Troque pontos por produtos</h3>
                                <p>
                                    Acumule pontos de forma simples e divertida para trocar por diversos produtos.
                                </p>
                                <p>
                                    Entre as opções estão eletrônicos, itens para casa, acessórios, diárias em Orlando e muito mais.
                                </p>
                                <br>
                                <a href="{{Route("isonhei-club-produto")}}" target="_blank" class="linha-desconto-botao botao_produtos" id="btn-produtos">VEJA OS PRODUTOS</a>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .tituloAzul{color:#4c8eab; text-align: center; font-weight: normal; padding-top: 15px;  font-family:ubuntu_condensedregular !important; font-size: 30px;}
                    .blocoDescontos{background-color:#e7f6fd; padding-bottom: 20px;}
                    .blocoTitulo{margin-bottom: 25px;}
                    .blocoTexto{margin-top: 6px; padding-left: 0px !important; padding-bottom: 15px;}
                    .blocoTexto h3{color:#ff4545; font-family: 'ubuntu_condensedregular'; font-size: 22px;}
                    .blocoGeral p{color:#444a4f; font-size:14px;}
                    .blocoGeral{ margin-top: 10px; margin-bottom: 10px;}

                    @media (min-width: 768px)and ( max-width:1199px) {
                        .blocoTexto { padding-left: 30px !important; }
                    }
                    @media(max-width: 991px){
                        .blocoTexto h3{ text-align: center;}
                        .blocoGeral img{ margin: 0 auto;}
                        .blocoGeral p{  text-align: center;color:#444a4f;}
                    }

                </style>

                <div class="row blocoDescontos">
                    <div class="col-xs-16 col-sm-16 col-md-16 " >

                        <!--- aqui vai o titulo -->

                        <div class="col-xs-16 col-sm-16 col-md-16 blocoTitulo" >
                            <h2 class="tituloAzul">DESCONTOS, LAZER, CULTURA E TURISMO NUM SÓ LUGAR</h2>

                        </div>
                        <!-- aqui o fim do titulo -->

                        <!-- bloco 1 imagem -->
                        <div class="col-xs-16 col-sm-16 col-md-16 blocoGeral" >

                            <div class=" col-xs-10 col-sm-10 col-md-5 col-md-offset-2 col-xs-offset-3 " >
                                {{HTML::image('/portal/images/vantagens/cheque-teatro.jpg','cheque-teatro',array("class"=>"match-height img-responsive"))}}
                            </div>
                            <div class=" col-xs-16 col-sm-16 col-md-7 col-md-offset-0 blocoTexto" >
                                <h3>Kit Cheque Teatro</h3>
                                <p>  Com o Kit Cheque Teatro você adquire 12 ingressos gratuitos ao teatro com acompanhantes que ganham 50% de desconto no valor da entrada.</p>

                                <p> Ganhe também descontos especiais em mais de 500 estabelecimentos em todo o Brasil como Cinemark, Hopi Hari, hotéis, pousadas, parques, entre outras atrações.</p>

                            </div>
                        </div>
                        <!-- fim bloco 1 imagem -->
                        <!-- bloco 2 imagem -->
                        <div class="col-xs-16 col-sm-16 col-md-16 blocoGeral" >

                            <div class=" col-xs-10 col-sm-10 col-md-5 col-md-offset-2 col-xs-offset-3 " >
                                {{HTML::image('/portal/images/vantagens/cvc.jpg','cvc',array("class"=>"match-height img-responsive"))}}
                            </div>
                            <div class=" col-xs-16 col-sm-16 col-md-7 col-md-offset-0 blocoTexto" >
                                <h3>Descontos em pacotes de viagens</h3>

                                <p> Aproveite momentos únicos por ótimos preços com a CVC.</p>
                                <p>Escolha o destino dos seus sonhos, reúna a família ou amigos e reserve sua viagem com preços incríveis, feitos sob medida para o seu bolso. Não perca tempo, conheça o seu próximo destino turístico.</p>
                            </div>
                        </div>
                        <!-- fim bloco 2 imagem -->
                        <!-- bloco 3 imagem -->
                        <div class="col-xs-16 col-sm-16 col-md-16 blocoGeral" >

                            <div class=" col-xs-10 col-sm-10 col-md-5 col-md-offset-2 col-xs-offset-3 " >
                                {{HTML::image('/portal/images/vantagens/rentcell.jpg','rentcell',array("class"=>"match-height img-responsive"))}}
                            </div>
                            <div class=" col-xs-16 col-sm-16 col-md-7 col-md-offset-0 blocoTexto" >
                                <h3>Aluguel de celular e venda de chip </h3>

                                <p> Fale ilimitado nos Estados Unidos com o Brasil e ainda tenha um pacote 4G para acessar a internet a hora que você desejar, sem ficar preso ao Wi-Fi. Além de tudo isso você também poderá mandar SMS à vontade.</p>
                                <p> No iSonhei você pode contratar todos esses benefícios com 10% de desconto.</p>
                            </div>
                        </div>
                        <!-- fim bloco 3 imagem -->

                    </div>

                </div>


                <Style>

                    .blocoRealizacao p {
                        min-height: 120px;
                        text-align: center;
                    }
                    .blocoRealizacao h4 {
                        text-align: center;
                        color: #ff4545;
                        font-family: 'ubuntu_condensedregular';
                        font-size: 21px;
                        min-height: 60px;
                    }
                    .blocoRealizacao img{ margin: 0 auto;}
                    .blocoRealizacao{background-color: #daf2e8;}
                    .blocoRealizacao .bloco4{ min-height: 500px;}
                    .blocoRealizacao h2 {font-family: 'ubuntu_condensedregular'; font-weight: normal; font-size: 30px; color: #419375;text-align: center;text-transform: uppercase; padding-top: 15px;}
                    .blocoRealizacao h3 {font-family: 'ubuntu_condensedregular'; font-weight: normal; font-size: 21px;color: #419375;text-align: center;text-transform: uppercase; padding-bottom: 25px;}

                    .btn-download-ebook{background: #0d7ea0;}
                    .blocoRealizacao .btn{
                        font-weight: bold; font-family: ubuntu_condensedregular; font-size: 18px; border-radius: 4px !important;
                    }

                    @media(max-width: 320px) {
                        .blocoRealizacao .bloco4 {
                            margin-bottom: 25px;
                        }
                    }

                    @media(max-width: 768px) {
                        .blocoRealizacao p {
                            min-height: 60px;
                        }
                    }

                    @media(max-width: 991px) {
                        .blocoRealizacao .bloco4 {
                            min-height: 400px !important;
                        }
                        .blocoRealizacao h4 {

                            min-height: 30px !important;
                        }
                    }

                    @media(min-width: 992px) and (max-width: 1199px) {

                        .blocoRealizacao .btn-primary,.btn-warning , .btn-success { margin-bottom: 35px;}

                    }
                    @media(max-width: 991px) {
                        .blocoRealizacao .bloco4 {
                            min-height: 400px !important;
                        }
                    }

                </Style>

                <div class="row blocoRealizacao" >
                    <div class="col-xs-16 col-sm-16 col-md-16 blcoRealizacaoCorpo">
                        <div class="col-xs-16 col-sm-16 col-md-16 ">
                            <h2>o iSonhei te dá o caminho para a realização dos seus sonhos!</h2>
                            <h3 >Cadastrado pode utilizar gratuitamente várias formas para alcançar tudo o que deseja.</h3>
                        </div>
                        <div class="col-xs-0 col-sm-0 col-md-2 ">

                        </div>
                        <div class="col-xs-16 col-sm-16 col-md-4 bloco4">
                            <div class="col-xs-16 col-sm-16 col-md-16 ">
                                {{HTML::image('/portal/images/vantagens/guia-de-fornecedores.jpg','cheque-teatro',array("class"=>"match-height img-responsive"))}}
                                <h4>Guia de Fornecedores</h4>
                                <p>Um guia repleto de empresas que oferecem o que você precisa para realizar o sonho da sua festa de casamento ou debutante, viagens a qualquer lugar do mundo ou itens para o seu bebê.</p>
                                <center> <a href="{{Route("guia-de-empresas-categorias")}}" target="_blank" class="btn btn-warning" id="btn-guia">ENCONTRE AQUI</a></center>
                            </div>

                        </div>
                        <div class="col-xs-16 col-sm-16 col-md-4 bloco4">
                            <div class="col-xs-16 col-sm-16 col-md-16 ">
                                {{HTML::image('/portal/images/vantagens/divulgue-seus-sonhos.jpg','cheque-teatro',array("class"=>"match-height img-responsive"))}}
                                <h4>Divulgue seus Sonhos</h4>
                                <p>Que tal uma ajudinha para realizar seus sonhos? Aqui você cria um site gratuitamente para divulgar seus eventos, arrecadar fundos para realizar viagens, comprar um carro e muito mais.</p>
                                <center><a href="{{Route("site-sonhador-cadastro")}}" target="_blank" class="btn btn-success" id="btn-site-sonhador">CRIE SEU SITE GRÁTIS</a></center>
                            </div>

                        </div>
                        <div class="col-xs-16 col-sm-16 col-md-4 bloco4">
                            <div class="col-xs-16 col-sm-16 col-md-16 ">
                                {{HTML::image('/portal/images/vantagens/e-book-gratuito.jpg','cheque-teatro',array("class"=>"match-height img-responsive"))}}
                                <h4>E-book Gratuito</h4>
                                <p class="texto-ebook">
                                    Saiba como evitar os 12 erros mais comuns em casamentos. Neste e-book você aprende a previnir problemas com lista de convidados, orçamentos, contratações, entre outras dicas.
                                </p>

                                <center>
                                    <a class="btn-download-ebook btn btn-primary" id="download-ebook" @if(Sentry::check()) href="{{URL::to('/assets/download/produto-digital/como_evitar_os_12_erros_mais_comuns_em_casamentos.pdf')}}" download @endif rel="nofollow">
                                        FAÇA O DOWNLOAD
                                    </a>
                                </center>
                                {{--<a class="gtn btn-xs btn-success" href="{{URL::to('/') . $resgate->path_arquivo}}" download rel="nofollow">DOWNLOAD</a>--}}


                            </div>
                        </div>
                        <div class="col-xs-0 col-sm-0 col-md-2 ">

                        </div>
                    </div>

                </div>


                <style>
                    .linha-club{
                        background: #c5e2f0;
                        min-height: 430px;
                        font-size: 16px;
                        color:#444a4f;
                    }

                    .linha-club-img{
                        width: 1150px;
                    }

                    .linha-club-descricao{
                        text-align: center;
                    }
                    .linha-club-acoes{
                        margin-top: 20px;
                        text-align: center !important;
                    }

                    .linha-club-botao{
                        margin-top: 40px;
                        margin-bottom: 40px;
                        text-align: center;
                    }

                    .botao-club{
                        background:#004a80;
                        color:#FFFFFF;
                        padding-left: 40px;
                        padding-right: 40px;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        font-size: 18px;
                        font-family: ubuntu_condensedregular;
                        border-radius: 4px !important;
                    }
                    .linha-club a:hover{
                        color:#FFFFFF;
                    }
                    @media (max-width: 768px) {
                        .linha-club-acoes-direita{
                            margin-top: 30px;
                        }
                    }
                    @media (max-width: 490px) {
                        .botao-club{
                            font-size: 12px;
                            padding-left: 30px;
                            padding-right: 30px;
                        }
                    }
                    @media (max-width: 320px) {
                        .botao-club{
                            font-size: 8px;
                            padding-left: 10px;
                            padding-right: 10px;
                        }
                    }

                </style>
                <div class="row linha-club">
                    <div class="row linha-club-box-img">
                        <div class="col-md-16">
                            {{HTML::image("/portal/images/vantagens/isonhei-club.jpg",'',array('class'=>'img-responsive linha-club-img'))}}
                        </div>
                    </div>
                    <div class="row linha-club-descricao">
                        <div class="col-md-16">
                            <p>
                                Conquistar produtos pode ser mais simples do que imagina.
                            </p>
                            <p>
                                Com o clube de vantagens do iSonhei Club você acumula pontos que podem ser trocados por produtos incríveis.
                            </p>
                            <p>
                                Veja como é fácil pontuar:
                            </p>
                        </div>
                    </div>
                    <div class="row linha-club-acoes">
                        <div class="col-md-16">
                            <div class="col-md-8">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <center>
                                        {{HTML::image("/portal/images/vantagens/bloco1.jpg",'',array('class'=>'img-responsive'))}}
                                    </center>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <center>
                                        {{HTML::image("/portal/images/vantagens/bloco2.jpg",'',array('class'=>'img-responsive'))}}
                                    </center>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-8 col-sm-8 col-xs-8 linha-club-acoes-direita">
                                    <center>
                                        {{HTML::image("/portal/images/vantagens/bloco3.jpg",'',array('class'=>'img-responsive'))}}
                                    </center>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 linha-club-acoes-direita">
                                    <center>
                                        {{HTML::image("/portal/images/vantagens/bloco4.jpg",'',array('class'=>'img-responsive'))}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row linha-club-botao">
                        <div class="col-md-16">
                            <a class="open-popup-link btn botao-club" href="{{'#create-account'}}" data-effect="mfp-zoom-in" id="page-vantagens-box-isonhei-club">
                                GANHE PONTOS AO SE CADASTRAR. CLIQUE AQUI.
                            </a>
                        </div>
                    </div>
                </div>


                <style>
                    .linha-ranking{
                        background: #fffde9;
                        padding: 10px;
                    }
                    .linha-ranking-titulo{
                        text-align: center;
                    }
                    .linha-ranking-titulo h2{
                        padding-top: 10px;
                        font-size: 30px;
                        color: #ceb440;
                        text-transform: uppercase;
                        font-family: ubuntu_condensedregular;
                    }
                    .linha-ranking-titulo p{
                        font-size: 16px;
                        color: #444a4f;
                    }
                    .linha-ranking-subtitulo{
                        margin-top: 20px;
                        margin-bottom: 30px;
                    }
                    .linha-ranking-subtitulo h3{
                        text-align: center;
                        font-size: 23px;
                        color: #ff4545;
                        font-family: ubuntu_condensedregular;
                    }

                </style>

                <div class="row linha-ranking">
                    <div class="row linha-ranking-titulo">
                        <div class="col-md-16">
                            <h2>Pontue, suba de nível e multiplique a forma de acumular pontos.</h2>
                            <p>
                                Seus pontos determinarão qual nível do ranking você está.
                            </p>
                            <p>
                                A partir da mudança de nível os pontos passarão a ser multiplicados conforme indicado abaixo.
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="row linha-ranking-titulo">
                        <div class="col-md-16">
                            <center>
                                {{HTML::image("/portal/images/vantagens/ranking.jpg",'',array('class'=>'img-responsive'))}}
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-16 linha-ranking-subtitulo">
                            <h3>Com o multiplicador do iSonhei Club você pode até dobrar seus pontos ganhos em cada ação.</h3>
                        </div>
                    </div>
                </div>

                <style>
                    .linha-loja{
                        background: #fdbf0f;
                        min-height: 470px;
                    }
                    .linha-loja-titulo h2{
                        text-transform: uppercase;
                        padding-top: 10px;
                        font-size: 30px;
                        color: #84590a;
                        font-weight: normal;
                        font-family: ubuntu_condensedregular;
                    }
                    .linha-loja-box-img{
                        margin-top: 10px;
                        margin-bottom: 15px;
                    }
                    .linha-loja p{
                        color: #84590a;
                        font-size: 16px;
                    }

                    .linha-loja a{
                        color: #84590a;
                    }

                </style>

                <div class="row linha-loja">
                    <div class="row linha-loja-titulo">
                        <div class="col-md-16 text-center">
                            <h2>Venda Produtos e Ganhe Bônus em Dinheiro!</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-2 col-xs-12 col-xs-offset-2 text-center">
                            <div class="row linha-loja-box-img">
                                <center>
                                    {{HTML::image("/portal/images/vantagens/store-icon.jpg",'',array('class'=>'img-responsive'))}}
                                </center>
                            </div>
                            <div class="row">
                                <p>
                                    Na <a href="http://www.loja.isonhei.com.br" target="_blank"><strong>iSonhei Store</strong></a> você tem a facilidade de encontrar diversos produtos com preços diferenciados e,
                                    vantagens exclusivas para quem é cadastrado, como participar do <i> Programa de Afiliados </i> e promoções exclusivas.
                                </p>
                                <p>
                                    Ao participar do programa, você gera bônus que podem ser revertidos em dinheiro ou em prêmios, de acordo com a promoção vigente.
                                </p>
                                <p>
                                    Não perca tempo, acesse <a href="http://www.loja.isonhei.com.br" target="_blank"><strong>loja.isonhei.com.br</strong></a> e torne-se agora mesmo um
                                    <a href="http://www.loja.isonhei.com.br/seja-afiliado" target="_blank"><strong>Afiliado da iSonhei Store</strong></a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .linha-cadastre{
                        background-image: url('{{asset("/portal/images/vantagens/cadastre-se.jpg")}}');
                        background-size: 1150px 371px;
                        height: 371px;
                        text-align: center;
                    }

                    .linha-cadastre-titulo{
                        padding: 8px;
                        margin-top: 80px;
                    }
                    .linha-cadastre-titulo h2{
                        font-family: ubuntu_condensedregular; font-size: 46px; color: #3d566e;
                    }
                    .linha-cadastre-botao{
                        margin-top: 60px;
                    }
                    .botao-cadastre{
                        background: #597da0;
                        color: #FFFFFF;
                        font-size:25px;
                        padding-left: 40px;
                        padding-right: 40px;
                        padding-top: 5px;
                        padding-bottom: 5px;
                        font-family: ubunturegular;
                        border-radius: 4px !important;
                    }
                    .linha-cadastre a:hover{
                        color:#FFFFFF;
                    }
                    @media (max-width: 490px) {
                        .linha-cadastre-titulo{
                            margin-top: 70px;
                        }
                        .linha-cadastre-titulo h2{
                            font-size:28px;
                        }
                        .linha-cadastre-botao{
                            margin-top: 50px;
                        }
                    }

                </style>
                <div class="row linha-cadastre">
                    <div class="row">
                        <div class="col-md-16 linha-cadastre-titulo">
                            <h2>Faça parte do iSonhei você também!</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-16 linha-cadastre-botao">
                            <a class="open-popup-link btn botao-cadastre" href="{{'#create-account'}}" data-effect="mfp-zoom-in" id="page-vantagens-box-cadastro">
                                CADASTRE-SE
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- data end -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('portal/js/jquery.confirm-master/jquery.confirm.js') }}"></script>

    <script>

        jQuery(document).ready(function() {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "view-page" });
        });

        $("#download-ebook").click(function () {

            @if(Sentry::check())
                var login = true;
            @else
                var login = false;
            @endif

            if (login == false) {

                $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-download-ebook" });

                $.confirm({
                    text: "<p>Faça parte do iSonhei e baixe este e-book incrível gratuitamente.</p>" +
                          "<p>Caso já seja cadastrado, faça o login e clique no botão de download novamente.</p>",
                    title: "Atenção",
                    confirm: function (button) {
                        jQuery.magnificPopup.open({
                            items: {src: '#log-in'}, type: 'inline'
                        }, 0);
                    },
                    cancel: function (button) {
                        jQuery.magnificPopup.open({
                            items: {src: '#create-account'}, type: 'inline'
                        }, 0);
                    },
                    confirmButton: "Login",
                    cancelButton: "Cadastre-se",
                    post: true,
                    confirmButtonClass: "btn-default",
                    cancelButtonClass: "btn-danger",
                    dialogClass: "modal-dialog modal-md"
                });
            }
            else {
                //metrica download
                $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "download-ebook" });
            }

        });

        $('#btn-descontos').click(function () {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-descontos" });
        });

        $('#btn-produtos').click(function () {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-produtos" });
        });

        $('#btn-site-sonhador').click(function () {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-site-sonhador" });
        });

        $('#page-vantagens-box-isonhei-club').click(function () {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-cadastro-box-isonhei-club" });
        });

        $('#page-vantagens-box-cadastro').click(function () {
            $.get("/metrica/site", { pagina:"vantagens-cadastrado", metrica: "click-cadastro-box-cadastre-se" });
        });

    </script>
@stop