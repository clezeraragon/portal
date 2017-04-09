@extends('sonhador/basico/layout')

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('sonhador/layout/'.$data['path_layout'].'/css/blueimp-gallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sonhador/layout/'.$data['path_layout'].'/css/bootstrap-image-gallery.min.css') }}">
    {{HTML::style("/sonhador/layout/basico/css/magnific-popup.css")}}
    <!-- ionicons font -->
    {{HTML::style("portal/css/ionicons.min.css")}}
    <!-- magnific popup styles -->
    {{HTML::style("/sonhador/layout/basico/css/magnific-popup.css")}}

@stop

{{-- Page content --}}
@section('conteudo')

    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Anterior
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Próxima
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="row" id="1">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{$data['titulo2']}}
                @if($canEdit)
                    <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulo2" class="label label-primary editar">Editar Título</a>
                @endif
            </h1>
        </div>
        <div class="col-lg-12">
            {{$data['texto2']}}
            @if($canEdit)
                <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#texto2" class="label label-primary editar">Editar Texto</a>
            @endif
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <hr>
    </div>

    <!--  -->
    <div class="row" id="2">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{$data['titulo3']}}
                @if($canEdit)
                    <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulo3" class="label label-primary editar">Editar Título</a>
                @endif
            </h1>
        </div>
    </div>
    <div class="row">
        <div id="links">
            @if($fotos)
                @foreach($fotos as $foto)
                    <div class="album-box">
                        <div class="album-box-interno">
                            <div class="album-box-interno-img">
                                <a href="{{ asset($foto->path_img)}}" title="{{$foto->titulo}}" data-gallery rel="nofollow">
                                    <img class="album-box-interno-img" src="{{ asset($foto->path_img)}}" alt="{{$foto->titulo}}">
                                </a>
                            </div>
                            <div class="album-item-titulo">
                                {{$foto->titulo}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>

    <div class="row">
        @if($canEdit)
            <br>
            <a rel="nofollow" href="/site-sonhador/construtor/fotos/{{$data['id']}}/create" class="label label-primary editar">Adicionar Foto</a>
            <a rel="nofollow" href="/site-sonhador/construtor/fotos/{{$data['id']}}/" class="label label-primary editar">Editar Foto</a>
        @endif
    </div>
    <!-- /.row -->

    <div class="row">
        <hr>
    </div>

    @if(($canEdit) || ($canEdit == false && $cotas->count()))

        <div class="row" id="3">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{$data['titulo4']}}
                    @if($canEdit)
                        <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulo4" class="label label-primary editar">Editar Título</a>
                    @endif
                </h1>
            </div>
        </div>

        <div class="row">

            @foreach($cotas as $cota)

                <div class="presente-box">
                    <div class="presente-box-interno">
                        <div class="presente-box-interno-img">
                            <img class="presente-box-interno-img" alt="{{$cota->produto}}" src="{{ asset($cota->path_img)}}" >
                        </div>
                        <div  class="presente-titulo">
                            {{$cota->produto}}
                        </div>

                        <div class="presente-info">
                            Quantidade disponível: {{($cota->qtd_cota - SiteCotaPedido::getQuantidadeTotalVendido($cota->id))}} de {{$cota->qtd_cota}}
                            <br>
                            Valor unitário: R$ {{ Util::number($cota->vl_unit, 2) }}
                        </div>

                        <div  class="presente-botao">
                            <a href="/sonhador/confirmar-pedido-cota/{{$cota->id}}" class="btn btn-primary btn-lg">Comprar</a>
                            {{--<button type="button" class="btn btn-primary btn-lg">Oferecer</button>--}}
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="row">
            @if($canEdit)
                <br>
                <a rel="nofollow" href="/site-sonhador/construtor/cotas/{{$data['id']}}/create" class="label label-primary editar">Adicionar Cota</a>
                <a rel="nofollow" href="/site-sonhador/construtor/cotas/{{$data['id']}}/" class="label label-primary editar">Editar Cota</a>
            @endif
        </div>
        <br>

        <div class="row">
            <hr>
        </div>
    @endif

    <!--  -->
    <div class="row" id="4">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{$data['titulo5']}}
                @if($canEdit)
                    <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulo5" class="label label-primary editar">Editar Título</a>
                @endif
            </h1>
        </div>

        <div class="col-lg-12">
            {{$data['texto5']}}
            @if($canEdit)
                <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#texto5" class="label label-primary editar">Editar Texto </a>
            @endif
            <br /><br />
        </div>

        <div class="col-lg-12">

            {{--<div class="col-lg-2"></div>--}}
            <div class="col-lg-12 box-form-recado">
                {{ Form::open(array('url' => "site-sonhador/construtor/recado/" . $data['id'] , 'method' => 'post',  'class' => 'form-horizontal')) }}

                <!-- Text input-->
                <div class="form-group {{ $errors->first('nome', 'has-error') }}">
                    {{ Form::label('nome', '* Nome', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Informe seu nome','class' => 'form-control input-md', 'required')) }}
                        {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group {{ $errors->first('assunto', 'has-error') }}">
                    {{ Form::label('assunto', '* Assunto', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::text('assunto', Input::old('assunto'), array('placeholder' => 'Informe o assunto','class' => 'form-control input-md', 'required')) }}
                        {{ $errors->first('assunto', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group {{ $errors->first('recado', 'has-error') }}">
                    {{ Form::label('recado', '* Recado', array('class' => 'col-md-3 control-label')) }}
                    <div class="col-md-6">
                        {{ Form::textarea('recado', Input::old('recado'), array('placeholder' => 'Deixe seu recado', 'class' => 'form-control', 'required', 'size' => '30x4')) }}
                        {{ $errors->first('recado', '<span class="text-danger">:message</span>') }}
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="cadastrar"></label>
                    <div class="col-md-6" align="right">
                        {{ Form::submit('Publicar', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
            {{--<div class="col-lg-2"></div>--}}
        </div>
    </div>
    <!-- /.row -->
    <br>

    <div class="row">
        @foreach($recados as $recado)
            @if($canEdit)

                @if($recado->status == 0)
                    {{ Form::open(array('url' => "/site-sonhador/construtor/recado/" . $data['id'] . '/' . $recado->id, 'method' => 'put')) }}
                    {{ Form::button('Aprovar Mensagem', array('type' => 'submit', 'class' => 'label label-success editar', 'title' => 'Apagar Aprovar')) }}
                    {{ Form::close() }}
                @endif

                {{ Form::open(array('url' => "/site-sonhador/construtor/recado/" . $data['id'] . '/' . $recado->id, 'method' => 'delete')) }}
                {{ Form::button('Apagar Mensagem', array('type' => 'submit', 'class' => 'label label-danger editar', 'title' => 'Apagar Mensagem')) }}
                {{ Form::close() }}

            @endif
            @if($canEdit || $recado->status == 1)
                <div class="col-lg-12">
                    <h3>{{$recado->assunto}}</h3>
                    <h4>De: {{$recado->nome}} - {{Util::toView($recado->created_at)}}</h4>
                    <p>
                        {{$recado->recado}}
                    </p>
                </div>
                <hr>
            @endif
        @endforeach
    </div>

    <div class="row">
        <hr>
    </div>

    <!--  -->
    <div class="row" id="5">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{$data['titulo6']}}
                @if($canEdit)
                    <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulo6" class="label label-primary editar">Editar Título</a>
                @endif
            </h1>
        </div>
        <div class="col-lg-12">
            {{$data['texto6']}}
            @if($canEdit)
                <br><a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#texto6" class="label label-primary editar">Editar Texto</a>
            @endif
            <br /><br />
        </div>
        <div class="col-lg-12">
            @if(($data['endereco']))
                <div id="gmap-types" style="height: 420px !important;"></div>
            @endif
        </div>
    </div>
    <!-- /.row -->
    <div class="container">
    <div class="col-sm-16 col-xs-16" style="top: 10px;">
        <div class="form-group">
            <div class="col-sm-4 col-sm-push-6  col-md-2 col-md-push-7 " style="top: 20px;">

                @include('elements.share-facebook')
            </div>
            <div class="col-sm-5 col-sm-push-4 col-md-4 col-md-push-7 celular" style="top: 3px;">
                @include('elements.formulario-compartilhe')
            </div>
        </div>
    </div>
    </div>
    <hr>
@stop

@section('footer_scripts')
    <script src="{{ asset('sonhador/layout/basico/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('sonhador/layout/'.$data['path_layout'].'/js/blueimp-gallery.min.js') }}"></script>
    <script src="{{ asset('sonhador/layout/'.$data['path_layout'].'/js/bootstrap-image-gallery.min.js') }}"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/gmaps.min.js') }}"></script>


    <script language="JavaScript">
    $('.open-popup-link').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#email'
    });

</script>
    <script>

        map = new GMaps({
            div: '#gmap-types',
            lat: -23.587416,
            lng: -46.657634,
            zoom: 15
        });

        GMaps.geocode({
            address: '{{$data['endereco']}}, {{$data['numero']}}, {{$data['cidade']}} ',
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

@stop
