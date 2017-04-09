
{{-- Page title --}}
@section('title'){{$produto->nome . " | " . $data['title_seo']}}@stop

@section('description'){{ $produto->descricao}}@stop

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
            <h1>{{ $produto->nome}}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{Route('isonhei-club-loja')}}"> <span style="text-transform:lowercase !important;">i</span>Sonhei Store</a></li>
                <li class="active">{{ $produto->nome }}</li>
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
                    <div class="row fid_produto_box">
                        <div class="col-md-7">

                            <div class="fid_produto_img hidden-xs" style="background-image: url('{{asset($produto["path_img"])}}');">
                                @if($produto->estoque < 1)
                                    {{HTML::image("/portal/images/fidelidade/esgotado_gde.png",'',array('class'=>'fid_vitrine_produto_esgotado_g'))}}
                                @endif
                            </div>

                            <div class="fid_produto_img-sx hidden-md hidden-sm hidden-lg" style="background-image: url('{{asset($produto["path_img"])}}');">
                                @if($produto->estoque < 1)
                                    {{HTML::image("/portal/images/fidelidade/esgotado_peq.png",'',array('class'=>'fid_vitrine_produto_esgotado_g'))}}
                                @endif
                            </div>

                            <div class="fid_produto_dados">
                                <div class="fid_produto_dados_fornec_msg">
                                    Produto oferecido e entregue por <span class="fid_produto_dados_fornec_nome"><strong>{{$produto->fornecedor}}</strong></span>
                                </div>

                                <div class="fid_produto_pontos_de">
                                    @if($produto->de_pontos)
                                        <strike> De <strong>{{ number_format($produto->de_pontos, 0 , '','.') }}</strong> por</strike>
                                    @endif
                                </div>
                                <div class="fid_produto_pontos_por">
                                    <strong>{{ number_format($produto->por_pontos, 0 , '','.') }}</strong>
                                </div>
                                <div class="fid_produto_pontos">
                                    <strong>pontos</strong>
                                </div>
                                <div class="fid_produto_btn">
                                    @if($produto->estoque > 0)
                                        <a rel="nofollow" href="{{Route('get-isonhei-club-resgate', array($produto->url))}}" class="btn fid_produto_btn_ver" data-effect="mfp-zoom-in">RESGATAR</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9 fid_produto_descricao">
                            <div class="fid_produto_nome">
                                <h2>{{ $produto->nome}}</h2>
                            </div>
                            <div class="fid_produto_descricao">
                                <p> {{ $produto->descricao}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left sec end -->

                <!-- right sec start -->
                @include("elements.menu-lateral.dinamico.banner-dinamico-sonhador")
                {{--<div class="col-sm-5 hidden-xs right-sec">--}}
                    {{--<div class="bordered">--}}
                        {{--<div class="row ">--}}
                            {{--<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">--}}
                                {{--<div class="table-responsive">--}}
                                {{--Menu Lateral--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- data end -->
</div>
<!-- conteudo END -->

<div id="resgatar" class="white-popup-login mfp-with-anim mfp-hide">

    <p>Desculpe você ainda não possuí pontuação necessária para trocar por este produto.</p>
    <p>Continue a interagir com o iSonhei para trocar seus pontos por prêmios incríveis.</p>

</div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@if( Session::has('resgatar'))
    <script>
        jQuery(window).load(function () {
            jQuery.magnificPopup.open({
                items: {src: '#resgatar'}, type: 'inline'
            }, 0);
        });
    </script>
@endif

@stop




