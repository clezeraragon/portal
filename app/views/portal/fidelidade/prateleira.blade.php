
{{-- Page title --}}
@section('title'){{$data['title_seo']}}@stop

@section('description'){{$data['description']}}@stop

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
            <h1>{{$data['title_pag']}} </h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active"><span style="text-transform:lowercase !important;">i</span>Sonhei Store</li>
            </ol>
        </div>
    </div>
    <!-- header End -->
    {{ Form::open(array('url' =>  ""  , 'method' => 'put', 'class' => 'form-horizontal', 'name' => 'frm')) }}
    <div class="row">

        <div class="col-sm-6 col-xs-8 col-md-5 col-lg-4" style="left: 25px">
            <div class="form-group">
                <select class="form-control filtro" id='filtro'>
                    <option value="" selected="selected">Ordenar por</option>
                    <option value="mais-recentes">Mais recentes</option>
                    <option value="menor-pontuacao">Menor pontuação</option>
                    <option value="ordem-alfabetica">Ordem alfabética</option>

                </select>
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon">Ordenar por:</div>--}}
                    {{--{{ Form::select('filtro', [--}}
                       {{--'default' => 'ordenar por',--}}
                       {{--'mais-recentes' => 'Mais recentes',--}}
                       {{--'ordem-alfabetica' => 'Ordem alfabética',--}}
                       {{--'menor-pontuacao' => 'Menor Pontuação'], 'default', array('class' => 'form-control input-xs filtro','id'=>'filtro')) }}--}}
                {{--</div>--}}
                <div class="col-sm-16" id="codigo_fidelidade-errors"></div>
            </div>
        </div>
    </div>
    {{form::close()}}
    <!-- data start -->
    <section>
        <div class="container ">
            <div class="row ">
                <!-- left sec start -->
                <div class="col-md-11 col-sm-11">
                    <div class="row fid_vitrine">
                        @if(count($produtos))
                            {{--{{dd($produtos)}}--}}
                            @foreach($produtos as $produto)
                                {{--{{dd($produto->path_img)}}--}}
                                <div class="fid_vitrine_produto_box">
                                    <div class="fid_vitrine_produto_img" style="background-image: url('{{asset($produto->path_img)}}');">
                                        @if($produto->estoque < 1)
                                            {{HTML::image("/portal/images/fidelidade/esgotado_peq.png",'',array('class'=>'fid_vitrine_produto_esgotado_p'))}}
                                        @endif
                                    </div>
                                    <div class="fid_vitrine_produto_nome">
                                        <strong title="{{ $produto->nome }}">{{ substr($produto->nome,0, 40)}} </strong>
                                    </div>
                                    <div class="fid_vitrine_produto_pontos_de">
                                        @if($produto->de_pontos)
                                            <strike> De <strong>{{ number_format($produto->de_pontos, 0 , '','.') }}</strong> por</strike>
                                        @endif
                                    </div>
                                    <div class="fid_vitrine_produto_pontos_por">
                                        <strong>{{ number_format($produto->por_pontos, 0 , '','.') }}</strong>
                                    </div>
                                    <div class="fid_vitrine_produto_pontos">
                                        <strong>pontos</strong>
                                    </div>
                                    <div class="fid_vitrine_produto_btn">
                                        <a href="/isonhei-club/produto/{{$produto->url}}" class="btn btn-primary1 fid_vitrine_produto_btn_ver">Ver</a>
                                    </div>
                                </div>

                            @endforeach

                        @else
                            <p>Nenhum produto encontrado.</p>
                        @endif
                    </div>
                    <div class="row">
                        {{$produtos->links()}}
                    </div>
                </div>
                <!-- left sec end -->

                <!-- right sec start -->
                @include("elements.menu-lateral.dinamico.banner-dinamico")
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

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script>
        $(window).load(function(){

            $('#filtro option:eq(0)').attr('disabled', 'disabled').css('color', 'grey');

            $(".filtro").find('option').each(function(){
                if ($(this).val() == localStorage.getItem('filtro') )
                    $(this).attr("selected","selected");
                if ('{{Request::is('isonhei-club/loja')}}'){
                    localStorage.clear();
                }

            });
//            setTimeout(function () {
//                localStorage.clear();
//            }, 1000);

        })

        $("#filtro").change(function(){

            var url = $("#filtro").val();
            var pathname = window.location.pathname;
            var pathname = '{{route("isonhei-club-loja")}}' + "/" +  url;
            var teste =  window.location.replace(pathname);

            localStorage.setItem('filtro',url);
        });

    </script>
@stop