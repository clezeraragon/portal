
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

                            <div class="painel_dados_usuario">

                                <p><h4>{{Sentry::getUser()->first_name}} {{Sentry::getUser()->last_name}}</h4></p>

                                <p>{{\Util::formataDataCadastro(Sentry::getUser()->created_at)}}</p>

                            </div>

                            @if(UsuarioCampanhas::usuarioParticipou(Sentry::getUser()->id, 1))

                                <div class="col-md-16 painel_home_fid_box" style="background: blue;">
                                    <span class="painel_home_fid_box_titulo">
                                        <a href="{{Route("download-promo-cupom")}}" style="color:white;">Download do cupom</a>
                                    </span>
                                </div>

                            @elseif(Sentry::getUser()->utm_campaign == "condominio" || Session::get('promocao') == "condominio")

                                <div class="col-md-16 painel_home_fid_box" style="background: green;">
                                    <span class="painel_home_fid_box_titulo" >
                                        <a href="{{Route("promo-enquete")}}" style="color:white;">Clique aqui para responder a enquete e fazer o download do cupom</a>
                                    </span>
                                </div>

                            @endif

                            {{--<div class="col-md-16 painel_home_fid_box painel_home_fid_box_indicacao">--}}
                                {{--<p>Este é o seu link de indicação:</p>--}}
                                {{--<p class="link_indicacao"><strong>{{$link_fidelidade}}</strong></p>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-16 painel_home_fid_box">--}}
                                {{--<span class="painel_home_fid_box_titulo">--}}
                                    {{--Seus Pontos do iSonhei Club--}}
                                {{--</span>--}}
                                {{--<br>--}}
                                {{--<span class="painel_home_fid_box_pontos">--}}
                                    {{--<strong>{{ \Util::number($pontos, 0) }}</strong>--}}
                                {{--</span>--}}
                            {{--</div>--}}

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

