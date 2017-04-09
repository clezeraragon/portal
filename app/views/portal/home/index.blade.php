@extends('portal/layouts/default')
{{-- Page title --}}
@section('title')iSonhei - O portal para quem quer realizar sonhos!@stop

@section('description')O iSonhei te ajuda a realizar seus sonhos, através de ferramentas, promoções e campanhas exclusivas.@stop

@section('keywords')portal,isonhei,realizar,sonhos,promoções,campanhas @stop

{{-- page level styles --}}
@section('header_styles')
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('/assets/img/logo-isonhei-facebook_1200x630.png')}}"/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@stop

{{-- Page content --}}
@section('conteudo')

    <!-- topo home start -->
    <div class="container">

        @include('notifications')
        <div id="notification"></div>
        {{--<div class="row">--}}
        {{--<!-- hot news start -->--}}

        {{--<!-- hot news end -->--}}

        {{--<!-- banner outer start -->--}}
        {{--<div class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">--}}
        {{--<div class="row">--}}
        {{--<div class="col-sm-16 col-md-10 col-lg-8">--}}

        {{--<!-- carousel start -->--}}

        {{--@include('elements.home.carrossel')--}}



        {{--</div>--}}
        {{--<div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-16 col-lg-10">--}}
        {{--@include('elements.home.noticia-destaque')--}}
        {{--</div>--}}
        {{--@include('elements.home.banners-dinamico.banner-destaque-dinamico')--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- banner outer end -->--}}

        {{--</div>--}}
    </div>
    <!-- topo home end -->

    <!-- corpo home start -->
    <div class="container ">
        <div class="row">

            <!-- slider outer start -->
            <div class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
                @include('elements.home.slider.slider')
            </div>
            <!-- slider outer end -->

        </div>
        <!-- lista de quadrados start -->
        <div class="row ">
            <br>
            {{--@include('elements.home.lista-box')--}}
        </div>
        <!-- lista de quadrados end -->

        <div class="row">

            <!-- left sec start -->
            <div class="col-md-11 col-sm-11">
                <div class="row">

                    <!-- linha 1 (casamento | Debutante) start -->
                    <div class="col-sm-16 business wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                        @include('elements.home.bloco-superior.bloco-superior-1x2e')
                        <hr>
                    </div>
                    <!-- linha 1 end -->

                    <!-- linha 2 (Debutante | Infantil) start -->
                    <div class="col-sm-16">
                        @include('elements.home.bloco-1x2e')
                        <hr>
                    </div>
                    <!-- linha 2 end -->

                    <!-- linha 3 (horizontal) start-->
                    <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
                        @include('elements.home.mini-carrossel-3p')
                        {{--<hr>--}}
                    </div>
                    <!-- linha 3 end -->

                    <!--Recent videos start-->
                    {{--<div class="col-sm-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s"--}}
                         {{--data-wow-offset="50">--}}
                        {{--@include('elements.home.bloco-video-3p')--}}
                        {{--<hr>--}}
                    {{--</div>--}}
                    <!--Recent videos end-->

                </div>
            </div>
            <!-- left sec end -->

            <!-- right sec start -->
            @include('elements.home.banners-dinamico.bannersLateralDireito')
            <!-- right sec end -->
        </div>
    </div>
    <!-- corpo home end -->

@stop
