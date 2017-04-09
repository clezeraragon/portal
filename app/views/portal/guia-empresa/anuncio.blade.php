@extends('portal/layouts/default')
{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/examples.css') }}"/>
    {{HTML::style("portal/css/custom-blue.css")}}

    @if(isset($fotodestaque[0]["path_img"]))
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{asset($fotodestaque[0]["path_img"])}}"/>
        <meta property="og:image" content="{{asset('/assets/img/logo-isonhei-facebook_1200x630.png')}}"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif

@stop
{{--{{dd($anuncio)}}--}}
{{-- Page content --}}
@section('conteudo')
    {{--{{dd($fotodestaque[0])}}--}}
    <!-- conteudo Start -->
    <div class="container">
        {{--{{dd(URL::previous())}}--}}

        @include('notifications')
        <div id="notification"></div>
        <!-- header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{$anuncio['nm_nome_fantasia']}} </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>

                    @if(strstr(URL::previous(), "guia-de-empresas/filtro"))
                        <li><a href="{{URL::previous()}}">Guia de fornecedores</a></li>
                    @else
                        <li><a href="{{Route("get-guia-de-empresas-filtro", array($anuncio["url_categoria"], $anuncio["url_cidade"]))}}">Guia de fornecedores</a></li>
                    @endif

                    <li class="active">{{$anuncio['nm_nome_fantasia']}}</li>
                </ol>
            </div>
        </div>
        <!-- header End -->
        <!-- data Start -->
        {{--<section>--}}
        <div class="container">
            <div class="row">
                <!-- Dados do Cliente -->
                <div class="col-md-16 col-sm-16">
                    <div class="col-sm-8">

                        <h4>{{$anuncio["categoria"]}}</h4>

                        <div class="row">
                            <!-- Formulario -->
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <fieldset>

                                        @if($anuncio["st_google_maps"] == 1)
                                            <div class="form-group">
                                                <p class="cat-data-guia"><span class="ion-navigate"></span></p>
                                                <div class="col-md-13">
                                                    <div id="endereco"></div> <span class="cursor link_metrica" id="clickendereco">Mostrar o endereço</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($anuncio["nm_telefone1"])
                                            <div class="form-group">
                                                <p class="cat-data-guia"><span class="ion-ios7-telephone"></span></p>
                                                <div class="col-md-13">
                                                    <div id="telefone"><span class="cursor link_metrica" id="clicktelefone">Mostrar o telefone</span></div>
                                                </div>
                                            </div>
                                        @endif

                                        @if($anuncio["nm_site"])
                                            <div class="form-group">
                                                <p class="cat-data-guia"><span class="ion-android-contact"></span></p>
                                                <div class="col-md-13">
                                                    <span class="cursor link_metrica" id="clicksite">Acessar o site</span>
                                                </div>
                                            </div>
                                        @endif

                                            @if(Cupom::getCountEmpresaAnuncio($anuncio['guia_empresa_id']))
                                                <div class="form-group">
                                                    <p class="cat-data-guia"><span class="glyphicon glyphicon-tag" style="background: #ff0000 !important;"></span></p>
                                                    <div class="col-md-13">
                                                        <span class="cursor link_metrica" style="background: #ff0000 !important;">
                                                        <a href="{{route('lista-cupons-de-desconto-empresa', $anuncio['url_empresa'])}}" style="color:#F9FAFC !important;"target="_self"> Cupons de Descontos </a>
                                                            </span>

                                                    </div>
                                                </div>
                                            @endif

                                        <div class="form-group">
                                            <p class="cat-data-guia">
                                                @if($anuncio["nm_link_facebook"])
                                                    <span class="ion-social-facebook cursor" id="clickfacebook"></span>
                                                @endif
                                                @if($anuncio["nm_link_instagram"])
                                                    <span class="ion-social-instagram cursor" id="clickinstagram"></span>
                                                @endif
                                                @if($anuncio["nm_link_twitter"])
                                                    <span class="ion-social-twitter cursor" id="clicktwitter"></span>
                                                @endif
                                            </p>
                                        </div>

                                        <!-- Message body -->
                                        <div class="form-group">
                                            <hr>
                                            <div class="col-md-13">
                                                <p>{{$anuncio["texto"]}}</p>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                            <!-- Fim Formulario -->
                        </div>
                    </div>
                    <!-- fim dos dados -->

                    <!-- carousel start -->
                    <div class="col-sm-8 ">
                        <div id="sync1" class="owl-carousel">
                            <?php $pos = 1; ?>
                            @foreach($fotos as $foto)
                                <div class="box item">
                                    <a href="{{asset($foto["path_img"])}}" title="{{$anuncio['nm_nome_fantasia']}}"
                                       onclick="clickFoto('{{$anuncio['guia_empresa_id']}}', '{{$foto['id']}}', '{{$pos}}')">
                                        <div class="carousel-caption carousel-caption-ajuste">
                                            {{HTML::image($anuncio["path_img_logo"],'',array('class'=>'guia-empresa-box-logo-carousel'))}}
                                        </div>

                                        {{HTML::image($foto["path_img"], $foto["titulo"], array('class'=>'img-responsive img-img'))}}

                                        <div class="overlay"></div>
                                        <div class="overlay-info">
                                            <div class="cat"></div>
                                            <div class="info"></div>
                                        </div>
                                    </a>
                                </div>
                                    <?php $pos += 1; ?>
                            @endforeach
                        </div>

                        <div class="row">
                            <div id="sync2" class="owl-carousel">
                                @foreach($fotos as $foto)
                                    <div class="item">{{HTML::image($foto["path_img"], $foto["titulo"], array('class'=>'img-responsive','width'=>'1600','height'=>'972'))}}</div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- fim do carrocel -->

                </div>
            </div>

            </div>
            <div class="col-md-8 col-sm-8 col-md-push-8 col-sm-push-8 col-xs-16" style="top: 10px;">
                <div class="form-group">
                    <div class="col-md-4 col-xs-2 col-sm-7 col-sm-push-0 col-md-push-5  col-xs-pull-1" style="top: 22px;">
                        @include('elements.share-facebook')
                    </div>
                    <div class="col-md-8 col-xs-14 col-md-push-6 col-xs-push-4 col-sm-9 col-sm-push-0">
                        @include('elements.formulario-compartilhe')
                    </div>
                </div>
            </div>
        </div>
        <hr>
        {{--</section>--}}
        <!-- Data End -->
    </div>

    <div class="container ">
        <!--Recent videos start-->
        @if ($videos)
            <div class="col-sm-16  col-md-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="50">
                <div class="main-title-outer pull-left">
                    <div class="main-title">Vídeos</div>
                </div>
                <div class="row">
                    <div class="col-sm-11 col-xs-16">

                        <!-- Tab panes -->
                        <div class="tab-content">

                            @foreach($videos as $key => $video)

                                @if($key === 0)
                                    <div id="{{$video['link']}}"
                                         class="tab-pane embed-responsive embed-responsive-16by9 active">
                                        <iframe width="514" height="300"
                                                src="//www.youtube.com/embed/{{$video['link']}}?showinfo=0"
                                                frameborder="0"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    <div id="{{$video['link']}}"
                                         class="tab-pane embed-responsive embed-responsive-16by9 ">
                                        <iframe width="514" height="300"
                                                src="//www.youtube.com/embed/{{$video['link']}}?showinfo=0"
                                                frameborder="0"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                    </div>
                    <div class="col-sm-2 col-xs-2"> <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-right hidden-xs">
                            <?php $posicao = 1; ?>

                            @foreach($videos as $key => $video)
                                @if($key === 0)
                                    <li class="active">
                                        <a data-toggle="tab" href="{{'#'.$video['link']}}" onclick="logVideo('{{$posicao}}', '{{$video['id']}}');">
                                            <div class="vid-thumb"  id="clickvideo-1">
                                                <div class="vid-box"><span class="ion-eye"></span><img
                                                            class="img-thumbnail"
                                                            src="//img.youtube.com/vi/{{$video['link']}}/{{$key}}.jpg"
                                                            width="150"
                                                            height="50"
                                                            alt=""/>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @else
                                    <li class="">
                                        <a data-toggle="tab" href="{{'#'.$video['link']}}" onclick="logVideo('{{$posicao}}', '{{$video['id']}}');">
                                            <div class="vid-thumb" >
                                                <div class="vid-box"><span class="ion-eye"></span><img
                                                            class="img-thumbnail"
                                                            src="//img.youtube.com/vi/{{$video['link']}}/{{$key}}.jpg"
                                                            width="150"
                                                            height="50"
                                                            alt=""/>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                                <?php $posicao += 1;?>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <hr>
            </div>
        @endif
        <!--Recent videos end-->
    </div>

    <div class="container ">
        <div class="row  ">
            <div class="col-md-16 col-sm-16 ">
                <div class="row page-header">
                    <div class="col-md-8 col-sm-8  business wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                        <div class="main-title-outer pull-left">
                            <div class="main-title">Entre em contato</div>
                        </div>
                        <div class="row">
                            <hr>
                            <!-- Formulario -->
                            <div class="panel-body">
                                {{ Form::open(array('method'=> 'post' ,'class' => 'form-horizontal', 'id' => 'form_ge')) }}

                                {{Form::hidden('guia_empresa_id', $anuncio['guia_empresa_id'])}}

                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                                        <label class="col-md-3 control-label" for="name">* Nome</label>

                                        <div class="col-md-13">
                                            {{ Form::text('nome', Input::old('nome'), array('id' => 'form_ge-nome', 'placeholder' => 'Nome', 'class' => 'form-control input-md','required')) }}
                                            <div class="col-md-13" id="form_ge-nome-errors"></div>
                                        </div>
                                    </div>
                                    <!-- Email input-->
                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label class="col-md-3 control-label" for="email">* E-mail</label>

                                        <div class="col-md-13">
                                            {{Form::text('email', Input::old('email'),array('class' => 'form-control','placeholder'=>'Seu email','required', 'id' => 'form_ge-email'))}}
                                            <div class="col-md-13" id="form_ge-email-errors"></div>
                                        </div>
                                    </div>
                                    <!-- telefone input-->
                                    <div class="form-group {{ $errors->first('telefone', 'has-error') }}">
                                        <label class="col-md-3 control-label" for="telefone">Telefone</label>

                                        <div class="col-md-13">
                                            {{Form::text('telefone', Input::old('telefone'),array('class' => 'form-control','placeholder'=>'Telefone para contato (Opcional)','required', 'maxlength' => '15','id'=>'phone'))}}
                                            <div class="col-md-13" id="form_ge-telefone-errors"></div>
                                        </div>
                                    </div>
                                    <!-- assunto input-->
                                    <div class="form-group {{ $errors->first('assunto', 'has-error') }}">
                                        <label class="col-md-3 control-label" for="email">* Assunto</label>

                                        <div class="col-md-13">
                                            {{Form::text('assunto', Input::old('assunto'),array('class' => 'form-control','placeholder'=>'Seu assunto','required', 'id' => 'form_ge-assunto'))}}
                                            <div class="col-md-13" id="form_ge-assunto-errors"></div>
                                        </div>
                                    </div>
                                    <!-- Message body -->
                                    <div class="form-group {{ $errors->first('mensagem', 'has-error') }}">
                                        <label class="col-md-3 control-label" for="message">* Mensagem</label>

                                        <div class="col-md-13">
                                            {{Form::textarea('mensagem', Input::old('mensagem'),array('class' => 'form-control','placeholder'=>'Por favor digite sua mensagem...','required', 'id' => 'form_ge-mensagem'))}}
                                            {{Form::hidden('logado', 'está logado?')}}
                                            <div class="col-md-13" id="form_ge-logado-errors"></div>
                                            <div class="col-md-13" id="form_ge-mensagem-errors"></div>
                                        </div>

                                    </div>
                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-14 text-right col-md-offset-2">
                                            <div class="row ">
                                                <p class="col-md-14">
                                                    Uma cópia desta mensagem será enviada ao e-mail informado.
                                                </p>
                                            </div>
                                            <div class="row col-md-offset-4 ">

                                                <div class="row col-sm-3 col-xs-2 col-sm-push-11 col-xs-push-11">
                                                    <div id="circularG" class="loading">
                                                        <div id="circularG_1" class="circularG">
                                                        </div>
                                                        <div id="circularG_2" class="circularG">
                                                        </div>
                                                        <div id="circularG_3" class="circularG">
                                                        </div>
                                                        <div id="circularG_4" class="circularG">
                                                        </div>
                                                        <div id="circularG_5" class="circularG">
                                                        </div>
                                                        <div id="circularG_6" class="circularG">
                                                        </div>
                                                        <div id="circularG_7" class="circularG">
                                                        </div>
                                                        <div id="circularG_8" class="circularG">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="btn btn-primary" id="manualTrigger">Enviar</p>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @if($anuncio["st_google_maps"] == 1)
                            <div class="col-sm-8 business left-bordered wow fadeInDown animated" data-wow-delay="1s"
                                 data-wow-offset="50">

                                <div class="main-title-outer pull-left">
                                    <div class="main-title">Localização</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-16 col-sm-16 col-xs-16 ">
                                        <div id="gmap-types" style="height: 420px !important;"></div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- conteudo END -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('portal/js/jquery.confirm-master/jquery.confirm.js') }}"></script>

    <script>
        $(window).load(function () {

            @if(Sentry::check())

                $("#form_ge-nome").val(localStorage.getItem('nome'));
                $("#form_ge-email").val(localStorage.getItem('email'));
                $("#phone").val(localStorage.getItem('phone'));
                $("#form_ge-assunto").val(localStorage.getItem('assunto'));
                $("#form_ge-mensagem").val(localStorage.getItem('mensagem'));

            @else

                $("#form_ge-nome").val(localStorage.getItem('nome'));
                $("#form_ge-email").val(localStorage.getItem('email'));
                $("#phone").val(localStorage.getItem('phone'));
                localStorage.removeItem('assunto');
                localStorage.removeItem('mensagem');
                document.getElementById("form_ge-mensagem").value = "";
                document.getElementById("form_ge-assunto").value = "";

            @endif

            setTimeout(function () {
                localStorage.clear();
            }, 300000);

        });

        $("#manualTrigger").click(function () {

            if (!$("#form_ge-nome").val()) {
                $("#form_ge-nome").focus();
                return false;
            }
            if (!$("#form_ge-email").val()) {
                $("#form_ge-email").focus();
                return false;
            }
            if (!$("#form_ge-assunto").val()) {
                $("#form_ge-assunto").focus();
                return false;
            }
            if (!$("#form_ge-mensagem").val()) {
                $("#form_ge-mensagem").focus();
                return false;
            }

            localStorage.setItem('nome',$("#form_ge-nome").val());
            localStorage.setItem('email',$("#form_ge-email").val());
            localStorage.setItem('phone',$("#phone").val());
            localStorage.setItem('assunto',$("#form_ge-assunto").val());
            localStorage.setItem('mensagem',$("#form_ge-mensagem").val());

            @if(Sentry::check())

            var login = true;
                    @else
              var login = false;

            @endif

            if (login == false) {
                $.confirm({
                    text:
                    "<p>Ainda não é cadastrado?  <a href='{{Route('cadastro-guia')}}' target='_blank'>Clique aqui</a> e cadastre-se!</p>",
                    title: "Atenção",
                    confirm: function (button) {
                        enviar();
                    },
                    cancel: function (button) {
                        jQuery.magnificPopup.open({
                            items: {src: '#log-in'}, type: 'inline'
                        }, 0);
                    },
                    confirmButton: "Enviar Contato",
                    cancelButton: "Login",
                    post: true,
                    confirmButtonClass: "btn-default",
                    cancelButtonClass: "btn-danger",
                    dialogClass: "modal-dialog modal-md"
                });
            }
            else {
                enviar();
            }

            function enviar() {

                $(".loading").show();
                var formDetails = $('#form_ge');
                $.ajax({
                    url: "{{Route("guia-de-empresas-form-contato")}}",
                    type: 'post',
                    cache: false,
                    //dataType: 'json',
                    data: formDetails.serialize(),
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val() // pegar o token do formulario
                    },

                    beforeSend: function () {
                        $("#form_ge-nome-errors").empty();
                        $("#form_ge-email-errors").empty();
                        $("#form_ge-telefone-errors").empty();
                        $("#form_ge-assunto-errors").empty();
                        $("#form_ge-mensagem-errors").empty();
                    },
                    success: function (data) {

                        if (data.success == true) {

                            $("#notification").append('<div class="alert alert-success"><strong>' + data['message'] + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><div>');

                            $("#form_ge-nome").val(null);
                            $("#form_ge-email").val(null);
                            $("#phone").val(null);
                            $("#form_ge-assunto").val(null);
                            $("#form_ge-mensagem").val(null);
                            $("html, body").animate({scrollTop: 0}, "slow");
                            $(".loading").hide();
                            localStorage.removeItem('assunto');
                            localStorage.removeItem('mensagem');
                            document.getElementById("form_ge-mensagem").value = "";
                            document.getElementById("form_ge-assunto").value = "";

                        } else if (data.success == false) {
                            $(".loading").slideToggle().hide();
                            var arr = data.errors;
                            $.each(arr, function (index, value) {
                                if (value.length != 0) {

                                    $("#form_ge-" + index + "-errors").append('<div class="alert-register alert-error"><strong style="font-size: xx-small;color: #ff0000">' + value + '</strong><div>');
                                    $("#form_ge-" + index + "-errors").slideDown();
                                }
                            });
                        }
                    },
                    error: function (xhr, textStatus, thrownError) {
                        alert("Erro");
                    }
                });
            }
        });
    </script>

    <script>
        // Zoom nas imagens do guia de empresas
        $('.owl-carousel').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">A imagem #%curr%</a> não pôde ser carregada.',
                titleSrc: function (item) {
                    return item.el.attr('title') + '<small>iSonhei.com.br</small>';
                }
            }
        });
    </script>

    @if($anuncio["st_google_maps"] == 1)

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/gmaps.min.js') }}"></script>
        <script>

            map = new GMaps({
                div: '#gmap-types',
                lat: -23.4613178,
                lng: -46.6174585,
                zoom: 15

            });

            var endereco = '{{$anuncio["nm_endereco"].','.$anuncio["nu_numero"].','.$anuncio["nm_bairro"].','.$anuncio["nm_cidade"].','.$anuncio["nm_uf"]}}';

                GMaps.geocode({

                address: endereco,
                callback: function (results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        </script>

    @endif

    <script>

        $("#clickendereco").click(function(){
            $.get( "/metrica/guia-de-empresas-endereco/" + '{{ $anuncio["id"] }}' , function(data){
                $('#endereco').html( data );
                $('#clickendereco').hide();

                var tipoid = 2;
                logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);
            });
        });

        $("#clicktelefone").click(function(){
            $.get( "/metrica/guia-de-empresas-telefone/" + '{{ $anuncio["id"] }}' , function(data){
                $('#telefone').html( data );
                $('#clicktelefone').hide();

                var tipoid = 3;
                logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);
            });
        });

        $("#clicksite").click(function(){
            var tipoid = 4;
            logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);

            window.open("{{$anuncio["nm_site"] }}",'_blank');
        });

        $("#clickfacebook").click(function(){
            var tipoid = 13;
            logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);

            window.open("{{$anuncio["nm_link_facebook"] }}",'_blank');
        });

        $("#clickinstagram").click(function(){
            var tipoid = 14;
            logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);

            window.open("{{$anuncio["nm_link_instagram"] }}",'_blank');
        });

        $("#clicktwitter").click(function(){
            var tipoid = 15;
            logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid);

            window.open("{{$anuncio["nm_link_twitter"] }}",'_blank');
        });

        function logVideo(posicao, chave) {

            var tipoid = 9;
            logClickAnuncio( '{{$anuncio["guia_empresa_id"] }}', tipoid, posicao, chave);
        }

        function clickFoto(anuncio_id, chave, posicao){

            var tipoid = 16;
            logClickAnuncio( anuncio_id, tipoid, posicao, chave);
        }

        function logClickAnuncio(anuncioid, tipoid, posicao, chave) {

            var paginaid = 2;

            if(!posicao) {
                var posicao = 0;
            }
            if(!chave) {
                var chave    = 0;
            }

            $.get( "/metrica/guia-de-empresas-metrica/" + anuncioid + "/" + paginaid + "/" + tipoid + "/" + posicao + "/" + chave    , function(data){});
        }

    </script>

@stop

