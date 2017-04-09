{{--
  --------------------------Notas-----------------------
  File::exists(verificar se a imagem selecionada existe)
  Caso ela não existir será carregado uma imagem padrão
  ------------------------------------------------------
--}}

<div class="row">
    <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
        @if(isset($bloco_e))
            {{--{{var_dump($bloco_e)}}--}}
            <div class="main-title-outer pull-left">
                <a href="{{Route("conteudo-categoria-pai", array("debutante"))}}"><div class="main-title label_debutante">{{(isset($bloco_e[0])?$bloco_e[0]['nome']:'')}}</div></a>
            </div>
            <div class="row">
                <div class="topic col-sm-16 bloco-text">
                    @if (isset($bloco_e[0]))
                        @if($bloco_e[0]["ordem"] == 0)
                            <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_e[0]['url']}}">
                                @if(File::exists(public_path().$bloco_e[0]["path_img"].$bloco_e[0]['conteudo_id'].'/'.'365x220_'.$bloco_e[0]['nome_img']))
                                    {{HTML::image($bloco_e[0]["path_img"].$bloco_e[0]['conteudo_id'].'/'.'365x220_'.$bloco_e[0]['nome_img'],$bloco_e[0]['titulo'],array('class'=>'img-thumbnail img-responsive match-height','width'=>'375','height'=>'164'))}}
                                @else
                                    {{HTML::image($bloco_e[0]["path_img"].$bloco_e[0]['conteudo_id'].'/'.$bloco_e[0]['nome_img'],$bloco_e[0]['titulo'],array('class'=>'pull-left','width'=>'375','height'=>'164'))}}
                                @endif
                            </a>
                            <a href="{{Route('portal') . "/" .$bloco_e[0]['url']}}">
                                <h3 class="bloco-title">{{$bloco_e[0]['titulo']}}</h3>
                            </a>
                            {{--<p>{{$bloco_e[0]['introducao']}} </p>--}}
                        @endif
                    @endif
                </div>
                <div class="col-sm-16 bloco-space">
                    <ul class="list-unstyled  top-bordered ex-top-padding">
                        <li>
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    @if(isset($bloco_e[1]))
                                        @if($bloco_e[1]["ordem"] == 1)
                                            <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_e[1]['url']}}">
                                                @if(File::exists(public_path().$bloco_e[1]["path_img"].$bloco_e[1]['conteudo_id'].'/'.'132x79_'.$bloco_e[1]['nome_img']))
                                                    {{HTML::image($bloco_e[1]["path_img"].$bloco_e[1]['conteudo_id'].'/'.'132x79_'.$bloco_e[1]['nome_img'],$bloco_e[1]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                                @else
                                                    {{--caso a imagem não existir será carregado a imagem padrão--}}
                                                    {{HTML::image($bloco_e[1]["path_img"].$bloco_e[1]['conteudo_id'].'/'.$bloco_e[1]['nome_img'],$bloco_e[1]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                                @endif
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-lg-13 col-md-12">
                                    @if(isset($bloco_e[1]))
                                        @if($bloco_e[1]["ordem"] == 1)
                                            <a href="{{Route('portal') . "/" .$bloco_e[1]['url']}}">
                                                <p style="margin-left: 30px !important;"><b>{{$bloco_e[1]['titulo']}}</b></p>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    @if(isset($bloco_e[2]))
                                        @if($bloco_e[2]["ordem"] == 2)
                                            <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_e[2]['url']}}">
                                                @if(File::exists(public_path().$bloco_e[2]["path_img"].$bloco_e[2]['conteudo_id'].'/'.'132x79_'.$bloco_e[2]['nome_img']))
                                                    {{HTML::image($bloco_e[2]["path_img"].$bloco_e[2]['conteudo_id'].'/'.'132x79_'.$bloco_e[2]['nome_img'],$bloco_e[2]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                                @else
                                                    {{--caso a imagem não existir será carregado a imagem padrão--}}
                                                    {{HTML::image($bloco_e[2]["path_img"].$bloco_e[2]['conteudo_id'].'/'.$bloco_e[2]['nome_img'],$bloco_e[2]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                                @endif
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-lg-13 col-md-12">
                                    @if(isset($bloco_e[2]))
                                        @if($bloco_e[2]["ordem"] == 2)
                                            <a href="{{Route('portal') . "/" .$bloco_e[2]['url']}}">
                                                <p style="margin-left: 30px !important;"><b>{{$bloco_e[2]['titulo']}}</b></p>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
    @include('elements.home.bloco-1x2d')
</div>