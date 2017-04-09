
{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

    @if(isset($data['path_img']))
        <meta property="og:type" content="website">
        {{--<meta property="og:image" content="{{asset($data['path_img'])}}"/>--}}
        <meta property="og:image" content="{{asset('/assets/img/logo-isonhei-facebook_1200x630.png')}}"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
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
            <h1>{{$data['title_pag']}}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{Route('guia-de-empresas-categorias')}}">Categorias</a></li>
                <li class="active">{{$data['title_pag']}}</li>
            </ol>
        </div>
    </div>
    <!-- header End -->
{{--{{dd($data['path_img'])}}--}}
    <!-- data Start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec Start -->
                <div class="col-sm-16">

                    <div class="row">
                        {{ Form::open(array('url' =>  ""  , 'method' => 'put', 'class' => 'form-horizontal', 'name' => 'frm')) }}

                                <div class="col-sm-8">
                                    <!-- Select Basic -->
                                    <div class="form-group {{ $errors->first('categoria', 'has-error') }}">
                                        <div class="col-md-15 col-sm-15">
                                            {{ Form::select('categoria', GuiaCategoria::comboboxPortal(), $categoria, array('class' => 'form-control', 'required', 'id' => 'categoria')) }}
                                            {{ $errors->first('categoria', '<span class="text-danger">:message</span>') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <!-- Select Basic -->
                                    <div class="form-group {{ $errors->first('cidade', 'has-error') }}">
                                        <div class="col-md-15 col-sm-15">
                                            {{ Form::select('cidade', GuiaCidade::comboboxPortal(), $cidade, array('class' => 'form-control', 'required', 'id' => 'cidade')) }}
                                            {{ $errors->first('cidade', '<span class="text-danger">:message</span>') }}
                                        </div>
                                    </div>
                                </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <hr>

            <div style="min-height: 370px;">

                @if(count($anuncios))
                    <?php $posicao = 1;?>
                    @foreach($anuncios as $anuncio)

                        <?php
                            $img_destaque = null;
                            if(isset($anuncio->path_img_destaque)){
                                $img_destaque = $anuncio->path_img_destaque;
                            }
                            else{
                                $img_destaque = "assets/imagens/img_padrao.gif";
                            }
                        ?>

                        <div class="guia-empresa-box">
                            <div class="guia-empresa-box-plano cursor" onclick="logClickFiltro('{{$anuncio->id}}', '{{$anuncio->url}}', '{{$posicao}}')"
                                    style="border:4px solid {{$anuncio->cor}}; background-image: url('{{asset($img_destaque)}}');">

                                <div class="guia-empresa-box-img-fake"></div>

                                <div class="guia-empresa-box-line">
                                    <div class="guia-empresa-box-logo"  style=" border-right: 1px solid {{$anuncio->cor}} ; border-top: 1px solid {{$anuncio->cor}} ; background: {{$anuncio->cor}};">

                                        @if(isset($anuncio->path_img_logo))
                                            {{HTML::image($anuncio->path_img_logo, $anuncio->empresa, array('class'=>'guia-empresa-box-logo-img'))}}
                                        @endif

                                    </div>

                                    <div class="guia-empresa-box-emp-fake"></div>

                                    <div class="guia-empresa-box-emp">

                                            <span class="guia-empresa-box-emp-nome">{{$anuncio->empresa}}</span>
                                            <br>
                                            <span>{{$anuncio->categoria}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="guia-empresa-box-dsc">
                                {{$anuncio->descricao}}
                            </div>
                        </div>

                        <?php $posicao += 1;?>
                    @endforeach
                @else
                    <p>Nenhum anúncio encontrado.</p>
                @endif
            </div>
        </div>
    </section>
<!-- Data End -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>

            $("#categoria, #cidade").change(function(){

                var categoria = $("#categoria").val();
                var cidade = $("#cidade").val();

                var pathname = window.location.pathname;
                var pathname = pathname.replace(/filtro([^.]+)/, "") + "filtro/";

                window.location.replace(pathname + categoria + "/" + cidade);
            });

            function logClickFiltro(anuncioid, url, posicao){

                var paginaid = 1;
                var tipoid   = 1;
                var chave    = 0;

                $.get( "/metrica/guia-de-empresas-metrica/" + anuncioid + "/" + paginaid + "/" + tipoid + "/" + posicao + "/" + chave + "/" , function(data){

                        var pathname = window.location.pathname;
                        var pathname = pathname.replace(/filtro([^.]+)/, "");
                        window.location.replace(pathname + url);
                });
            }

    </script>

@stop

