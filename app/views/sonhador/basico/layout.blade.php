<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$data['titulo_site']}}">
    <meta name="author" content="">

    <title>{{$data['titulo_site']}} | iSonhei</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('sonhador/layout/'.$data['path_layout'].'/css/bootstrap.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('/portal/css/bootstrap.min.css') }}" rel="stylesheet">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <!-- Custom CSS -->
    <link href="{{ asset('sonhador/layout/'.$data['path_layout'].'/css/custom.css') }}" rel="stylesheet">

    <style>
        body{
            background: {{'#'.$data['cor_fundo']}};
        }
        .imagem-topo{
            background-image: url("{{ asset($data['path_img_topo']) }}");
            min-height: 300px;
            background-size: cover;
            background-position: center;
        }
    </style>
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset(isset($data['path_img_topo'])?$data['path_img_topo']:'')}}"/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="650">
    @yield('header_styles')

</head>

<body>

{{--Google Analytics--}}
@include('portal.layouts.google_analytics')

@if($canEdit)
        <a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#corfundo" class="label label-primary editar trocar-cor-fundo">Trocar cor de fundo</a>
@endif

<div class="header">
    <div class="container header-container imagem-topo">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="titulo_site">
                    {{$data['titulo_site']}}
                </h1>
                @if($canEdit)
                    <br>
                    <div style="margin-bottom: 10px;">
                        <a rel="nofollow" href="/site-sonhador/construtor/{{$data['id']}}#titulosite" class="label label-primary editar">Editar Título</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="container container-box">

    <!-- Navigation -->
    <div class="row">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation"><a href="/sonhador/{{$data['id']}}">Home</a></li>
            <li role="presentation"><a href="/sonhador/{{$data['id']}}#1">{{$data['titulo2']}}</a></li>
            <li role="presentation"><a href="/sonhador/{{$data['id']}}#2">{{$data['titulo3']}}</a></li>
            <li role="presentation"><a href="/sonhador/{{$data['id']}}#3">{{$data['titulo4']}}</a></li>
            <li role="presentation"><a href="/sonhador/{{$data['id']}}#4">{{$data['titulo5']}}</a></li>
            <li role="presentation"><a href="/sonhador/{{$data['id']}}#5">{{$data['titulo6']}}</a></li>
        </ul>
    </div>

    @yield('conteudo')

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12 footer-copy">
                <a href="{{Route('portal')}}" alt="iSonhei" title="iSonhei"><p> &copy; {{date("Y")}} iSonhei - O portal para quem quer realizar sonhos!</p></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</div>
<!-- /.container -->
<script src="{{ asset('sonhador/layout/'.$data['path_layout'].'/js/jquery-11.min.js') }}"></script>
<link href="{{ asset('sonhador/layout/'.$data['path_layout'].'/js/bootstrap.js') }}" rel="stylesheet">

@yield('footer_scripts')

</body>

</html>