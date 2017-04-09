
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
<div class="container">

    @include('notifications')

    <!-- header Start -->
    <div class="container">
        <div class="page-header">
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('portal') }}">Home</a></li>
                <li><a href="{{ route('portal-painel') }}">Painel</a></li>
                <li class="active">Ranking</li>
            </ol>
        </div>
    </div>
    <!-- header End -->

    <!-- data Start -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4">
                    <div class="bordered">
                        <div class="row ">

                            @include("portal.painel.menu_lateral")

                        </div>
                    </div>
                </div>

                <!-- left sec Start -->
                <div class="col-md-12 col-sm-12">
                    <div class="bordered painel_box_conteudo">
                        <div class="row">
                                <h3>Ranking</h3>

                                <div class="painel_dados_usuario">
                                    <p><h4>{{Sentry::getUser()->first_name}} {{Sentry::getUser()->last_name}}</h4></p>

                                    <p>{{\Util::formataDataCadastro(Sentry::getUser()->created_at)}}</p>

                                </div>
                                <div class="col-md-7 painel_home_fid_box">
                                    <span class="painel_home_fid_box_titulo">
                                        Seus Pontos do iSonhei Club
                                    </span>
                                    <br>
                                    <span class="painel_home_fid_box_pontos">
                                        <strong>{{\Util::number($pontos, 0)}}</strong>
                                        <br>
                                    </span>
                                    <p><span class="painel_home_fid_box_titulo">Nível atual</span></p>
                                    <Center>
                                        <img src="{{asset($nivel_atual->path_img)}}" alt="" class=" text-center img-responsive"/>
                                    </Center>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-7 painel_home_fid_box">
                                    <span class="painel_home_fid_box_titulo">
                                        Pontos para subir de nível
                                    </span>
                                    <br>
                                    <span class="painel_home_fid_box_pontos">
                                        <strong>{{\Util::number($pontos_proximo_nivel, 0)}}</strong>
                                        <br>
                                    </span>
                                    <p><span class="painel_home_fid_box_titulo">Próximo Nível</span></p>
                                    @if($nivel_seguinte)
                                        <Center>
                                            <img src="{{asset($nivel_seguinte->path_img)}}" alt="" class=" text-center img-responsive"/>
                                        </Center>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                <!-- left sec End -->
            </div>
        </div>
    </section>
    <!-- Data End -->
</div>
<!-- conteudo END -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript">

        $(document).ready(function(){
            $("#cpf").inputmask("999.999.999-99");
        });

    </script>

@stop

