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
                    <li class="active">Resultado da Busca</li>
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
                            <div class="col-sm-16">
                                <h3>Encontramos <span
                                            class="text-danger">{{$conteudos->getTotal()+ $produtoBusca->getTotal()+ $guiaEmpresa->getTotal()}}</span>
                                    resultados da busca por <span class="text-danger"> {{\Input::get("s")}}</span>
                                </h3>
                                <hr>
                            </div>
                            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s"
                                 data-wow-offset="130">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified menu-busca" role="tablist">
                                    <li class="active">
                                        <a href="#total" role="tab" data-toggle="tab">
                                            <div class="titulo-resultado"> Todos Resultados
                                                <span class="badge">{{$conteudos->getTotal()+ $produtoBusca->getTotal()+ $guiaEmpresa->getTotal()}}</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="">
                                        <a href="#conteudo" role="tab" data-toggle="tab">
                                            <div class="titulo-resultado">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Conteúdo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class="badge">{{$conteudos->getTotal()}}</span>
                                            </div>
                                        </a>

                                    </li>
                                    <li class="">
                                        <a href="#produto" role="tab" data-toggle="tab">
                                            <div class="titulo-resultado">iSonhei Store
                                                <span class="badge">{{$produtoBusca->getTotal()}}</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#guia-empresa" role="tab" data-toggle="tab">
                                            <div class="titulo-resultado">Guia de Empresas
                                                <span class="badge">{{$guiaEmpresa->getTotal()}}</span>
                                            </div>
                                        </a>

                                    </li>
                                </ul>
                                <div class="tab-content .result-busca">
                                    @include('portal.busca.total')
                                    @if($conteudos)

                                        <div class="tab-pane"
                                             id="conteudo">
                                            @foreach($conteudos as $key =>$conteudo)

                                                <ul class="list-unstyled">
                                                    <li><a href="#">
                                                            <div class="row">
                                                                <div class="col-sm-7">

                                                                    @if(File::exists(public_path().$conteudo["path_img"].$conteudo['id'].'/'.'365x220_'.$conteudo['nome_img']))
                                                                        {{ HTML::decode(HTML::link(route('conteudo',$conteudo["url"]), HTML::image($conteudo["path_img"].$conteudo['id'].'/'.'365x220_'.$conteudo['nome_img'],'',array('class'=>'img-thumbnail'))))}}
                                                                    @else
                                                                        {{ HTML::decode(HTML::link(route('conteudo',$conteudo["url"]), HTML::image($conteudo["path_img"].$conteudo['id'].'/'.$conteudo['nome_img'],'',array('class'=>'img-thumbnail'))))}}
                                                                    @endif

                                                                </div>
                                                                <div class="col-sm-9"><a href="#">
                                                                        <div class="sec-info">
                                                                            <h3>
                                                                                {{HTML::link($conteudo["url"],$conteudo["titulo"])}}
                                                                            </h3>
                                                                        </div>
                                                                    </a>

                                                                    <p>{{$conteudo["introducao"]}}</p>
                                                                </div>
                                                            </div>
                                                        </a></li>

                                                </ul>

                                            @endforeach

                                        </div>


                                    @endif
                                    @if($produtoBusca)
                                        <div class="tab-pane"
                                             id="produto">
                                            @foreach($produtoBusca as $result)

                                                <ul class="list-unstyled">
                                                    <li><a href="#">
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                    {{--<img width="1000" height="606" alt="" src="images/sec/sec-1.jpg" class="img-thumbnail">--}}
                                                                    {{ HTML::decode(HTML::link(route('isonhei-club-produto',$result["url"]), HTML::image($result["path_img"],'',array('class'=>'img-thumbnail'))))}}
                                                                </div>
                                                                <div class="col-sm-9"><a href="#">
                                                                        <div class="sec-info">
                                                                            <h3>
                                                                                {{HTML::link(route('isonhei-club-produto',$result["url"]),$result["nome"])}}
                                                                            </h3>
                                                                        </div>
                                                                    </a>

                                                                    <p>{{$result["descricao"]}}</p>
                                                                </div>
                                                            </div>
                                                        </a></li>

                                                </ul>
                                            @endforeach

                                        </div>
                                    @endif
                                    @if($guiaEmpresa)
                                        <div class="tab-pane"
                                             id="guia-empresa">
                                            @foreach($guiaEmpresa as $result)
                                                {{--{{dd($result)}}--}}
                                                <ul class="list-unstyled">
                                                    <li><a href="#">
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                    {{--<img width="1000" height="606" alt="" src="images/sec/sec-1.jpg" class="img-thumbnail">--}}
                                                                    {{ HTML::decode(HTML::link(route('guia-de-empresas-anuncio',$result["url"]), HTML::image($result["path_img"],'',array('class'=>'img-thumbnail'))))}}
                                                                </div>
                                                                <div class="col-sm-9"><a href="#">
                                                                        <div class="sec-info">
                                                                            <h3>
                                                                                {{HTML::link(route('guia-de-empresas-anuncio',$result["url"]),$result["nm_nome_fantasia"].' - '.$result['nome'])}}
                                                                            </h3>
                                                                        </div>
                                                                    </a>

                                                                    <p>{{$result["descricao"]}}</p>
                                                                </div>
                                                            </div>
                                                        </a></li>

                                                </ul>
                                            @endforeach
                                        </div>
                                    @endif


                                </div>
                            </div>

                        </div>

                    </div>
                    @include('elements.menu-lateral.dinamico.banner-dinamico-sonhador')
                </div>
            </div>
        </section>
        <!-- data end -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script>
        jQuery(window).load(function () {
            for (var a = 0; jQuery(".badge ").length > a; a++) {
                if (jQuery(".badge:eq(" + [a] + ")").html() == "0") {

                    jQuery(".menu-busca li:eq(" + [a] + ")").css("display", "none")
                }
            }
            ;
        });

    </script>
@stop