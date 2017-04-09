{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

@section('keywords'){{$data['keywords']}}@stop

{{-- page level styles --}}
@section('header_styles')

    {{HTML::style("portal/css/custom.css")}}

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
        {{--{{dd($cupons)}}--}}
        <!-- data start -->
        <section>
            <div class="container ">
                <div class="row ">
                    <!-- left sec start -->
                    <div class="col-md-11 col-sm-11 col-xs-15">
                        @if($cupons)
                            @foreach($cupons as $key => $cupom)
                                {{--{{dd($cupom)}}--}}
                                <div class="row col-lg-16 col-md-16 col-sm-16 wow fadeInDown animated cupom-box"
                                     data-wow-delay="0.5s">
                                    {{--{{var_dump($cupom)}}--}}
                                    <div class="col-lg-5 col-md-6 col-sm-8">
                                        @if($cupom["path_img"])
                                            {{ HTML::image($cupom["path_img"],'',array('class'=>'cupom-box-img img-thumbnail1'))}}
                                        @else
                                            {{ HTML::image($cupom["path_img_cliente"],'',array('class'=>'cupom-box-img img-thumbnail1'))}}
                                        @endif

                                    </div>

                                    <div class="col-lg-11 col-md-10 col-sm-8" >
                                        <h3>{{$cupom["titulo"]}}</h3>

                                        <div class="cupom-box-dados">
                                            <p class="cupom-box-dsc">
                                                {{$cupom["descricao"]}}
                                            </p>

                                            <p class="cupom-box-regras">
                                                <strong>Regras:</strong>
                                                {{$cupom["regras"]}}
                                            </p>

                                            <p>
                                                <strong>Validade até:</strong>
                                                {{\Util::toView($cupom["dt_fim"])}}
                                            </p>



                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-8 col-sm-10 col-lg-8 col-xs-10"
                                                     style="margin-bottom: 20px;">
                                                    @if(Sentry::check())

                                                        <a rel="nofollow" class="btn btn-success btn-cupom "
                                                           href="{{Route("get-cupom" , array($cupom["id"]))}}"
                                                           data-effect="mfp-zoom-in">Clique para pegar o cupom</a>
                                                    @else
                                                        <a rel="nofollow"
                                                           class="btn btn-success btn-cupom open-popup-link"
                                                           href="#log-in" data-effect="mfp-zoom-in">Clique para pegar o
                                                            cupom</a>
                                                    @endif
                                                </div>
                                                @if($cupom["url"])
                                                    <div class="col-md-8 col-sm-10 col-lg-8 col-xs-10">
                                                        <a rel="nofollow" class="btn btn-primary btn-cupom "
                                                           href="{{Route("guia-de-empresas-anuncio" , array($cupom["url"]))}}"
                                                           data-effect="mfp-zoom-in">Sobre a empresa</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endforeach
                        @endif
                        @if(isset($botton))
                            <a rel="nofollow" class="btn btn-primary btn-cupom "
                               href="{{Route("lista-cupons-de-desconto")}}"
                               data-effect="mfp-zoom-in">Cupons de outras empresas</a>
                        @endif
                        <div class="row">
                            {{--{{ $cupons->links() }}--}}
                        </div>
                    </div>
                    <!-- left sec end -->

                    <!-- right sec start -->
                    @include('elements.menu-lateral.dinamico.banner-dinamico')

                </div>
            </div>
        </section>
        <!-- data end -->

        <div id="cupom-modal" class="white-popup-login mfp-with-anim mfp-hide">

            <h2>CUPOM DE DESCONTO</h2>

        </div>

    </div>
    <!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script>
        $('#example').popover(options)
    </script>

    {{--<script>--}}
    {{--$(".cupom").click(function() {--}}

    {{--$.get( "{{Route('get-cupom')}}}" , function(data){--}}

    {{--$('#telefone').html( data );--}}
    {{--$('#clicktelefone').hide();--}}

    {{--var tipoid = 3;--}}

    {{--});--}}


    {{--jQuery.magnificPopup.open({--}}
    {{--items: {src: '#cupom-modal'}, type: 'inline'--}}
    {{--}, 0);--}}

    {{--});--}}
    {{--</script>--}}

@stop