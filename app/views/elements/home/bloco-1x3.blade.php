{{--
  --------------------------Notas-----------------------
  File::exists(verificar se a imagem selecionada existe)
  Caso ela não existir será carregado uma imagem padrão
  ------------------------------------------------------
--}}

<div class="main-title-outer pull-left">
    @if(isset($bloco))
        {{--{{var_dump($bloco)}}--}}
        <div class="main-title">{{(isset($bloco[0])?$bloco[0]['nome']:'')}}</div>

</div>
<div class="row">
    <div class="col-md-11 col-sm-16">
        <div class="row">
            @if(isset($bloco[0]))
                <div class="col-md-8 col-sm-9 col-xs-16">

                    @if($bloco[0]["ordem"] == 0)
                        <div class="topic">
                            <a rel="nofollow" href="{{Route('portal') . "/" .$bloco[0]['url']}}">

                                @if(File::exists(public_path().$bloco[0]["path_img"].$bloco[0]['conteudo_id'].'/'.'251x151_'.$bloco[0]['nome_img']))
                                    {{HTML::image($bloco[0]["path_img"].$bloco[0]['conteudo_id'].'/'.'251x151_'.$bloco[0]['nome_img'],$bloco[0]['titulo'],array('class'=>'img-thumbnail match-height','width'=>'600','height'=>'398'))}}
                                @else
                                    {{HTML::image($bloco[0]["path_img"].$bloco[0]['conteudo_id'].'/'.$bloco[0]['nome_img'],$bloco[0]['titulo'],array('class'=>'img-thumbnail match-height','width'=>'600','height'=>'398'))}}
                                @endif

                            </a>
                            <a href="{{Route('portal') . "/" .$bloco[0]['url']}}">
                                <h3>{{$bloco[0]['titulo']}}</h3>
                            </a>


                            <p>{{$bloco[0]['introducao']}}</p>
                        </div>
                    @endif
                </div>
            @endif
            <div class="col-md-8 col-sm-7 col-xs-16">
                <ul class="list-unstyled">

                    @if(isset($bloco[1]))
                        @if($bloco[1]["ordem"] == 1)
                            <li>
                                <div class="row">
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco[1]['url']}}">
                                        <div class="col-sm-5 col-lg-8 ">

                                            @if(File::exists(public_path().$bloco[1]["path_img"].$bloco[1]['conteudo_id'].'/'.'132x79_'.$bloco[1]['nome_img']))
                                                {{HTML::image($bloco[1]["path_img"].$bloco[1]['conteudo_id'].'/'.'132x79_'.$bloco[1]['nome_img'],$bloco[1]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @else
                                                {{HTML::image($bloco[1]["path_img"].$bloco[1]['conteudo_id'].'/'.$bloco[1]['nome_img'],$bloco[1]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @endif

                                        </div>
                                    </a>

                                    <div class="col-sm-11 col-md-11 col-lg-8">
                                        <a href="{{Route('portal') . "/" .$bloco[1]['url']}}">
                                            <h4 style="margin-left: 2px !important;">{{$bloco[1]['titulo']}} </h4>
                                        </a>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif
                    @if(isset($bloco[2]))
                        @if($bloco[2]["ordem"] == 2)
                            <li>
                                <div class="row">
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco[2]['url']}}">
                                        <div class="col-sm-5 col-lg-8">

                                            @if(File::exists(public_path().$bloco[2]["path_img"].$bloco[2]['conteudo_id'].'/'.'132x79_'.$bloco[2]['nome_img']))
                                                {{HTML::image($bloco[2]["path_img"].$bloco[2]['conteudo_id'].'/'.'132x79_'.$bloco[2]['nome_img'],$bloco[2]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @else
                                                {{HTML::image($bloco[2]["path_img"].$bloco[2]['conteudo_id'].'/'.$bloco[2]['nome_img'],$bloco[2]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @endif

                                        </div>
                                    </a>

                                    <div class="col-sm-11 col-md-11 col-lg-8">
                                        <a href="{{Route('portal') . "/" .$bloco[2]['url']}}">
                                            <h4 style="margin-left: 2px !important;">{{$bloco[2]['titulo']}} </h4>
                                        </a>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif
                    @if(isset($bloco[3]))
                        @if($bloco[3]["ordem"] == 3)
                            <li>
                                <div class="row">
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco[3]['url']}}">
                                        <div class="col-sm-5 col-lg-8">

                                            @if(File::exists(public_path().$bloco[3]["path_img"].$bloco[3]['conteudo_id'].'/'.'132x79_'.$bloco[3]['nome_img']))
                                                {{HTML::image($bloco[3]["path_img"].$bloco[3]['conteudo_id'].'/'.'132x79_'.$bloco[3]['nome_img'],$bloco[3]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @else
                                                {{HTML::image($bloco[3]["path_img"].$bloco[3]['conteudo_id'].'/'.$bloco[3]['nome_img'],$bloco[3]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @endif

                                        </div>
                                    </a>

                                    <div class="col-sm-11 col-md-11 col-lg-8">
                                        <a href="{{Route('portal') . "/" .$bloco[3]['url']}}">
                                            <h4 style="margin-left: 2px !important;">{{$bloco[3]['titulo']}} </h4>
                                        </a>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif
                    @if(isset($bloco[4]))
                        @if($bloco[4]["ordem"] == 4)
                            <li>
                                <div class="row">
                                    <a rel="nofollow" href="{{Route('portal') . "/" .$bloco[4]['url']}}">
                                        <div class="col-sm-5 col-lg-8">

                                            @if(File::exists(public_path().$bloco[4]["path_img"].$bloco[4]['conteudo_id'].'/'.'132x79_'.$bloco[4]['nome_img']))
                                                {{HTML::image($bloco[4]["path_img"].$bloco[4]['conteudo_id'].'/'.'132x79_'.$bloco[4]['nome_img'],$bloco[4]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @else
                                                {{HTML::image($bloco[4]["path_img"].$bloco[4]['conteudo_id'].'/'.$bloco[4]['nome_img'],$bloco[4]['titulo'],array('class'=>' pull-left img-responsive','width'=>'125','height'=>'75'))}}
                                            @endif

                                        </div>
                                    </a>

                                    <div class="col-sm-11 col-md-11 col-lg-8">
                                        <a href="{{Route('portal') . "/" .$bloco[4]['url']}}">
                                            <h4 style="margin-left: 2px !important;">{{$bloco[4]['titulo']}} </h4>
                                        </a>

                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif

                </ul>
            </div>
            @endif
        </div>
    </div>
    @include('elements.home.bloco-video-tab-2p')
</div>
<hr>