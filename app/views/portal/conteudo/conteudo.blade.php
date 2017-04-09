{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

    {{HTML::style("assets/css/custom/conteudo/conteudo.css")}}

    @if(isset($conteudo["path_img"]))
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{asset($conteudo["path_img"] . $conteudo['id'] . '/' . $conteudo['nome_img'])}}"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="650">

    @endif
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

                    @if(isset($data['cat_nivel2_nome']))
                        <li><a href="/{{$data['cat_nivel2_url']}}">{{$data['cat_nivel2_nome']}}</a></li>
                        <li class="active">{{$data['cat_nivel1_nome']}}</li>
                    @else
                        <li class="active">{{$data['cat_nivel1_nome']}}</li>
                    @endif

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
                            <div class="col-sm-15">
                                <div class="col-sm-16 imagemPrincConteudo">
                                    {{HTML::image($conteudo["path_img"].$conteudo['id'].'/'.$conteudo['nome_img'], $conteudo["titulo"], array('class'=>'img-thumbnail'))}}
                                </div>

                                <div class="col-sm-16 sec-info conteudoTexto">
                                    <div class="" >{{$conteudo["conteudo"]}} </div>
                                    <hr>
                                </div>

                                @if(count($conteudos_relacionado))
                                    <div class="col-sm-16 related">
                                        <div class="main-title-outer pull-left">
                                            <div class="main-title titulo-rel">Tópicos Relacionados</div>
                                        </div>
                                        <div class="row">
                                            @foreach($conteudos_relacionado as $relacionado)

                                                <div class="item topic col-sm-5 col-xs-7 topicos-relacionados">
                                                    @if(File::exists(public_path().$relacionado["path_img"].$relacionado['id'].'/'.'251x151_'.$relacionado['nome_img']))
                                                        {{
                                                            HTML::decode(HTML::link($relacionado["url"],
                                                                HTML::image($relacionado["path_img"].$relacionado['id'].'/'.'251x151_'.$relacionado['nome_img'], $relacionado["titulo"], array('class'=>'img-thumbnail conteudo-item-relacionado-img')),
                                                                array('rel' => 'nofollow')))
                                                        }}
                                                    @else
                                                        {{
                                                            HTML::decode(HTML::link($relacionado["url"],
                                                              HTML::image($relacionado["path_img"].$relacionado['id'].'/'.$relacionado['nome_img'], $relacionado["titulo"], array('class'=>'img-thumbnail conteudo-item-relacionado-img')),
                                                                 array('rel' => 'nofollow')))
                                                        }}
                                                    @endif
                                                    <h4>{{HTML::link($relacionado["url"],$relacionado["titulo"])}}</h4>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- left sec end -->

                    <!-- right sec start -->
                    @include('elements.menu-lateral.dinamico.banner-dinamico')
                    <!-- right sec end -->
                </div>
            </div>
        </section>
        <!-- data end -->
    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop