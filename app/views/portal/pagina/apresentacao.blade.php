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
                    <div class="col-md-16 col-sm-16">
                        <div class="row">
                            <p style=" font-size:20px; padding: 30px;">
                                iSonhei, o portal <strong>inspirador</strong> de sonhos.<br>
                                Saiba como <strong>planejar</strong>, <strong>economizar</strong> e trilhar o caminho certo para suas conquistas.
                            </p>
                            <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s" style="padding: 30px;">
                                <a href="{{Route("conteudo-categoria-pai", "turismo")}}" target="_blank">
                                    <img width="1000" height="606" alt="" src="{{asset('/portal/images/apresentacao/machu-pichu.jpg')}}" class="img-thumbnail">
                                    <div class="sec-info">
                                        <h3>Sua próxima viagem começa aqui</h3>
                                    </div>
                                </a>
                                <p>Conheça novos lugares e roteiros no iSonhei.</p>
                                <p>Encontre inspiração para novos destinos, dicas e fornecedores para planejar e realizar suas viagens.</p>
                            </div>
                            <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s" style="padding: 30px;">
                                <a href="{{Route("page-fidelidade")}}" target="_blank">
                                    <img width="1000" height="606" alt="" src="{{asset('/portal/images/apresentacao/clube-de-vantagens.jpg')}}" class="img-thumbnail">
                                    <div class="sec-info">
                                        <h3>Ganhe prêmios participando do portal</h3>
                                    </div>
                                </a>
                                <p>Sua participação vale pontos que podem ser trocados por prêmios no iSonhei Store</p>
                                <p>Para acumular pontos: Cadastre-se, indique amigos e entre em contato com prestadores de serviços no guia de empresas</p>
                            </div>
                            <div class="row">
                                <br><br>
                                <center>
                                    <a rel="nofollow" class="open-popup-link btn" href="{{'#create-account'}}" data-effect="mfp-zoom-in" style="background:green;" id="cadastro">
                                        <h1 style="color:white;">Cadastre-se e participe</h1>
                                    </a>
                                </center>
                                <Br><Br>
                            </div>
                            <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s" style="padding: 30px;">
                                <a href="{{Route("site-sonhador-cadastro")}}" target="_blank">
                                    <img width="1000" height="606" alt="" src="{{asset('/portal/images/apresentacao/sonhador.jpg')}}" class="img-thumbnail">
                                    <div class="sec-info">
                                        <h3>Divulgue seu sonho</h3>
                                    </div>
                                </a>
                                <p>Arrecade dinheiro com a divulgação do seu sonho.</p>
                                <p>Através do site do sonhador, você cria cotas virtuais de presentes para seus amigos comprarem e você receber em dinheiro.</p>
                            </div>
                            <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s" style="padding: 30px;">
                                <a href="{{Route("guia-de-empresas-categorias")}}" target="_blank">
                                    <img width="1000" height="606" alt="" src="{{asset('/portal/images/apresentacao/guia.jpg')}}" class="img-thumbnail">
                                    <div class="sec-info">
                                        <h3>Guia de fornecedores</h3>
                                    </div>
                                </a>
                                <p>Encontre prestadores de serviços para a realização dos seus próximos eventos.</p>
                                <p>Acesse o guia de empresas e escolha os prestadores que melhor atendem as suas necessidades.</p>
                            </div>

                        </div>
                    </div>
                    <!-- left sec end -->

                    {{--<!-- right sec start -->--}}
                    {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                        {{--<div class="bordered">--}}
                            {{--<div class="row ">--}}
                                {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s"--}}
                                     {{--data-wow-offset="150">--}}
                                    {{--<div class="table-responsive">--}}
                                        {{--@include('elements.menu-lateral.facebook')--}}
                                        {{--@include('elements.menu-lateral.instagram')--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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

        $('#cadastro').click(function () {
            $.get("/metrica/site", { pagina:"apresentacao-turismo", metrica: "cadastro"});
        });

    </script>

@stop