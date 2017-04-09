{{--
  --------------------------Notas-----------------------
  File::exists(verificar se a imagem selecionada existe)
  Caso ela não existir será carregado uma imagem padrão
  ------------------------------------------------------
--}}

<div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
    @if(isset($bloco_d))
        <div class="main-title-outer pull-left">
            <a href="{{Route("conteudo-categoria-pai", array("infantil"))}}"><div class="main-title label_infantil">{{$bloco_d[0]['nome']}}</div></a>
        </div>
        <div class="row left-bordered">
            <div class="topic col-sm-16 bloco-text">

                @if($bloco_d[0]["ordem"] == 0)
                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_d[0]['url']}}">
                        @if(File::exists(public_path().$bloco_d[0]["path_img"].$bloco_d[0]['conteudo_id'].'/'.'365x220_'.$bloco_d[0]['nome_img']))
                            {{HTML::image($bloco_d[0]["path_img"].$bloco_d[0]['conteudo_id'].'/'.'365x220_'.$bloco_d[0]['nome_img'],$bloco_d[0]['titulo'],array('class'=>'img-thumbnail img-responsive match-height','width'=>'375','height'=>'164'))}}
                        @else
                            {{HTML::image($bloco_d[0]["path_img"].$bloco_d[0]['conteudo_id'].'/'.$bloco_d[0]['nome_img'],$bloco_d[0]['titulo'],array('class'=>'pull-left','width'=>'375','height'=>'164'))}}
                        @endif
                    </a>
                    <a href="{{Route('portal') . "/" .$bloco_d[0]['url']}}">
                        <h3 class="bloco-title">{{$bloco_d[0]['titulo']}}</h3>
                    </a>
                    {{--<p>{{$bloco_d[0]['introducao']}} </p>--}}
                @endif

            </div>
            <div class="col-sm-16 bloco-space">
                <ul class="list-unstyled top-bordered ex-top-padding">
                    <li>
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                @if($bloco_d[1]["ordem"] == 1)
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_d[1]['url']}}">
                                        {{--verificar se a imagem existe no diretorio--}}
                                        @if(File::exists(public_path().$bloco_d[1]["path_img"].$bloco_d[1]['conteudo_id'].'/'.'132x79_'.$bloco_d[1]['nome_img']))
                                            {{HTML::image($bloco_d[1]["path_img"].$bloco_d[1]['conteudo_id'].'/'.'132x79_'.$bloco_d[1]['nome_img'],$bloco_d[1]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                        @else
                                            {{--caso a imagem não existir será carregado a imagem padrão--}}
                                            {{HTML::image($bloco_d[1]["path_img"].$bloco_d[1]['conteudo_id'].'/'.$bloco_d[1]['nome_img'],$bloco_d[1]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                        @endif
                                    </a>
                                @endif
                            </div>
                            <div class="col-lg-13 col-md-12">
                                @if($bloco_d[1]["ordem"] == 1)
                                    <a href="{{Route('portal') . "/" .$bloco_d[1]['url']}}">
                                        <p style="margin-left: 30px !important;"><b>{{$bloco_d[1]['titulo']}}</b></p>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                @if($bloco_d[2]["ordem"] == 2)
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco_d[2]['url']}}">
                                        @if(File::exists(public_path().$bloco_d[2]["path_img"].$bloco_d[2]['conteudo_id'].'/'.'132x79_'.$bloco_d[2]['nome_img']))
                                            {{HTML::image($bloco_d[2]["path_img"].$bloco_d[2]['conteudo_id'].'/'.'132x79_'.$bloco_d[2]['nome_img'],$bloco_d[2]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                        @else
                                            {{--caso a imagem não existir será carregado a imagem padrão--}}
                                            {{HTML::image($bloco_d[2]["path_img"].$bloco_d[2]['conteudo_id'].'/'.$bloco_d[2]['nome_img'],$bloco_d[2]['titulo'],array('class'=>'pull-left','width'=>'90','height'=>'54'))}}
                                        @endif
                                    </a>
                                @endif
                            </div>
                            <div class="col-lg-13 col-md-12">
                                @if($bloco_d[2]["ordem"] == 2)
                                    <a href="{{Route('portal') . "/" .$bloco_d[2]['url']}}">
                                        <p style="margin-left: 30px !important;"><b>{{$bloco_d[2]['titulo']}}</b></p>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>