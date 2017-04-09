{{-- Page title --}}
@section('title')
    {{$data['title_seo']}}
@stop

@section('description')
    {{$data['description_seo']}}
@stop

@section('keywords')
    {{$data['keywords_seo']}}
@stop

{{-- page level styles --}}
@section('header_styles')
    <style>

        .centralizaimg {
            margin-left: 15%;
        }

        .imagemacerta {
            margin: 0 auto;
            position: relative;
            width: 192px;
            border: 0px solid;

        }
    </style>

@stop

{{-- Page content --}}
@section('conteudo')

    <!-- conteudo Start -->
    <div>
        <!-- header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{$data['title_pag']}} </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('portal') }}">Home</a></li>
                    <li class="active">{{$data['title_pag']}}</li>
                </ol>
            </div>
        </div>
        <!-- header End -->

        <!-- data Start -->
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-4 col-md-4 col-xs-16">
                        <div class="bordered">
                            <div class="row">

                                @include("portal.painel.menu_lateral")

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-16">
                        <div class="bordered painel_box_conteudo">
                            <div class="row">
                                <div class="col-md-15 col-md-push-1 col-xs-15 col-xs-push-1">
                                    <div class="col-md-5 col-sm-8 col-xs-15 ">
                                        {{--<div class="blocoimgtexto">--}}

                                        <a href="{{URL::to('/assets/download/produto-digital/como_evitar_os_12_erros_mais_comuns_em_casamentos.pdf')}}"
                                           download class=" centralizaimg">
                                            <div class="imagemacerta">
                                                {{HTML::image('/assets/img/expo-noivas/painel-ebook.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>Download
                                                        do
                                                        E-book</strong></p>
                                            </div>


                                        </a>
                                        {{--</div>--}}

                                    </div>
                                    <div class="col-md-5 col-sm-8 col-xs-15  ">
                                        <a href="{{route('lista-cupons-de-desconto')}}" class=" centralizaimg">
                                            <div class="imagemacerta">

                                                {{HTML::image('/assets/img/expo-noivas/painel-descontos.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>Vitrine
                                                        de Descontos</strong></p>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-md-5 col-sm-8 col-xs-15 ">
                                        <a href="{{Route("conteudo", "workshop")}}" class=" centralizaimg">
                                            <div class="imagemacerta">
                                                {{HTML::image('/assets/img/expo-noivas/painel-workshop.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>Workshop
                                                        de Noivas e Debutantes</strong></p>
                                            </div>
                                        </a>

                                    </div>


                                    <div class="col-md-5 col-sm-8 col-xs-15 ">
                                        <a href="{{route('site-sonhador-cadastro')}}" class=" centralizaimg">
                                            <div class="imagemacerta">
                                                {{HTML::image('/assets/img/expo-noivas/painel-sonhador.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>Crie
                                                        seu site e divulgue seus sonhos</strong></p>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-md-5 col-sm-8 col-xs-15 ">
                                        <a href="{{route('guia-de-empresas-categorias')}}" class=" centralizaimg">
                                            <div class="imagemacerta">
                                                {{HTML::image('/assets/img/expo-noivas/painel-guia-de-empresas.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>Guia
                                                        de
                                                        Empresas</strong></p>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col-md-5 col-sm-8 col-xs-15  ">
                                        <a href="{{route('page-fidelidade')}}" class=" centralizaimg">
                                            <div class="imagemacerta">
                                                {{HTML::image('/assets/img/expo-noivas/painel-club.png','Loja de produtos' , array('class'=>' ','width'=>'192','height'=>'192'))}}
                                                <p class="text-center text-uppercase" style="margin-top: 8px;"><strong>iSonhei
                                                        Club</strong></p>
                                            </div>
                                        </a>

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

